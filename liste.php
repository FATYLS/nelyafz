<?php
session_start();
include "functions.php";

if(isset($_POST['btnSubmit'])){
//changer l etat de panier
changerEtatPanier($_POST);

}
$commandes = getAllCommandes();
$paniers = getAllPaniers();
if(isset($_POST['btnSearch'])){
if($_POST['etat'] == "tout"){
$paniers = getAllPaniers();
}else{
$paniers = getPaniersByEtat($paniers,$_POST['etat']);
}
//exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
 
    <title>ADMIN : profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css">


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="deconnexion.php">Deconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <?php
       include "navigation.php";
       ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des paniers </h1>

          <?php
          ?>
          <!--liste start-->
     
          </div>  

          <div>
              <form action="liste.php" method="POST">
                <div class="form-group d-flex">

 <select name="etat" class="form-control">
                <option value="">Choisir l'etat</option>
                  <option value="En cours">En cours</option>
                  <option value="En livraison">En livraison</option>
                  <option value="Livraison termine">Livraison termine</option>
                </select>
                <input type="submit" class="btn btn-primary ml-2" value="Chercher" name="btnSearch"/>
                </div>
               
              </form>


<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Client</th>
<th scope="col">Total</th>
<th scope="col">Date</th>
<th scope="col">Etat</th>


<th scope="col">Action</th>
</tr>
</thead>
<tbody>
    <?php
    $i=0;
    foreach($paniers as $p)
    {
        $i++;
print '<tr>
<th scope="row">'.$i.'</th>
<td>'.$p['nom'].' '.$p['prenom'].'</td>
<td>'.$p['total'].' DH</td>
<td>'.$p['date_creation'].'</td>
<td>'.$p['etat'].'</td>


<td>
<a data-bs-toggle="modal" data-bs-target="#Commandes'.$p['id'].'" class="btn btn-success">Afficher</a>
<a data-bs-toggle="modal" data-bs-target="#Traiter'.$p['id'].'"class="btn btn-primary">Traiter</a>

</td>
</tr>';
    }
    ?>

</tbody>
</table>

<!-- Button trigger modal -->
</div>
          
        </main>
      </div>
    </div>

    
<?php
foreach($paniers as $index => $p){?>
 
    <div class="modal fade" id="Commandes<?php echo $p['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Liste des commandes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
    <table class="table">
        <thead>
            <tr>
                <th>
                    Nom produit
                </th>
                <th>
                    Image
                </th>
                <th>
                Quantite
                </th>
                <th>
                    Total
                </th>
                <th>
                    Panier
                </th>

            </tr>
        </thead>
        <tbody>
        <?php 
             foreach($commandes as $index => $c)
             if($c['panier']==$p['id'])
             {

            
             {

                print'
                <tr>
                <td>
                '.$c['nom'].'
                </td>
                <td><img src="images/'.$c['image'].'" width="100"/>

                </td>
                <td>
                '.$c['quantite'].'

                </td>
                <td>
                '.$c['total'].' DH

                </td>
                <td>
                '.$c['panier'].'

                </td>
                
                </tr>';
                
             } }
             ?>

        </tbody>
    </table>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
      </div>






<?php
}

 
foreach($paniers as $index => $p){?>
 
  <div class="modal fade" id="Traiter<?php echo $p['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Traiter les commandes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="hidden" value="<?php echo $p['id'];?>" name="panier_id">
          <div class="form-group">
          <select name="etat" class="form-control">

          <option value="En cours">En cours</option>
<option value="En livraison">En livraison</option>
<option value="Livraison termine">Livraison termine</option>
</select>
          </div>
<div class="form-group">
<button type="submit" name="btnSubmit" class="btn btn-primary">Sauvegardez</button>

</div>


        </form>
    </div>
    <div class="modal-footer">

    </div>
  </div>
</div>
    </div>






<?php
}

?>

<!-- Modal ajouter -->

<!-- Modal modifier -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
    <script>
function popUpDeleteCategorie(){
  return confirm("Voulez vous supprimer la catégorie ?");
}
  
</script>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>
<script>

  $('#addform').submit(function(){
if($('#nom').val() == ""){
  $('#blocknom').append('<p class="text-danger">s il vous plait il faut remplir le champ nom </p>');
  return false;
}
  })
</script>

</html>
