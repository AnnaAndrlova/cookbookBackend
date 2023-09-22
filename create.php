<?php
include_once "config.php";
$input = file_get_contents("php://input");
$data = json_decode($input, true);
$message = array();

$nazev = $data["nazev"];
$popisek = $data["popisek"];
$postup = $data["postup"];
$ingredience = $data["ingredience"];
$autorid = $data["autorid"];
$kategorie = $data["kategorie"];
$obtiznost = $data["obtiznost"];


$q = mysqli_query($con, "INSERT INTO `recept` (`nazev`, `popisek`,`postup`,`ingredience`,`autorid`,`kategorie`,`obtiznost`) 
VALUES ('$nazev', '$popisek','$postup','$ingredience','$autorid','$kategorie','$obtiznost')");
if($q){
    http_response_code(201);
    $message["status"] = "Success";
    $message["data"] = [
        "id" => $con->insert_id
    ];
}
else {
    http_response_code(422);
    $message["status"] = "Error";
}
echo json_encode($message);
// echo mysqli_error($con);