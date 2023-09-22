<?php
include_once "configUser.php";
$input = file_get_contents("php://input");
$data = json_decode($input, true);
$message = array();
$jmeno = $data["jmeno"];
$prijmeni = $data["prijmeni"];
$email = $data["email"];
$heslo = $data["heslo"];




$q = mysqli_query($con, "INSERT INTO `user` (`jmeno`, `prijmeni`,`email`,`heslo`) 
VALUES ('$jmeno', '$prijmeni','$email','$heslo')");
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