<?php
require_once('connection.php');
  



?>
<html>
<head>
    <meta charset="UTF-8">
    <style>
            * {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  margin-right: 70;
  
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding in columns */
.row {margin: 30 90px;
        padding-top: 20px;
        padding-left: 130px;
        margin-right: 50px;
        

}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
  
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
  color:white;
  border-radius: 20px;
  height: 90px;
 


}

/* Responsive columns - one column layout (vertical) on small screens */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
    
  }
}
    </style>
</head>
    <div class="row">
    <div class="column" >
        <?php $total1 = "select * from voiture ";
        $nbr_total=mysqli_num_rows(mysqli_query($cnx, $total1));?>
        <div class="card" style="background-color:#3498db" >Nombre de Voitures <br><br> 
            <?php  echo"<center><b>".$nbr_total."</b></center> "?>
         </div>
    </div>
    <div class="column">
    <?php $total2 = "select distinct(idVoiture) from client ";
        $loc=mysqli_num_rows(mysqli_query($cnx, $total2));?>
        <div class="card" style="background-color:#c0392b">Nombre de Location<br><br> 
            <?php  echo"<center><b>".$loc."</b></center> "?>
        </div>
    </div>
    <div class="column">
    <?php $total3 = "select distinct(cin) from client ";
        $cl=mysqli_num_rows(mysqli_query($cnx, $total3));?>
        <div class="card" style="background-color:orange">Total Client<br><br> 
            <?php  echo"<center><b>".$cl."</b></center> "?>
        </div>
    </div>
    
    </div>
</html>