<?php
/*session_start();
if (empty($_SESSION['id']) ){
  header('location:admin/index.php');
  exit();
}*/
if (isset($_POST['envoyer'])) {
    $login=$_POST['login'];
    $password=$_POST['password'];
    $service=$_POST['service'];
    include('../connexion.php');
    $req=$bdd->prepare('insert into user(login,password,service) value(?,?,?)');
    $req->execute(array($login,$password,$service));
    if(!empty($req)){
        header('location:user.php');
        exit();
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
</head>

<body >
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-8">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Créer un Compte!</h1>
              </div>
              <form class="user" action="register.php" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user"  placeholder="Login " required name="login">
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" placeholder="Mot de Passe" required name="password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <label for="">service</label>
                    <select name="service" required>
                      <option value="DPPP">DPPP</option>
                      <option value="DPS">DPS</option>
                      <option value="BAF">BAF</option>
                      <option value="Informatique">Informatique</option>
                      <option value="DG">DG</option>}
                    </select>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit" name="envoyer" value="Creer un compte"><i class="fa fa-send"></i> Envoyer</button>
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
