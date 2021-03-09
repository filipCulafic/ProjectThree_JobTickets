<?php

include_once "dbh.inc.php";

$id = $_GET['id'];

$sql = "DELETE FROM companies WHERE companies_id = '$id';";
$result = mysqli_query($conn, $sql);


    if ($result) {
        header("Location: ../companiesList.php?SuccessfullyDeleted");
    } else {
        header("Location: ../companiesList.php?InvalidDeletion");
    }