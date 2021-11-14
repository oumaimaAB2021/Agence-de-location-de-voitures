<?php require_once('connection.php'); ?>

<html>

<head>
    <title>Ajouter voiture</title>
    <link rel="stylesheet" type="text/css" href="css/ajouter.css" />
    <!-- font awesome-->
    <script src="https://kit.fontawesome.com/9a82effba6.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="entete">
        <ul>
             <li><a href="deconnecter.php">Déconnexion </a></li>
            <li><a href="voiture.php">Modifier </a></li>
            <li><a href="statistique.php">Statistique </a></li>
            <li><a href="https://mail.google.com/mail/u/3/#inbox">Message</a></li>
            <li><a href="acceuilAdmin.php">Acceuil</a></li>
            
        </ul>
        <img src="images/back.jpg" class="image_entete">

        <img src="images/Logo4.png" class="logo" />
    </div>
    <div id="container">
        <form name="formAdd" action="" method="post" class="formulaire" enctype="multipart/form-data">
            <h2 align="center">Ajouter une nouvelle voiture...</h2>
            <label><b>Matricule : </b></label>
            <input type="text" name="txtImm" class="zonetext" placeholder="Entrer la matricule" required>

            <label><b>Marque : </b></label>
            <input type="text" name="txtMarque" class="zonetext" placeholder="Entrer la marque" required>

            <label><b>Type : </b></label>
            <input type="text" name="txtType" class="zonetext" placeholder="Entrer le type" required>

            <label><b>Prix de location : </b></label>
            <input type="number" name="txtPl" class="zonetext" placeholder="Entrer la prix" required>

            <label><b>Photo : </b></label>
            <input type="file" name="txtphoto" class="zonetext" placeholder="Entrer une image" required>

            <input type="submit" name="btadd" value="Ajouter" class="submit">

            <label style="text-align: center; color: #960406">
                <?php
                if (isset($_POST['btadd'])) {
                    $imm = $_POST['txtImm'];
                    $marque = $_POST['txtMarque'];
                    $type = $_POST['txtType'];
                    $prix = $_POST['txtPl'];
                    $image = $_FILES['txtphoto']['tmp_name'];
                    $trajet = "images/" . $_FILES['txtphoto']['name'];

                    move_uploaded_file($image, $trajet);
                    $req = "Insert into voiture(Matricule,Marque,Type,Prix,Photo) 
                            Values('$imm','$marque','$type','$prix','$trajet')";
                    $resultat = mysqli_query($cnx, $req);
                    if ($resultat) {
                        header('Location:acceuilAdmin.php');
                    } else {
                        echo "Echec d'insertion des données";
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