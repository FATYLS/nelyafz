<?php
session_start();
include "functions.php";
//var_dump($_SESSION['panier']);
$total=0;
if(isset($_SESSION['panier'])){
  $total = $_SESSION['panier'][1];
}

$categories = getAllCategories();
if (!empty($_POST)){
 // echo $_POST['search'];
  $produits = searchProduits($_POST['search']);
}
else{
  $produits = getAllProducts();
}$commandes = array(); 
if(isset($_SESSION['panier'])){
    if(count($_SESSION['panier'][3])>0){
        $commandes = $_SESSION['panier'][3];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
   <?php  
include "header.php";
   ?>

      <div class="row col-12 mt-4 p-5">

<h1>panier utilisateur</h1>       
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">Quantité</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
      <?php
foreach ($commandes as $index => $commande) {
print '<tr>
<th scope="row">'.($index+1).'</th>
<td>'.$commande[5].'</td>
<td>'.$commande[0].' Pieces</td>
<td>'.$commande[1].' DH</td>
<td> <a href="enlever_panier.php?id='.$index.'" class="btn btn-danger">Supprimer</a></td>
</tr>';    
 }
      ?>
  </tbody>
</table>
<div class="text-end mt-3">
  <h1>Total :<?php echo $total; ?> DH</h1>
  <hr>
  <a href="valider_panier.php" class="btn btn-success" style="width: 200px">Valider</a>

</div>
 </div>
     <?php 
     include "footer.php";
     ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>