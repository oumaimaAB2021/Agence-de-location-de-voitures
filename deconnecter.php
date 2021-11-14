<?php require_once('connection.php');?>

<html>
        
    <body>
        <?php
            session_start();/*Démarer une session */
            session_unset();/* Détruire toute les variables de la session en cours */
            session_destroy();/*Détrouire la session  caremment*/

            header('location:index.html');/*se rederiger vers la page principale */

        ?>

    </body>
</html>