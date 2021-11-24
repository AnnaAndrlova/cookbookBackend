<?php
include "configUser.php";
$input = file_get_contents("php://input");
$data = json_decode($input, true);
$message = array();
$jmeno = $data["jmeno"];
$prijmeni = $data["prijmeni"];
$email = $data["email"];
$heslo = $data["heslo"];
$con= mysqli_connect("localhost", "root", "","ionic-php-crud") or die("could not connect DB");
$id = $_GET['id'];

$q = mysqli_query($con, "UPDATE `user` 
SET `jmeno` = '$jmeno', 
`prijmeni` = '$prijmeni', 
`email`= '$email',
`heslo`='$heslo', 
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