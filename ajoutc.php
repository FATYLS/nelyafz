<?php
session_start();
//recuperation des donnés da la formulaire
$nom = $_POST['nom'];
$description = $_POST['description'];
$createur = $_SESSION['id'];
$date_creation = date("Y-m-d");//2021-05-05
//la chaine de connexion
include "functions.php";
$conn = connect();


try {
  //creation de req
$requette = "INSERT INTO categories(nom,description,createur,date_creation) VALUES('$nom','$description','$createur','$date_creation')";
$resultat = $conn->query($requette);
if ($resultat){
     header('location:listec.php?ajout=ok');
}
   } catch(PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
   if($e->getcode() == 23000){
header('location:listec.php?erreur=duplicate');   }
   }
?>