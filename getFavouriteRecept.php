<?php
include "config.php";
$data = array();
$input = file_get_contents("php://input");
$id = json_decode($input, true);
$id = $_GET['recepty'];
$singleid = explode(",", $id);
$i = 0;
while($i<count($singleid)){
    $q = mysqli_query($con, "SELECT recept.nazev, recept.id, recept.hlavniObrazek, recept.kategorie, receptcathegory.name FROM recept INNER JOIN receptcathegory ON receptcathegory.idcathegory=recept.kategorie WHERE `id` = $singleid[$i] LIMIT 1");
    while ($row = mysqli_fetch_object($q)){
        $data[] = $row;
    }
    $i++;
}
echo json_encode($data);
//echo json_encode($oblibenerecepty);
//echo mysqli_error($con);