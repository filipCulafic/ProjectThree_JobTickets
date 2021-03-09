<?php

include_once "dbh.inc.php";
include_once "functions.php";

$id = $_GET['id'];
$description = $_POST['description'];


    if(!empty($id) && !empty($description)) {
        createJobTicket($conn, $id, $description);
        exit();
    } else {
        header("Location: ../newJobTicket.php?error=FailedUpdate");
        exit();
    }
    