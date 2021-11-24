<?php
include_once "config.php";
$input = file_get_contents("php://input");
$data = json_decode($input, true);
$message = array();
$nazev = $data["nazev"];
$popisek = $data["popisek"];
$postup = $data["postup"];
$ingredience = $data["ingredience"];
$hlavniObrazek = $data["hlavniObrazek"];
$con = mysqli_connect("localhost", "root", "","ionic-php-crud") or die("could not connect DB");


$q = mysqli_query($con, "INSERT INTO `recept` (`nazev`, `popisek`,`postup`,`ingredience`,`hlavniObrazek`) 
VALUES ('$nazev', '$popisek','$postup','$ingredience','$hlavniObrazek')");
if($q){
    http_response_code(201);
    $message["status"] = "Success";
}
else {
    http_response_code(422);
    $message["status"] = "Error";
}
echo json_encode($message);
echo mysqli_error($con);