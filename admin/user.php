<?php
/*session_start();
if (empty($_SESSION['id']) ){
  header('location:index.php');
  exit();
}*/

if(!empty($_GET['v'])){
  $v=$_GET['v'];
  include('../connexion.php');
  $bdd->query("delete from user where id=".$v);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>FIMF</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/kube.min.css" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/custom.min.css" />
    <link rel="shortcut icon" href="img/favicon.jpg" />
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<body>
  <!-- Navigation -->
 <?php
include('menu.php');
 ?> 
  <div class="container" style="padding-top:30px;">
<div class="card shadow mb-4"  >
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>login</th>
                      <th>mot de passe</th>
                      <th>service</th>
                      <th>modifier</th>
                      <th>supprimer</th>
                    </tr>
                  </thead>
        <?php 
         include('../connexion.php');
         $req=$bdd->query('select * from user');
         while ($donnee=$req->fetch()) {     
        ?>
                  <tbody>
                    <tr>
                      <td><?php echo $donnee['login']?></td>
                      <td><?php echo $donnee['password']?></td>
                      <td><?php echo $donnee['service']?></td>
            <td><a href="modifUser.php?v=<?php echo $donnee['id'] ?>" title="" ><i class="fa fa-edit"></i></a></td>
             <td><a href="user.php?v=<?php echo $donnee['id'] ?>" title="" ><i class="fa fa-trash"></i></a></td>
                    </tr>
                  </tbody>
          <?php } ?>
                </table>
              </div>
          </div>
      </div>

  <!-- Javascript -->
  <script src="../js/jquery.min.js"></script>
    <script src="../js/kube.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>
</body>
</html>