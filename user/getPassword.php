<?php
include "configUser.php";
$data = array();

$email = $_GET['email'];
$q = mysqli_query($con, "SELECT `heslo`,`email`,`id` FROM `user`WHERE `email` = '{$email}'");
while ($row = mysqli_fetch_object($q)){
    $data[] = $row;
}
echo json_encode($data);
echo mysqli_error($con);
