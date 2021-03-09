<?php

include_once "dbh.inc.php";


$id = $_GET['id'];

$sql = "UPDATE `jobs` SET `activity` = 'Not Completed' WHERE `jobs`.`jobs_id` = $id;";


$result = mysqli_query($conn, $sql);





    if ($result) {
        header("Location: ../completedTicketsList.php?success");
    } else {
        header("Location: ../completedTicketsList.php?fail");
    }
    ?>