<?php
include "functions.php";
$showRegistrationAlert = 0;
$categories = getAllCategories();
if(!empty ($_POST)){
 if (AddVisiteur($_POST)){
   $showRegistrationAlert = 1;
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NELYA NATURE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css">
  </head>
<body>


    <form action="registre.php" method="POST">
    <!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Inscription</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	
                                        <form action="inscription.php" method='POST' class="signin-form">
		      		<div class="form-group">
		      			<input type="label" class="form-control" placeholder="nom" required>
		      		</div>
					  <div class="form-group">
						<input type="labe" class="form-control" placeholder="prenom" required>
					</div>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="email" required>
					</div>
					<div class="form-group">
						<input type="tel" class="form-control" placeholder="telephone" required>
					</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Mot de passe" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="envoyer"  class="form-control btn btn-primary submit px-3">Inscrire</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	
	            </div>
	          </form>
	          
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>
<?php
if($showRegistrationAlert == 1){
print "<script>
Swal.fire({
  title: 'Success',
  text: 'Creation de compte avec succes',
  icon: 'success',
  confirmButtonText: 'ok'
})
</script>";}
?>
</html>



