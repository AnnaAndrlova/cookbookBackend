<?php
include_once "configUser.php";
header("Content-Type: text/json");
// $input = file_get_contents("php://input");
// $data = json_decode($input, true);
// $text = $_POST["text"];
$image = $_FILES["image"];

// složka kam nahrávám
$uploadDir = __DIR__ . "/../uploads/";
$targetName = $uploadDir . basename($_FILES["image"]["name"]);
// zde vytvořím unikátní jméno souboru + koncovka souboru
$fileNewName = md5($targetName . uniqid()) . "." . strtolower(pathinfo($targetName, PATHINFO_EXTENSION));

// kontrola jestli už existuje jméno
if (file_exists($uploadDir . "/" . $fileNewName)) {
    echo json_encode([
        "error" => "File already exists.",
        "code" => 409
    ]);

    die(); // ukončím běh PHP scriptu
}

// TODO: kontrola datových typů

// upload file
if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadDir . "/" . $fileNewName)) {
    $q = mysqli_query($con, "UPDATE `user` 
SET `avatar` = 'uploads/$fileNewName' 
WHERE `id` = '{$_POST["user_id"]}'");
    // ;
    if($q){
        echo json_encode([
            "message" => "Upload successful",
            "data" => [
                "src" => "uploads/$fileNewName"
            ],
            "code" => 200
        ]);
    }else{
        echo json_encode([
            "error" => $con->error,
            "code" => 500
        ]);
    }

} else {
    echo json_encode([
        "error" => "Server upload error.",
        "code" => 500
    ]);
}



