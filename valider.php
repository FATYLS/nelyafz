<?php
$idvisiteur = $_GET['id'];
include "functions.php";
$conn = connect();
$requette = "UPDATE clients SET etat=1 WHERE id = '$idvisiteur'";
$result = $conn->query($requette);
if($result){
 header('location:listev.php?valider=ok');
}else{
    echo "Erreur de validation";
}
?> 