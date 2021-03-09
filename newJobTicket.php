<!DOCTYPE html>
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
                                <li><a href="JobTicketsList.php">Trenutni poslovi</a></li>
                                <li><a href="">Gotovi poslovi</a></li>
                            </ul>
                        </div>     
                    </div>               
                </div>
            </div>   
        </div>
    </header>


    <div class="section">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12">
                <form action="newJobTicket.php" method="post">
                <h3 style="text-align: center; color:rgb(56, 56, 56); margin-top: 55px">Novi Radni Nalog</h3>

                    <div class="text-box">
                            <input type="text" placeholder="Ime firme / PIB" name="ime_firme/pib" value="">
                     </div>
                     <button id="uniqueButton"  type="submit" name="searchCompany">Nadji Firmu</button>
                </form>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12">
                
                <?php
                if (isset($_POST["searchCompany"])) {
                        require_once "includes/dbh.inc.php";
                        require_once "includes/functions.php";
                        $companyNameOrPIB = $_POST["ime_firme/pib"];


                            if (empty($companyNameOrPIB)) {
                                header("Location: newJobTicket.php?error=emptyField");
                                exit;
                            
                            }

                           // if (uidExistCompany($conn, $companyNameOrPIB, $companyNameOrPIB)) { 
                              

                          echo "        <table>
                          <tr>
                              <th>Ime Firme</th>
                              <th>PIB</th>
                              <th>Maticni broj</th>
                              <th>Adresa</th>
                              <th>Email</th>
                              <th>Broj Telefona</th>
                          </tr>";


                             viewCompany($conn, $companyNameOrPIB);

                             echo "</table>";
                       // } else {
                       //     echo "<H4 style='text-align:center; color:white;'>There is no student with roll number $companyNameOrPIB</H4>";
                        }
               //     }
                ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md 12">
                    
                    <h5 style="text-align: center; color:rgb(56, 56, 56); margin-top: 10px">Deskripcija Posla</h6>
                    <div class="description">
                           <textarea name="description" id="" cols="62" rows="12" style="background:none; border:none; outline:none; color:rgb(56, 56, 56); font-size:22px;"></textarea>
                     </div>
                    </form>

                </div>
            </div>
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