<?php

function emptyCompanyInput($name, $pib, $registration_number, $address, $email, $phoneNumber) {
    if (empty($name) || empty($pib) || empty($registration_number) || empty($address) || empty($email) || empty($phoneNumber)) {
        $result = true;
    }   else {
        $result = false;
    }

    return $result;

}



function createCompany($conn, $name, $pib, $registration_number, $address, $email, $phoneNumber) {
    header("Location: ../companiesForm.php?error=none");
    $sql = "INSERT INTO companies (name, pib, registration_number, address, email, phone_number) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=stmtfailed" );
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $pib, $registration_number, $address, $email, $phoneNumber);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../companiesForm.php?error=none");
    exit();
}

function viewCompanies($conn) {
    $sql = "SELECT * FROM companies ORDER BY name ASC;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . 
            $row["name"] . "</td><td>" . 
            $row["pib"] . "</td><td>" . 
            $row["registration_number"] . "</td><td>" . 
            $row["address"] . "</td><td>" . 
            $row["email"] . "</td><td>" . 
            $row["phone_number"] . "</td><td style='border-top:solid 1px  rgb(56, 56, 56);'>" .
            "<a href='includes/deleteCompany.php?id=$row[companies_id]' style='color: rgb(56, 56, 56); border-color:; margin-left:25px;'>Delete</a> </td></tr>"; 


        }
    }
}

function viewCompany($conn, $nameOrPIB) {
    $sql = "SELECT * FROM companies WHERE name LIKE '%$nameOrPIB%' OR pib LIKE '%$nameOrPIB%' ORDER BY name ASC ;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<tr><td>" . 
            $row["name"] . "</td><td>" . 
            $row["pib"] . "</td><td>" . 
            $row["registration_number"] . "</td><td>" . 
            $row["address"] . "</td><td>" . 
            $row["email"] . "</td><td>" . 
            $row["phone_number"] . "</td><td style='border-top:solid 1px rgb(56, 56, 56);'>" . 
            "<form action='includes/addJobTicket.php?id=$row[companies_id]' method='post'>
            <button id='selectButton'  type='submit' name='addJobTicket'>Napravi radni nalog</button> </td></tr>"; 
            


        }
    }
}

function viewCurrentJobs ($conn) {
    $sql = "SELECT jobs_id, name, pib, registration_number, address, email, phone_number, description, date_format(time_of_creation, '%d %M %Y %H:%ih') as time_of_creation FROM companies, jobs WHERE companies.companies_id = jobs.companies_id AND jobs.activity = 'Not Completed';";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<tr><td>" . 
            $row["name"] . "</td><td>" . 
            $row["address"] . "</td><td>" . 
            $row["email"] . "</td><td>" . 
            $row["phone_number"] . "</td><td>" .
            $row["description"] . "</td><td>" . 
            $row["time_of_creation"] . "</td><td style='border-top:solid 1px  rgb(56, 56, 56);'>" . 
            "<a href='includes/changeJobStatus.php?id=$row[jobs_id]'>Gotovo</a> </td></tr>"
            
            ; 
            


        }
    }
    
}

function viewCompletedJobs ($conn) {
    $sql = "SELECT jobs_id, name, pib, registration_number, address, email, phone_number, description, date_format(time_of_creation, '%d %M %Y %H:%ih') as time_of_creation FROM companies, jobs WHERE companies.companies_id = jobs.companies_id AND jobs.activity = 'Completed';";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<tr><td>" . 
            $row["name"] . "</td><td>" . 
            $row["pib"] . "</td><td>" . 
            $row["registration_number"] . "</td><td>" . 
            $row["address"] . "</td><td>" . 
            $row["email"] . "</td><td>" . 
            $row["phone_number"] . "</td><td>" .
            $row["description"] . "</td><td>" . 
            $row["time_of_creation"] . "</td><td style='border-top:solid 1px  rgb(56, 56, 56); width: 173px;'>" . 
            "<a href='includes/changeJobStatusIncomplete.php?id=$row[jobs_id]'>Nije Gotovo</a> </td></tr>"
            
            ; 
            


        }
    }
    
}


function uidExistCompany($conn, $name, $pib) {
    $sql = "SELECT * FROM companies WHERE name LIKE ? OR pib LIKE ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../index.php?error=stmtfailed" );
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss", $name, $pib);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } 
   else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function createJobTicket($conn, $id, $description) {
    $sql = "INSERT INTO jobs (companies_id, description, activity) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../index.php?error=stmtfailed" );
        exit();
    }
    
    $activity ="Not Completed";
    mysqli_stmt_bind_param($stmt,"sss", $id, $description, $activity);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../newJobTicket.php?error=none");
    exit();
}

