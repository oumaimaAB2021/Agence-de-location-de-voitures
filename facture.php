<?php
require_once('connection.php');
session_start();

$imm=$_SESSION['imm'];
$reqSelect = "select * from voiture where Matricule ='$imm'";
    $resultat = mysqli_query($cnx, $reqSelect);
     if($ligne = mysqli_fetch_assoc($resultat)){

$Marque = $ligne['Marque'];

$Type= $ligne['Type'];

$Prix = $ligne['Prix'];}


require('fpdf.php');

//Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
$pdf = new FPDF('P', 'mm', 'A5');

//Ajouter une nouvelle page
$pdf->AddPage();

// entete
$pdf->Image('images/Logo4.png', 10, 5, 30, 20);

// Saut de ligne
$pdf->Ln(18);


// Police Arial gras 16
$pdf->SetFont('Arial', 'B', 16);

// Titre
$pdf->Cell(0, 10, 'Facture de location', 'TB', 1, 'C');


// Saut de ligne
$pdf->Ln(5);

// Début en police Arial normale taille 10

$pdf->SetFont('Arial', '', 10);
$h = 7;
$retrait = "      ";

$pdf->Write($h, "Je soussigné, Directrice de l'agence de location de voiture One Click Certifie que : \n");

$pdf->Write($h, $retrait . "Le/La client(e) : ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', 'BIU');
$pdf->Write($h, "".$_SESSION['nom']." ".$_SESSION['prenom'] . "\n");

//Ecriture normal
$pdf->SetFont('', '');



$pdf->Write($h, $retrait . "CIN  : " . $_SESSION['cin']. " \n");

$pdf->Write($h, $retrait . "Numéro de Permis: " . $_SESSION['pr'] . " \n");

$pdf->Write($h, $retrait . "Email:  " . $_SESSION['email'] . " \n");

$pdf->Write($h, $retrait . "N° Tel :  " . $_SESSION['tel'] . "  \n");

$pdf->Write($h, $retrait . "Date Début :  " . $_SESSION['date1']. " \n");

$pdf->Write($h, $retrait . "Date Expiration :  " . $_SESSION['date2']. "  \n");

$pdf->Write($h, "A réservé la voiture " . $Marque. " ".  $Type ." de matricule  " .$_SESSION['imm'] . " avec prix de \n location : ". $Prix ."dh/j . \n");

$pdf->Write($h, "La présente attestation est délivrée à l'intéressé Pour servir et valoir ce que de droit. \n");

$pdf->Cell(0, 5, 'Fait  Le :' . date('d/m/Y'), 0, 1, 'C');

// Saut de ligne
$pdf->Ln(3);

// Décalage de 20 mm à droite
$pdf->Cell(20);
$pdf->Cell(80, 8, "La directrice de l'agence", 1, 1, 'C');

// Décalage de 20 mm à droite
$pdf->Cell(20);
$pdf->Cell(80, 5, "Mme ABOUTARA BELRHITI Oumaima", 'LR', 1, 'C');
$pdf->Image('images/signature.png', 50, 155, 30, 20);
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C'); // LR Left-Right
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LRB', 1, 'C'); // LRB : Left-Right-Bottom (Bas)
// Saut de ligne
$pdf->Ln(7);
$pdf->Write($h, "NOUS VOUS REMERCIONS DE VOTRE CONFIANCE. \n");

//Afficher le pdf
$pdf->Output('', '', true);
?>