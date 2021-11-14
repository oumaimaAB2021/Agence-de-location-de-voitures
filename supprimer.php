<?php require_once('connection.php');?>
<html>
    <head>
        <title>Supprimer</title>
       

    </head>
    <body>
    
        <?php
            if(isset($_GET['supcar'])){
                $sup=$_GET['supcar'];
                $req="Delete From voiture where Matricule='$sup'";
                $resultat=mysqli_query($cnx,$req);

            }
            if($resultat){
                header('Location:voiture.php');
            }else{
                echo "<label style='text-align: center; color: #960406;'>La suppression a échouée ...</label>";
            }

        ?>
       
    </body>
</html>