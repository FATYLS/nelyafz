<?php
session_start();
include "functions.php";
$conn = connect();
//id client
$client = $_SESSION['id'];
$total = $_SESSION['panier'][1];
$date = date('Y-m-d');
// //creer panier 
 $requettep = "INSERT INTO paniers(client,total,date_creation) VALUES('$client','$total','$date')";
 $resultat = $conn->query($requettep);
 $panier_id = $conn->lastInsertId();
 $commandes = $_SESSION['panier'][3];
 foreach($commandes as $commande){
     $quantite=$commande[0];
     $total=$commande[1];
     $id_produit=$commande[4];

// //ajouter cmd
 $requette1="INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES('$quantite','$total','$panier_id','$date','$date','$id_produit')";

 $resultat = $conn->query($requette1);
 }
 //suppression de panier
$_SESSION['panier'] = null;
header('location:index.php');
?>