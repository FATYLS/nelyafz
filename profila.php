<?php
session_start();
include "functions.php";
if (isset($_POST['btnEdit'])){
if (EditAdmin($_POST)) {
$_SESSION['nom'] = $_POST['nom'];
$_SESSION['email'] = $_POST['email'];
}
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
            <h1 class="h2">Profile</h1>
          <div>
              <?php
              echo $_SESSION['nom'];
              
              ?>
          </div>
         
          </div>
<div class="container">
          <h1>Nom : <span class="text-primary"> <?php echo $_SESSION['nom'];?> </span></h1>
          <h1>Email :  <span class="text-primary"> <?php echo $_SESSION['email'];?> </span></h1>
          <a data-toggle="modal" data-target= "#profileEdit" class="btn btn-primary">Modifier</a>

</div>
         
          
        </main>
      </div>
    </div>

    <div class="modal fade" id="profileEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="profila.php" method="POST">
            <input type="hidden" value="<?php echo $_SESSION['id'];?> " name="id_admin">
            <div class="form-group">
            <input type="text" name="nom" class="form-control" placeholder="Tappez votre nom" value="<?php echo $_SESSION['nom'];?>">
            </div>
            <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Tappez votre email" value="<?php echo $_SESSION['email'];?>">
            </div>
             <div class="form-group">
            <input type="password" name="mp" class="form-control" placeholder="Tappez votre mot de passe">
           </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="btnEdit" class="btn btn-primary">Modifier</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  




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
    
  </body>
</html>
