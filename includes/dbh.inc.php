<?php


$dbserverName= "localhost";
$dbuserame = "root";
$dbpassword= "";
$dbtableName = "xtim";

$conn = mysqli_connect($dbserverName,$dbuserame,$dbpassword,$dbtableName);

if (!$conn) {
    die("Server error " . mysqli_connect_error());
}