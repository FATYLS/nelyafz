<?php
session_start();
include "functions.php";
$categories = getAllCategories();
if (isset($_GET['id']))
{
    $produit = getProduitById($_GET['id']);
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
      <div class="row col-12 mt-4">
      <?php if(isset ($_SESSION['etat']) && $_SESSION['etat']==0){
        print '  <div class="alert alert-danger">
        Compte non validée 
        </div>
        ';
      }?> 


        
      <div class="card col-8 offset-2" >
  <img src="images/<?php echo $produit['image'];?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $produit['nom']?></h5>
    <p class="card-text"><?php echo $produit['description']?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $produit['prix']?> DH</li>
    <?php 
    foreach($categories as $index => $c)
    {
      if($c['id'] == $produit['categorie']){
      print'  <button class="btn btn-success mb-2">'. $c['nom'].'</button>';

      }
    }
    ?>
  </ul>
  <div class="col-12 m-2">
    <form action="commander.php" method="POST" class="d-flex">
<input  type="hidden" value="<?php echo $produit['id']?>" name="produit"/>
    <input type="number" name="quantite" class="form-control" step="1" placeholder="Choisissez la quantité du produit"/>
    <button type="submit" <?php if(isset($_SESSION['etat']) && $_SESSION['etat']==0 || !isset($_SESSION['etat']) ){echo "disabled";}?> class="btn btn-primary">Commander</button>
    </form>
  </div>
  </div>

</div>
        <?php 
     include "footer.php";
     ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>