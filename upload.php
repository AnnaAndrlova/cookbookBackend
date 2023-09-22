<?php
include_once "config.php";
header("Content-Type: text/json");
$image = $_FILES["image"];

// složka kam nahrávám
$uploadDir = __DIR__ . "/uploads/";
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



// upload file
if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadDir . "/" . $fileNewName)) {

    //  zde uložím do DB data k danému ID
    $q = mysqli_query($con, "UPDATE `recept` 
SET `hlavniObrazek` = 'uploads/$fileNewName' 
WHERE `id` = '{$_POST["receipt_id"]}'");
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


