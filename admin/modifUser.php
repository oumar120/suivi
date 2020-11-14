<?php
session_start();
if (empty($_SESSION['service']) ){
  header('location:../index.php');
  exit();
}

        if (isset($_GET['v']) and !empty($_GET['v'])){
          $v=$_GET['v'];
         include('../connexion.php');
     $req=$bdd->query('select * from user where id='.$v);
         $donnee=$req->fetch(); 
      }
     if (isset($_POST['modifier'])) {
  $m=$_POST['m'];
  $login=$_POST['login'];
$password=$_POST['password'];
$service=$_POST['service'];
include('../connexion.php');
$req=$bdd->prepare('update user set login=?,password=?,service=? where id='.$m);
$req->execute(array($login,$password,$service));
header('location:user.php');
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
include('menu.php');
?>
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-8">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Modifier un Compte!</h1>
              </div>
              <form class="user" action="modifUser.php" method="post">
                <div class="form-group row">

                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="hidden" class="form-control form-control-user" value="<?php echo $donnee['id']?>" name="m">
                  </div>

                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" value="<?php echo $donnee['login']?>" name="login">
                </div>

                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="password" value="<?php echo $donnee['password']?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="service" value="<?php echo $donnee['service']?>">
                  </div>
                </div>
                <button class="btn btn-primary" type="submit" name="modifier"><i class="fa fa-edit"></i>
                modifier </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
 

</body>

</html>



