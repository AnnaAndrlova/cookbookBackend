<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS");
header("Access-Control-Allow-Headers: token, Content-Type");
header("Access-Control-Max-Age: 1728000");
header("Content-Length: 0");
header('Content-Type: application/json; charset=utf-8');
//global $con;
//define("CON",  mysqli_connect("md328.wedos.net", "a289082_anicka", "NNX8HG4r","d289082_anicka") or die("could not connect DB"));
//$con = mysqli_connect("md328.wedos.net", "a289082_anicka", "NNX8HG4r","d289082_anicka") or die("could not connect DB");
define("CON",  mysqli_connect("localhost", "root", "","ionic-php-crud") or die("could not connect DB"));
$con = mysqli_connect("localhost", "root", "","ionic-php-crud") or die("could not connect DB");
