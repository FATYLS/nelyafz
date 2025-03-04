<?php
require_once("cnx.php");

if (isset($_POST['envoyer'])) {
        //print_r($_POST);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $tel = $_POST['telephone'];
        $mp = $_POST['mp'];

        $req = "INSERT INTO clients (nom,prenom,email,mp,telephone) VALUES ('$nom','$prenom','$email','$mp','$tel')";
        $resultat = mysqli_query($cnx, $req);
        echo "<script type='text/javascript'>alert('Nous avons bien reçu votre demande. Nous vous contacterons le plus rapidement possible');</script>";
}
?>
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
					<h2 class="heading-section">SIGN UP</h2>
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

	</body>
</html>

                                                               