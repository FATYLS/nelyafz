<?php
//echo "Id de categorie".$_GET['idc'];
$idproduit = $_GET['idp'];
include "functions.php";
$conn = connect();
$requette = "DELETE FROM produits WHERE id='$idproduit'";
$resultat = $conn->query($requette);
if($resultat)
{
header('location:listep.php?delete=ok'); }
?>