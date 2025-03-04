<?php
session_start();
 if(!isset($_SESSION['nom']))
 {
     header('location:connexion.php');
    exit();
}
include "functions.php";
$conn = connect();

$client = $_SESSION['id'];



$id_produit = $_POST['produit'];
$quantite = $_POST['quantite'];

//selectionner prodsuit avec leur id
//cnx
$requette="SELECT prix,nom FROM produits WHERE id='$id_produit'";

$resultat = $conn->query($requette);
//4 resultat de req
$produit = $resultat->fetch();
$total = $quantite * $produit['prix'];
$date = date("Y-m-d");
if(!isset($_SESSION['panier'])){//panier n existe pas 
$_SESSION['panier'] = array($client,0,$date,array());
}
$_SESSION['panier'][1] += $total;
//creer panier
$_SESSION['panier'][3][] = array($quantite,$total,$date,$date,$id_produit,$produit['nom']);


// //creer panier 
// $requettep = "INSERT INTO paniers(client,total,date_creation) VALUES('$client','$total','$date')";
// $resultat = $conn->query($requettep);
// $panier_id = $conn->lastInsertId();
// //ajouter cmd
// $requette1="INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES('$quantite','$total','$panier_id','$date','$date','$id_produit')";

// $resultat = $conn->query($requette1);

header('location:panier.php');
 ?>