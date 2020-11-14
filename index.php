<?php
session_start(); 

if (isset($_POST['envoyer'])) {
  if (!empty($_POST['login'] and !empty($_POST['password']))) {
    $login=htmlspecialchars($_POST['login']);
    $password=htmlspecialchars($_POST['password']);
    include('connexion.php');
    $req=$bdd->prepare('select service from user where login=? and password=?');
    $req->execute(array($login,$password));
    $donnee=$req->fetch();
    if(!empty($donnee)){
      $_SESSION['service']=$donnee['service'];
      if ($_SESSION['service']=="maximum") {
        header('location:admin/index.php');
        exit();
      }else{
      header('location:accueil.php');
           exit();
      }
    }else ?>
<script> alert("login ou mot de passe incorrecte") </script>
 <?php } } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="index.php">
					<span class="login100-form-title p-b-34 p-t-27">
						<i class="fa fa-user"></i> Bienvenue!
					</span>

					<div class="wrap-input100 validate-input" data-validate = "saisir un nom d'utilisateur">
				<input class="input100" type="text" name="login" placeholder="nom d'utilisateur" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="saisir un mot de passe">
				<input class="input100" type="password" name="password" placeholder="mot de passe" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
				<input type="submit" name="envoyer" value="se connecter" class="login100-form-btn" style="color:white;"> 
					</div>
				</form>
			</div>
		 <img src="images/logo.jpg" class="col-lg-4 d-none d-lg-block" style="padding-left:0px;height: 390px;">
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="js/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>