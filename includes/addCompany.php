<?php

if(isset($_POST["add_company"])) {
    require_once "dbh.inc.php";
    require_once "functions.php";

    $name = $_POST["ime_firme"];
    $pib = $_POST["pib"];
    $registration_number = $_POST["registration_number"];
    $address = $_POST["adresa"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["broj_telefona"];

    if (emptyCompanyInput($name, $pib, $registration_number, $address, $email, $phoneNumber) != false) {
        header("Location: ../companiesForm.php?error=emptyCompanyInput");
        exit();
    }

    createCompany($conn, $name, $pib, $registration_number, $address, $email, $phoneNumber);

}