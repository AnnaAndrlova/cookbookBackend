<?php
include "configUser.php";
$data = array();

$q = mysqli_query($con, "SELECT email FROM user");
while ($row = mysqli_fetch_object($q)){
    $data[] = $row;
}
echo json_encode($data);
echo mysqli_error($con);