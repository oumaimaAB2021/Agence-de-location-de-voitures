<?php require_once('connection.php'); ?>

<html>

<head>
    <title>Tableau de bord</title>
    <link rel="stylesheet" type="text/css" href="css/statistique.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <!-- font awesome-->
    <script src="https://kit.fontawesome.com/9a82effba6.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
</head>

<body>
    <div id="entete">
        <ul>
             <li><a href="deconnecter.php">Déconnexion </a></li>
            <li><a href="voiture.php">Modifier </a></li>
            <li><a href="ajouter.php">Ajouter </a></li>
            <li><a href="https://mail.google.com/mail/u/3/#inbox">Message</a></li>
            <li><a href="acceuilAdmin.php">Acceuil</a></li>
            
        </ul>
        <img src="images/back.jpg" class="image_entete">

        <img src="images/Logo4.png" class="logo" />
    </div>
    <div id="container">
     <?php include('dashboard.php');?>
        <h2>Mes clients</h2>
        <?php
        
            $req="select * from client ";
            $resultat=mysqli_query($cnx,$req);
           
            ?>
           
    <table class="table table-dark table-hover" >
    <thead>
            <tr class="table-dark">
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">CIN</th>
                <th scope="col">Permis</th>
                <th scope="col">Email</th>
                <th scope="col">Tel</th>
                <th scope="col">Date Réservation</th>
                <th scope="col">Date Retour</th>
                <th scope="col">Matricule Voiture</th>

            </tr>
            </thead>
    <tbody>
    <?php
            while($ligne=mysqli_fetch_assoc($resultat)){
                
           
            ?>
            <tr class="table-dark"> 
                <td><?php echo "<center>" .$ligne['nom']. "</center>"?></td>
                <td><?php echo "<center>" .$ligne['prenom']. "</center>"?></td>
                <td><?php echo "<center>" .$ligne['cin']. "</center>"?></td>
                <td><?php echo "<center>" .$ligne['permis']. "</center>"?></td>
                <td><a href="mailto:<?php echo$ligne['email'];?>"><?php echo$ligne['email'];?></a></td>
                <td><?php echo "<center>" .$ligne['tel']. "</center>"?></td>
                <td><?php echo "<center>" .$ligne['date1']. "</center>"?></td>
                <td><?php echo "<center>" .$ligne['date2']. "</center>"?></td>
                <td><?php echo "<center>" .$ligne['idVoiture']. "</center>"?></td>
            </tr>
</tbody>
<?php
                 }

            ?>
</table>
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