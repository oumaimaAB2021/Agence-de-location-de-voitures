<?php require_once('connection.php');?>

<html>
        <head>
            <title>Tableau de bord</title>
            <link rel="stylesheet" type="text/css" href="css/voiture.css"/>
           
        </head>
    <body>
        <p><h2 id=container><b>Liste des voitures</b></h2>

        <?php 

 /****nombre de resultats par page*/
 $resultat_page=5; 
 /**Determiné page courrente */
if(!isset($_GET['page'])){
   $page=1;
}else{
   $page=$_GET['page'];
} 
 $premiere_page=($page-1)*$resultat_page;

 

   $reqSelect = "select * from voiture Limit ".$premiere_page.','.$resultat_page;

$resultat1 = mysqli_query($cnx, $reqSelect);
$nbr_resultat=mysqli_num_rows($resultat1);


/**le nombre sur le total de pages disponibles */
$total = "select * from voiture ";
$nbr_resultat_possible=mysqli_num_rows(mysqli_query($cnx, $total));
$num_page= ceil($nbr_resultat_possible/$resultat_page);
            $req="select * from voiture Limit ".$premiere_page.','.$resultat_page;
            $resultat=mysqli_query($cnx,$req);
           
            echo"<p>Total: <b>".$nbr_resultat_possible."</b> voitures...</p>";
        ?>
      
        
        <table width="100%" border="1" >
            <tr>
                <th>Id</th>
                <th>Matricule</th>
                <th>Marque</th>
                <th>Type</th>
                <th>Prix</th>
                <th>Photo</th>
                <th>Supprimer</th>
                <th>Modifier</th>
            </tr>
            <?php
            while($ligne=mysqli_fetch_assoc($resultat)){
           
            ?>
            <tr>
                <td><?php echo "<center><b>" .$ligne['id']. "</center></b>"?></td>
                <td><?php echo$ligne['Matricule'] ?></td>
                <td><?php echo "<center><b>" .$ligne['Marque']."</center></b>" ?></td>
                <td><?php echo"<center><b>" .$ligne['Type']."</center></b>" ?></td>
                <td><?php echo $ligne['Prix'] ?></td>
                <td> <img src='<?php echo $ligne['Photo']?>' class="photocar"></td>
                <td><a href="supprimer.php?supcar=<?php echo$ligne['Matricule'] ?>"><img src="images/supprimer1.png" width="95px" height="95px"></a></td>
                <td><a href="modifier.php?car=<?php echo$ligne['Matricule'] ?>"><img src="images/modifier1.png" width="50px" height="50px"></a></td>
            </tr>
             <?php
                 }

            ?>
             

        </table>
        <div class="pagination">
                             <?php
                    /**afficher les pages */
                            for($page=1;$page<=$num_page;$page++){
                                echo '<a href=voiture.php?page='.$page.'>'.$page.'</a>';
                            }
                            ?>
                         </div>
    </body>
</html>