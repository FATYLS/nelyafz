<?php
session_start();
//recuperation des donnés da la formulaire
$id = $_POST['idc'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$date_modification = date("Y-m-d");//2021-05-05
//la chaine de connexion
include "functions.php";
$conn = connect();
//creation de req
$requette = "UPDATE categories SET nom='$nom',description='$description',date_modification='$date_modification' WHERE id='$id' ";
$resultat = $conn->query($requette);
if ($resultat){
     header('location:listec.php?modif=ok');
}
?>