<?php require_once('connection.php'); session_start();?>

<html>

<head>
    <title>Reservation</title>
    <link rel="stylesheet" type="text/css" href="css/ajouter.css" />
    <link rel="stylesheet" href="../static/css/bootstrap.min.css" />
    <meta charset="UTF-8">
    <!-- font awesome-->
    <script src="https://kit.fontawesome.com/9a82effba6.js" crossorigin="anonymous"></script>

</head>

<body style="background-color:ghostwhite">
    <div id="entete">
      
        <img src="images/back.jpg" class="image_entete">

        <img src="images/Logo4.png" class="logo" />
    </div>
    <?php
    $imm=$_GET['car'];
    $reqSelect = "select * from voiture where Matricule ='$imm'";
    $resultat = mysqli_query($cnx, $reqSelect);
     if($ligne = mysqli_fetch_assoc($resultat)){
         ?>
        
    <div class="card" style="width: 18rem; float: left; padding-left:20px; padding-top:50px">
        <img src="<?php echo $ligne['Photo'] ?>"  class="card-img-top" />
        <div class="card-body">
        <p class="card-text" align=center><?php echo  '<b>'.$ligne['Marque'].' '.$ligne['Type'].'<br>'
            . $ligne['Prix'].' dh/j </b>';
                                    ?></p>
                                    <?php } ?>
        </div>
        </form>
    </div>
    
    <div id="container">
    
    
        <form name="formAdd" action="" method="POST" class="formulaire" enctype="multipart/form-data">
            <h2 style="text-align:center;color:cadetblue;" >Réservez votre voiture...</h2>
            <label><b>Nom  : </b></label>
            <input type="text" name="txtnom" class="zonetext" placeholder="Entrer votre nom" required>

            <label><b>Prénom : </b></label>
            <input type="text" name="txtprenom" class="zonetext" placeholder="Entrer votre prénom" required>

            <label><b>CIN : </b></label>
            <input type="text" name="txtcin" class="zonetext" placeholder="Entrer votre CIN" required>

            <label><b>Numéro Permis : </b></label>
            <input type="text" name="txtpr" class="zonetext" placeholder="Entrer votre N° permis" required>


            <table  class="date" cellpadding="10" cellspacing="1">
            <tr>
                <td><label><b>Date de début : </b></label> </td>
                <td><label><b>Date de retour : </b></label> </td>
            </tr>
            
            <tr>
                <td><input type="date" name="txtdate1" placeholder="Entrer votre date de naissance" required></td>
                <td><input type="date" name="txtdate2"  placeholder="Entrer votre date de naissance" required></td>
            </tr>
        </table>
            
            <label><b>Email : </b></label>
            <input type="email" name="txtemail" class="zonetext" placeholder="Entrer votre email" required>

            <label><b>N° Tel : </b></label>
            <input type="number" name="txttel" class="zonetext" placeholder="Entrer votre numéro de téléphone" required>


            <input type="submit" name="btadd" value="Réserver" class="submit">

            <label style="text-align: center; color: #960406">
                <?php
                 $_SESSION['imm']=$imm=$_GET['car'];
                if (isset($_POST['btadd'])) {
                    $_SESSION['nom']=$nom= $_POST['txtnom'];
                    $_SESSION['prenom']=$prenom = $_POST['txtprenom'];
                    $_SESSION['cin']=$cin=$_POST['txtcin'];
                    $_SESSION['pr']=$pr = $_POST['txtpr'];
                    $_SESSION['date1']=$date1 = $_POST['txtdate1'];
                    $_SESSION['date2']=$date2 = $_POST['txtdate2'];
                    $_SESSION['email']=$email=$_POST['txtemail'];
                    $_SESSION['tel']=$tel=$_POST['txttel'];
                   
                    $req = "Insert into client Values('$nom','$prenom','$cin','$pr','$date1', 
                            '$date2','$email','$tel','$imm')";
                    $resultat = mysqli_query($cnx, $req);
                    if ($resultat) {
                         header('Location:loading.php'); 
                    } else {
                        echo "Réservation echouée";
                    }
                }
                ?>
            </label>
        </form>
    </div>

    <footer>

    <div class="contenu-footer">
            
    <img src="images/Logo4.png" class="logo_footer" />
        <div class="bloc footer-contact">
            <h3>Restons en contact</h3>
            <p>06-14-06-73-67</p>
            <p>oneclick@contact.com</p>
            <p>6 rue EL Takadom, Casablanca, Maroc</p>
        </div>

        <div class="bloc footer-services">
            <h3>Nos Services</h3>
            <ul class="liste-services">
                <li>Paiement sécurisé</li>
                <li>Meilleurs prix garantis</li>
                <li>Contact 7j/7</li>

            </ul>
        </div>

        <div class="bloc footer-medias">
            <h3>Nos réseaux</h3>
            <ul class="liste-media">
                <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://web.whatsapp.com/"><i class="fab fa-whatsapp"></i></a></li>
                <li><a href="https://www.instagram.com/?hl=fr"><i class="fab fa-instagram"></i></a></li>
            </ul>
            </ul>
        </div>

    </div>

</footer>

</body>

</html>