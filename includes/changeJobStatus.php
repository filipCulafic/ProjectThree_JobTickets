<?php

include_once "dbh.inc.php";


$id = $_GET['id'];

$sql = "UPDATE `jobs` SET `activity` = 'Completed' WHERE `jobs`.`jobs_id` = $id;";


$result = mysqli_query($conn, $sql);





    if ($result) {
        header("Location: ../jobTicketsList.php?success");
    } else {
        header("Location: ../jobTicketsList.php?fail");
    }
    ?>