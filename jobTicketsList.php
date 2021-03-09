<?php
    include_once "includes/dbh.inc.php";
    include_once "includes/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Xtim</title>
</head>
<body>
    <header>
        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-list">
                            <ul>
                                <li><a href="companiesForm.php">Nova Firma</li>
                                <li><a href="companiesList.php">Lista Firmi</a></li>
                                <li><a href="newJobTicket.php">Nov Radni Nalog</a></li>
                                <li><a href="completedTicketsList.php">Gotovi poslovi</a></li>
                            </ul>
                        </div>     
                    </div>               
                </div>
            </div>   
        </div>
    </header>


    <div class="section">
        <div class="container" style="max-width: 1650px;">
        <table>
                <tr>
                    <th>Ime Firme</th>
                    <th>Adresa</th>
                    <th>Email</th>
                    <th>Broj telefona</th>
                    <th>Deskripcija</th>
                    <th>Datum</th>
                    
                </tr>

                <div class="row-">
                    <col-md-12>
                    <h3 style="color: rgb(56, 56, 56); text-align:center; padding-top: 55px">Lista trenutnih poslova</h3>
                    
                    
                    </col-md-12>
                </div>

                <?php



viewCurrentJobs($conn);

    ?>

            </table>
        </div>
        
    </div>


    <footer>
        <div class="container">
            
        </div>
    
    
    
    </footer>






<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
