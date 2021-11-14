<?php require_once('connection.php'); ?>

<html>

<head>
    <title>Voiture</title>
    <link rel="stylesheet" type="text/css" href="css/voiture.css" />
    <!-- font awesome-->
    <script src="https://kit.fontawesome.com/9a82effba6.js" crossorigin="anonymous"></script>
    

</head>
<body>
    <div id="entete">
        <ul>
             <li><a href="deconnecter.php">Déconnexion </a></li>
             <li><a href="ajouter.php" >Ajouter </a></li>
            <li><a href="statistique.php">Statistique </a></li>
            <li><a href="https://mail.google.com/mail/u/3/#inbox">Message</a></li>
            <li><a href="acceuilAdmin.php">Acceuil</a></li>
            
        </ul>
        <img src="images/back.jpg" class="image_entete">

        <img src="images/Logo4.png" class="logo" />
    </div>

    <div id="global">
            <div id="profil">
            <?php
                session_start();
                echo "Bonjour et Bienvenue ".$_SESSION['monLogin']."<br>";
                $req="select * from utilisateur where login='".$_SESSION['monLogin']."'";
                $resultat=mysqli_query($cnx,$req);
                $ligne=mysqli_fetch_assoc($resultat);

             ?>
             <img src="<?php echo $ligne['photo'];?>" class="myphoto">
             <br>
    
            </div>
            <div id="tableaubord">
                <?php include("tableau.php")?>


            </div>
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