<?php require_once('connection.php');?>
<html>
    <head>
        <title>Update Password </title>
         <link rel="stylesheet" type="text/css" href="css/login.css"/>
         
    </head>
    <body>

    <div class="loginbox">
             <img src="images/user.png" class="avatar">
            <h1>Modifier mot de passe</h1>
            <form action="" method="post" class="formulaire">
                        <p>Nom d'utilisateur</p>
                        <input type="text"  placeholder="Entrer votre nom d'utilisateur" name="txtlogin" required>
                        <p>Mot de passe</p>
                        <input type="password"  placeholder="Entrer votre nouveau mot de passe" name="txtpw" required>
                        <p>Conformité de mot de passe</p>
                        <input type="password"  placeholder="Entrer votre  nouveau mot de passe" name="txtpw2" required>
                        <input type="submit"   name="btlogin" value="Changer mot de passe">
                        
                        

                <?php
                    if(isset($_POST['btlogin'])){
                        if($_POST['txtpw']!=$_POST['txtpw2']){
                            echo"<br><center><font color='red'> Les mots de passe ne sont pas identiques </center> </font>";
                        }
                        else{
                        $req="select * from utilisateur where login='".$_POST['txtlogin']."'";
                        if($resultat=mysqli_query($cnx,$req)){
                            $req2="Update utilisateur Set password='".$_POST['txtpw']."' Where login='".$_POST['txtlogin']."'";
                            $resultat2=mysqli_query($cnx,$req2);
    
                            if($resultat2){
                                echo "Mise à jour réussi...";
                                header("location:login.php");
                            }else{
                                echo "Mise à jour échoué...";
                            }
                        }     
                          else{
                            echo"<br><center><font color='red'> Les données sont invalides</center> </font>";}

                       
                    }
                    }

                ?>
                
            </form>

            
        </div>


    </body>


</html>