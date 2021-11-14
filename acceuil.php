<?php require_once('connection.php'); ?>

<html>

<head>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="css/acceuil.css" />
    <!-- font awesome-->
    <script src="https://kit.fontawesome.com/9a82effba6.js" crossorigin="anonymous"></script>
    
    <style> .pagination {
            display: inline-block;
            font-size: 20px;
           
        }
        
        .pagination a{
            color: #265F6A;
            float: left;
            padding: 8px 16px;
            text-decoration: solid initial;
        }</style>
</head>

<body>
    <div id="entete">

        <a href="login.php" class="login">Se connecter </a>

        <video autoplay="autoplay" loop class="video_entete" controls>
            <source src="images/video1_2.mp4" type="video/mp4" />
        </video>
        <img src="images/Logo4.png" class="logo" />
        <p class="nomsite">One Click</p>
        <div id="formauto">
            <form name="formauto" method="post" action="">
                <input id="motcle" type="text" name="motcle" placeholder=" Recherche par Marque..." />
                <input class="btfind" type="submit" name="btsubmit" value="Recherche" />
            </form>
        </div>
    </div>
    <div class="service">
        <h3> Nos Services</h3>
    </div>

    <div id="articles">
        <?php

          /****nombre de resultats par page*/
          $resultat_page=9; 
          /**Determiné page courrente */
        if(!isset($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        } 
          $premiere_page=($page-1)*$resultat_page;

          
        if (isset($_POST['btsubmit'])) {
            $mc = $_POST['motcle'];
            $reqSelect = "select * from voiture where Marque like'%$mc%'";
            
        } else {
            $reqSelect = "select * from voiture Limit ".$premiere_page.','.$resultat_page;
            
            
        }
        $resultat = mysqli_query($cnx, $reqSelect);
        $nbr_resultat=mysqli_num_rows($resultat);
        
 
        /**le nombre sur le total de pages disponibles */
        $total = "select * from voiture ";
        $nbr_resultat_possible=mysqli_num_rows(mysqli_query($cnx, $total));
        $num_page= ceil($nbr_resultat_possible/$resultat_page);
        
        
        
        
        
        
         while ($ligne = mysqli_fetch_assoc($resultat)) {
        ?>
        

            <div id="auto">
                <div class="card-list">
                    <div class="card-one">
                    <form method="GET">
                        <a href="reservation.php?car=<?php echo$ligne['Matricule'] ?>"> <img src="<?php echo $ligne['Photo'] ?>" /> </a> <br />
                        </form>  
                        <div class="card-price">
                            <span><?php echo $ligne['Prix'];
                                    ?><br></span>
                        </div>
                        <div class="card-info">
                            <?php echo  $ligne['Marque'] . " " . $ligne['Type']; ?>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>
        
    </div>
    <div class="pagination">
                <?php
                    /**afficher les pages */
                            for($page=1;$page<=$num_page;$page++){
                                echo '<a href=acceuil.php?page='.$page.'>'.$page.'</a>';
                            }
                    ?>
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