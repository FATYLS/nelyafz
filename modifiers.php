<?php
session_start();
//recuperation des donnés da la formulaire
$id = $_POST['idstock'];
$quantite = $_POST['quantite'];
$description = $_POST['description'];
$date_modification = date("Y-m-d");//2021-05-05
//la chaine de connexion
include "functions.php";
$conn = connect();
//creation de req
$requette = "UPDATE stocks SET quantite= '$quantite' WHERE id='$id' ";
$resultat = $conn->query($requette);
if ($resultat){
     header('location:listes.php?modif=ok');
}
?>