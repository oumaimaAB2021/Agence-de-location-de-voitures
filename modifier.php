<?php require_once('connection.php'); ?>

<html>

<head>
    <title>Modifier</title>
    <link rel="stylesheet" type="text/css" href="css/ajouter.css" />
    <link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <!-- font awesome-->
    <script src="https://kit.fontawesome.com/9a82effba6.js" crossorigin="anonymous"></script>

</head>

<body style="background-color:ghostwhite">
    <div id="entete">
      
        <img src="images/back.jpg" class="image_entete">

        <img src="images/Logo4.png" class="logo" />
    </div>
   
    
    <div id="container">
    <?php
    $imm=$_GET['car'];
    $reqSelect = "select * from voiture where Matricule ='$imm'";
    $resultat = mysqli_query($cnx, $reqSelect);
     if($ligne = mysqli_fetch_assoc($resultat)){
         ?>
    
        <form name="formAdd" action="" method="POST" class="formulaire" enctype="multipart/form-data">
           
            <label><b>Matricule : </b></label>
            <input type="text" name="txtmatricule" class="zonetext" value=<?php echo  $imm ?> readonly>
                                    

            <label><b>Marque : </b></label>
            <input type="text" name="txtmarque" class="zonetext" value=<?php echo $ligne['Marque']?>>

            <label><b>Type : </b></label>
            <input type="text" name="txttype" class="zonetext" value=<?php echo $ligne['Type']?>>

            <label><b>Prix : </b></label>
            
            <input type="number" name="txtpr" class="zonetext" value=<?php echo $ligne['Prix']?>>
            <?php } ?>


            

            <input type="submit" name="btadd" value="Modifier" class="submit">

            <label style="text-align: center; color: #960406">
                <?php
                 $imm=$_GET['car'];
                if (isset($_POST['btadd'])) {
                    $maruqe= $_POST['txtmarque'];
                    $type = $_POST['txttype'];
                    $pr = $_POST['txtpr'];
                   
                    $req = "Update voiture set Marque='$maruqe' , Type='$type', Prix='$pr' where Matricule='$imm'";
                    $resultat = mysqli_query($cnx, $req);
                    if ($resultat) {
                         header('Location:acceuilAdmin.php'); 
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