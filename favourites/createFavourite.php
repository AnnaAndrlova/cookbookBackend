<?php
include_once "config.php";
$input = file_get_contents("php://input");
$data = json_decode($input, true);
$message = array();
$idrecept = $data["idrecept"];
$iduser = $data["iduser"];
$con = mysqli_connect("localhost", "root", "","ionic-php-crud") or die("could not connect DB");


$q = mysqli_query($con, "INSERT INTO `oblibene_recepty` (`idrecept`, `iduser`) 
VALUES ('$idrecept', '$iduser')");
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