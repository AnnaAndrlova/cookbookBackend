<?php
include "configUser.php";
$data = array();
$con= mysqli_connect("localhost", "root", "","ionic-php-crud") or die("could not connect DB");
$email = $_GET['email'];
$q = mysqli_query($con, "SELECT `heslo`,`email`,`id` FROM `user`WHERE `email` = '{$email}'");
while ($row = mysqli_fetch_object($q)){
    $data[] = $row;
}
echo json_encode($data);
echo mysqli_error($con);
