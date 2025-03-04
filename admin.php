<?php
session_start();
if(!isset($_SESSION['nom']))
{
   //header('location:profil.php');
}
include "functions.php";
$user = true;
if(!empty($_POST)){
   $user = ConnectAdmin($_POST);
   if( is_array($user) && count($user)> 0 )//utilisateur connecte
   {
     Session_start();
     $_SESSION['id'] = $user['id'];
     $_SESSION['email'] = $user['email'];
     $_SESSION['nom'] = $user['nom'];
     $_SESSION['mp'] = $user['mp'];
     header('location:profila.php');//la redirection de page profil */
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css">
</head>
<body>

      <!--fin nav-->

<div class="col-12 p-5">
   <h1 class="text-center" >Espace Admin : Connexion</h1>
    <form action="admin.php" method="POST">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

       

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="mp">
          </div>
      
        <button type="submit" class="btn btn-primary">connecter</button>
      </form>

</div>

     <!--footer-->
     <?php 
     include "footer.php";
     ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>
<?php
if(!$user){
print "<script>
Swal.fire({
  title: 'Erreur',
  text: 'Cordonnes non valide',
  icon: 'error',
  confirmButtonText: 'ok'
})
</script>";}
?>
</html>