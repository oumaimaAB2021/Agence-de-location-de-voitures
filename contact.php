<?php require_once('connection.php'); ?>
<html>
    <head>
        <title>Contact </title>
        <link rel="stylesheet" type="text/css" href="css/contact.css">
        <meta charset="UTF-8">
       
       
    </head>
    <body>
        <div class="logo">
        <img src="images/Logo4.png" height="100" width="130" ></div>
        <div class="contact-title">
            <h1>Bienvenue...</h1>
            <h2>Nous sommes toujours a votre service !</h2>
        </div>

        <div class="contact form">
            <form id="contact-form" method="post" >
                 <input  name="name" type="text" class="form-control" placeholder="Entrer votre nom"  required  >
                <br>
               

                  
                <input name="email" type="email" class="form-control" placeholder="Entrer votre  email" required>
                   
                <br>
                <textarea name="message" class="form-control" placeholder="Message"  required>
                </textarea><br>
                <input type="submit" class="form-control submit"   name="btn" value="Envoyer Message"></a>
                
               
                  <?php if(isset($_POST['btn'])) {

                  ?>
                <a href="mailto:touristique2021@gmail.com?cc=<?php echo $_POST['email'];?>&subject=
                <?php echo "Demande de mr/mme : ".$_POST['name'];?>
                &body=<?php echo$_POST['email'].'   '.$_POST['message'];?>"> 
                <input type="text" style="width:1px;background: transparent;border: none;outline: none;color: #fff;
       margin-bottom: 16px;">
       
                
               
            <?php   } ?>
                          
                 
               

                    

                    
                       
                       
                
                    

            </form>
        </div>
    </body>
</html>