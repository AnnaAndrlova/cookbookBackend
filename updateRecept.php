<?php
include "config.php";
$input = file_get_contents("php://input");
$data = json_decode($input, true);
$message = array();
$nazev = $data["nazev"];
$popisek = $data["popisek"];
$postup = $data["postup"];
$ingredience = $data["ingredience"];
$hlavniObrazek = $data["hlavniObrazek"];
$con= mysqli_connect("localhost", "root", "","ionic-php-crud") or die("could not connect DB");
$id = $_GET['id'];

$q = mysqli_query($con, "UPDATE `recept` 
SET `nazev` = '$nazev', 
`popisek` = '$popisek', 
`postup`= '$postup',
`ingredience`='$ingredience', 
`hlavniObrazek`= '$hlavniObrazek'
WHERE `id` = '{$id}'");
if($q){
    http_response_code(200);
    $message["status"] = "Success";
}
else {
    http_response_code(422);
    $message["status"] = "Error";
}
echo json_encode($message);
echo mysqli_error($con);