<?php
session_start();

$nom = $_POST['nom'];

$description = $_POST['description'];
$prix = $_POST['prix'];
$createur = $_POST['createur'];
$categorie = $_POST['categorie'];
$quantite=$_POST['quantite'];
$date_creation =date("Y-m-d");
//uploader une image 
$target_dir = "images/";

$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  $date = date('Y-m-d');
  include "functions.php";
$conn = connect();


try {
    //creation de req
  
    $requette = "INSERT INTO produits(nom,description,prix,image,createur,categorie,date_creation) VALUES('$nom','$description','$prix','$image','$createur','$categorie','$date')";
    $resultat = $conn->query($requette);
   
  if ($resultat){

    $produit_id = $conn->lastInsertId();
    $requette2="INSERT INTO stocks(produit,quantite,createur,date_creation)VALUES('$produit_id','$quantite','$createur','$date_creation')";
if($conn->query($requette2)){
  header('location:listep.php?ajout=ok');

}else{

  echo "impossible d'ajouter le stock de produit";
}
  }
     } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
     if($e->getcode() == 23000){
  header('location:listec.php?erreur=duplicate');   }
     }
?>