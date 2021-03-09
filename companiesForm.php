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
                                <li><a href="companiesList.php">Lista Firmi</a></li>
                                <li><a href="newJobTicket.php">Nov Radni Nalog</a></li>
                                <li><a href="jobTicketsList.php">Trenutni poslovi</a></li>
                                <li><a href="completedTicketsList.php">Gotovi poslovi</a></li>
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
                    <div class="company-form">
                        <form action="includes/addCompany.php" method="POST">
                        <h3 style="color: rgb(56, 56, 56);; margin-top: 55px;">Dodajte novu firmu</h3>
                        <div class="text-box">
                            <input type="text" placeholder="Ime firme" name="ime_firme" value="">
                        </div>
                        <div class="text-box">
                            <input type="text" placeholder="PIB" name="pib" value="">
                        </div>
                        <div class="text-box">
                            <input type="text" placeholder="Maticni broj" name="maticni_broj" value="">
                        </div>
                        <div class="text-box">
                            <input type="text" placeholder="Adresa" name="adresa" value="">
                        </div>
                        <div class="text-box">
                            <input type="text" placeholder="E-mail" name="email" value="">
                        </div>
                        <div class="text-box">
                            <input type="text" placeholder="Broj telefona" name="broj_telefona" value="">
                        </div>
                        <button id="uniqueButton"  type="submit" name="add_company">Dodaj</button>
                        <div class="errorText">
                            <?php
                                if(isset($_GET["error"])) {
                                    if($_GET["error"] == "emptyCompanyInput") {
                                        echo "Popunite Sva Polja!";
                                    }
                                    if($_GET["error"] == "invalidUserName") {
                                        echo "Username you have entered is invalid!";
                                    }
                                    if($_GET["error"] == "passwordsDontMatch") {
                                        echo "Passwords Don't match";
                                    }
                                    if($_GET["error"] == "none") {
                                        echo "Uspesno ste dodali firmu!";
                                    }
                                }
                            ?>
                        </div>
                        </form>
                        
                    </div>
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