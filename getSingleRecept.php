<?php
include "config.php";

$id = $_GET['id'];

$q = mysqli_query($con, "SELECT recept.nazev, recept.id, recept.hlavniObrazek, recept.kategorie, recept.obtiznost, recept.postup, recept.ingredience, recept.autorid, recept.popisek, receptcathegory.name FROM recept INNER JOIN receptcathegory ON receptcathegory.idcathegory=recept.kategorie WHERE recept.id = $id;");

$data = $q->fetch_object();

if($data != null){
    echo json_encode([$data], JSON_UNESCAPED_UNICODE);
}else{
    echo json_encode([]);
}

// echo mysqli_error($con);