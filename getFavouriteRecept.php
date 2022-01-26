<?php
include "config.php";
$data = array();
$input = file_get_contents("php://input");
$id = json_decode($input, true);
$con= mysqli_connect("localhost", "root", "","ionic-php-crud") or die("could not connect DB");
$id = $_GET['recepty'];
$singleid = explode(",", $id);
$i = 0;
while($i<count($singleid)){
    $q = mysqli_query($con, "SELECT * FROM `recept` WHERE `id` = $singleid[$i] LIMIT 1");
    while ($row = mysqli_fetch_object($q)){
        $data[] = $row;
    }
    $i++;
}
echo json_encode($data);
//echo json_encode($oblibenerecepty);
//echo mysqli_error($con);