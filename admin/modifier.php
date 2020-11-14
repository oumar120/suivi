<?php
session_start();
if (empty($_SESSION['id']) ){
  header('location:../index.php');
  exit();
}

        if (isset($_GET['v']) and !empty($_GET['v'])){
          $v=$_GET['v'];
         include('../connexion.php');
     $req=$bdd->query('select * from donnee where id='.$v);
         $donnee=$req->fetch(); 
      }
     if (isset($_POST['modifier'])) {
  $v=$_POST['v'];
$nom1=$_POST['nom1'];
$nom2=$_POST['nom2'];
$nom3=$_POST['nom3'];
$nom4=$_POST['nom4'];
$nom5=$_POST['nom5'];
$nom6=$_POST['nom6'];
$nom7=$_POST['nom7'];
$nom8=$_POST['nom8'];
$nom9=$_POST['nom9'];
include('../connexion.php');
$req=$bdd->prepare('update donnee set
  numero=?,sigle=?,nom_develope=?,tel=?,tel_pca=?,region=?,departement=?,type=?,situation=? where id='.$v);
$req->execute(array($nom1,$nom2,$nom3,$nom4,$nom5,$nom6,$nom7,$nom8,$nom9));
if ($_SESSION['id']=="maximum") {
  header('location:index.php');
}else{
  header('location:../accueil.php');
}

}     
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Incription</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="../css/kube.min.css" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/custom.min.css" />
    <link rel="shortcut icon" href="../img/favicon.jpg" />
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body >
<?php
if ($_SESSION['id']=="maximum") {
  include('menu.php');
}else{
  include("../menu_fort.php");
}

?>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-8">
            <div class="p-5">
                <h1 class="h4 text-gray-900 mb-4 text-center"><i class="fa fa-envelope"></i> Formulaire d'ajout</h1>
              <hr>
              <form action="modifier.php" method="post">
                    <div class="form-group">
                <input  name="v" type="hidden" value="<?php echo $donnee['id']?>">
                  </div>

                  <div class="form-group">
                <input type="text" name="nom1" class="form-control form-control-user" required value="<?php echo $donnee['numero']?>">
                  </div>

                <div class="form-group">
              <input type="text" name="nom2" class="form-control form-control-user" required value="<?php echo $donnee['sigle']?>">
                </div>

                <div class="form-group">
                  <input type="text" name="nom3" class="form-control form-control-user" required value="<?php echo $donnee['nom_develope']?>">
                </div>

                 <div class="form-group">
                <input type="number" name="nom4" class="form-control form-control-user" required value="<?php echo $donnee['tel']?>">
                </div>

                 <div class="form-group">
                <input type="text" name="nom5" class="form-control form-control-user" required value="<?php echo $donnee['tel_pca']?>">
                </div>

                 <div class="form-group">
                <input type="text" name="nom6" class="form-control form-control-user" required value="<?php echo $donnee['region']?>">
                </div>

                 <div class="form-group">
                <input type="text" name="nom7" class="form-control form-control-user" required value="<?php echo $donnee['departement']?>">
                </div>

                <div class="form-group">
                <input type="text" name="nom8" class="form-control form-control-user" required value="<?php echo $donnee['type']?>">
                </div>

                 <div class="form-group">
                <input type="text" name="nom9" class="form-control form-control-user" required value="<?php echo $donnee['situation']?>">
                </div>

                <button type="submit" class="btn btn-primary btn-block" name="modifier"><i class="fa fa-edit"></i> modifier
                </button>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>  

  <!-- Bootstrap core JavaScript-->
 

</body>

</html>



