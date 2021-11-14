<?php require_once('connection.php');?>
<html>
    <head>
        <title>Authentification </title>
         <link rel="stylesheet" type="text/css" href="css/login.css"/>
         
    </head>
    <body>

    <div class="loginbox">
             <img src="images/user.png" class="avatar">
            <h1>Authentification</h1>
            <form action="" method="post" class="formulaire">
                <p>Nom d'utilisateur</p>
                        <input type="text"  placeholder="Entrer votre nom d'utilisateur" name="txtlogin" required>
                        <p>Mot de passe</p>
                        <input type="password"  placeholder="Entrer votre mot de passe" name="txtpw" required>
                        <input type="submit"   name="btlogin" value="Se connecter">
                        <center><a href="password.php">Mot de passe oublié?</a><br></center>
                        

                <?php
                    if(isset($_POST['btlogin'])){
                        $req="select * from utilisateur where login='".$_POST['txtlogin']."'and password='".$_POST['txtpw']."'";
                        if($resultat=mysqli_query($cnx,$req)){
                            $ligne=mysqli_fetch_assoc($resultat);
                            if($ligne!=0){
                                session_start();
                                $_SESSION['monLogin']=$_POST['txtlogin'];
                                header("location:acceuilAdmin.php");
                            }
                            else
                            echo"<center><font color='red'> Les données sont invalides</center> </font>";
                        }
                    }

                ?>
                
            </form>

            
        </div>


    </body>


</html>


