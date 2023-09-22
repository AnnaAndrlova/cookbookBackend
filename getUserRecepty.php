<?php
include "config.php";
$data = array();
$autorid = $_GET['autorid'];
$q = mysqli_query($con, "SELECT `nazev`,`id` FROM `recept` WHERE `autorid` = '{$autorid}'");
while ($row = mysqli_fetch_object($q)){
    $data[] = $row;
}
echo json_encode($data);
echo mysqli_error($con);
