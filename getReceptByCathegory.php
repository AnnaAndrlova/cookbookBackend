<?php
include "config.php";
$data = array();
$databaseOrder = $_GET['databaseOrder'];
//$newstr = str_replace('WHERE', 'WHERE (', $databaseOrder);
// $newstr2 = str_replace('AND', ') AND ', $newstr);
$q = mysqli_query($con, "SELECT recept.nazev, recept.id, recept.hlavniObrazek, recept.kategorie,recept.obtiznost, receptcathegory.name 
FROM recept INNER JOIN receptcathegory ON receptcathegory.idcathegory=recept.kategorie $databaseOrder;");
while ($row = mysqli_fetch_object($q)){
    $data[] = $row;
}
echo json_encode($data);
echo mysqli_error($con);