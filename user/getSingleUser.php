<?php
include "configUser.php";

$data = array();
$id = $_GET['id'];
$con= mysqli_connect("localhost", "root", "","ionic-php-crud") or die("could not connect DB");

$q = mysqli_query($con, "SELECT * FROM `user` WHERE `id` = $id LIMIT 1");
while ($row = mysqli_fetch_object($q)){
    $data[] = $row;
}
echo json_encode($data);
echo mysqli_error($con);