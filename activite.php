<?php
include('connexion.php');
session_start();
if (empty($_SESSION['service']) ){
  header('location:index.php');
  exit();
}
if (isset($_GET['m']) and !empty($_GET['m'])) {
  $m=$_GET['m'];
  if ($m==1) {
?>
<script >alert("les données ont été enregistrées avec succés!")</script>
<?php 
}else{
 ?>
 <script >alert("Une Erreur est survenue,veuillez réessayer s'il vous plait!")</script>
<?php 
}}
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Application de suivi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link type="text/css" href="css/font-awesome.min.css" rel="stylesheet">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="css/OverlayScrollbars.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="background-color:#dee2e6">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
    <?php 
     $req=$bdd->query('select * from tache where etat="en cours"');
     $n=0;
      while ($reponse=$req->fetch()) {
      $date_fin=strtotime($reponse['date_fin']);
      $duree=abs($date_fin-time());
      $delai=intval($duree/3600);
      if ($duree<=86400) {
        $n++;
      } }
     ?>
<ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $n; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <?php if ($n==0) { ?>
              <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <strong>Notifications</strong>
                  <span class="float-right text-sm text-danger"><i class="fa fa-bell"></i></span>
                </h3>
                <p class="text-sm">Vous n'avez rien de prévu pour le moment, merci de repasser plus tard </p>
              </div>
            </div>
          <?php
             }
          $req=$bdd->query('select * from tache where etat="en cours"'); 
           while ($reponse1=$req->fetch()) {
            $id_activite=$reponse1['id_activite'];
            $id=$bdd->prepare('select id,nom from activite where id_activite=?');
            $id->execute(array($id_activite));
            $id=$id->fetch();
      $date_fin1=strtotime($reponse1['date_fin']);
      $duree1=abs($date_fin1-time());
      $delai1=date("H",$duree1);
      $delai2=date("i",$duree1);
      if ($duree1<=86400) {
           ?>
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Tache:<strong><?php echo " ".$reponse1['nom']; ?></strong>
                  <span class="float-right text-sm text-danger"><i class="fa fa-bell"></i></span>
                </h3>
                <p class="text-sm"><strong><?php echo $reponse1['responsable']; ?></strong>, vous avez une tache à finir dans l'activité <strong><?php echo $id['nom']; ?></strong> ayant l'identifiant <strong><?php echo $id['id']; ?></strong> </p>
                <p class="text-sm"><i class="fa fa-clock-o mr-1"></i>expire dans <?php echo $delai1."H-".$delai2."min"; ?></p>
              </div>
            </div>
            <!-- Message End -->
            <div class="dropdown-divider"></div>
          <?php } } ?>
          </a>
          
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
    </ul>
    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="accueil.php" class="brand-link">
      <img src="images/logo.jpg" alt="FIMF" class="brand-image img-circle elevation-2">
      <span class="brand-text font-weight text-dark">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <?php include('menu.php') ; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#dee2e6">
    <?php 
    if ($_SESSION['service']=="DG") {
      $req=$bdd->prepare('select * from activite where percent=? and YEAR(date_debut)=?');
     $req->execute(array(100,date("Y")));
     $count=$req->rowCount();
     $annee=$req->fetch();
     $req1=$bdd->prepare('select * from tache where etat=? and YEAR(date_debut)=?');
     $req1->execute(array("en cours",date("Y")));
     $count1=$req1->rowCount();
     $req2=$bdd->prepare('select * from tache where etat=? and YEAR(date_debut)=?');
     $req2->execute(array("termine",date("Y")));
     $count2=$req2->rowCount();
     $req3=$bdd->prepare('select * from tache where etat=? and YEAR(date_debut)=?');
     $req3->execute(array("en retard",date("Y")));
     $count3=$req3->rowCount();
    }else{
     $req=$bdd->prepare('select * from activite where percent=? and (YEAR(date_debut)=? and service=?)');
     $req->execute(array(100,date("Y"),$_SESSION['service']));
     $count=$req->rowCount();
     $annee=$req->fetch();
     $req1=$bdd->prepare('select * from tache where etat=? and(YEAR(date_debut)=? and service=?)');
     $req1->execute(array("en cours",date("Y"),$_SESSION['service']));
     $count1=$req1->rowCount();
     $req2=$bdd->prepare('select * from tache where etat=? and(YEAR(date_debut)=? and service=?)');
     $req2->execute(array("termine",date("Y"),$_SESSION['service']));
     $count2=$req2->rowCount();
     $req3=$bdd->prepare('select * from tache where etat=? and(YEAR(date_debut)=? and service=?)');
     $req3->execute(array("en retard",date("Y"),$_SESSION['service']));
     $count3=$req3->rowCount();
    }
    ?>
    <h2 class="ml-2">Statistiques de l'année <?php echo date("Y"); ?></h2>
    <div class="container-fluid mt-3">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-tasks"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Activités terminées</span>
                <span class="info-box-number">
                 <?php echo $count; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-refresh"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">taches en cours</span>
                <span class="info-box-number"><?php echo $count1; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">taches terminées</span>
                <span class="info-box-number"><?php echo $count2; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-warning"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">taches en retard</span>
                <span class="info-box-number"><?php echo $count3; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
      </div>
      <div class="col-lg-12">
        <div class="card m-4 pb-1">
          <div class="card-header">
            <?php if ($_SESSION['service']=="DPPP" or $_SESSION['service']=="DPS" or $_SESSION['service']=="BAF" or $_SESSION['service']=="Informatique" ) {
              echo "<button  class='btn-info ajout'><i class='fa fa-plus'></i> ajouter</button>";
            }?> 
          </div>
        <div class="card-body">
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="activite" width="100%" cellspacing="0">
                  <thead style="background-color: #17a2bb;color:white;">
                    <tr>
                      <th>ID</th>
                      <th>Service</th>
                      <th>activité</th>
                      <th>date début</th>
                      <th>Durée</th>
                      <th>% d'achevement</th>
                      <th>taches</th>
                    </tr>
                   
                  </thead>
                  <tfoot style="background-color: #17a2bb;color:white;">
                    <tr>
                      <th>ID</th>
                      <th>Service</th>
                      <th>activité</th>
                      <th>date début</th>
                      <th>Durée</th>
                      <th>% d'achevement</th>
                      <th>taches</th>
                    </tr>
                   
                  </tfoot>
                </table>
              </div>
            </div>
                </div>                    
          </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
   <p style="text-align: center"><strong>&copy; FIMF-2020</strong>
    tout droit reservé
  </p>
  </footer>
  <!-- le modal pour l'ajout-->
  <div class="modal fade" id="modalA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form method="post" action="admin/crud.php">    
            <div class="modal-body">
              <p class="text-center" style="font-weight: bold; background-color:red; ">Activité</p>
              <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group">
                    <label for="" class="col-form-label">nom:</label>
                    <input type="text" class="form-control" name="activite">
                    </div>
                    </div>     
                </div>
               <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">date début:</label>
                    <input type="date" class="form-control" name="date_activite">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">le service:</label>
                  <input type="text" class="form-control" name="service" value="<?php echo $_SESSION['service'] ?>" readonly>
                        </div>
                    </div> 
                  </div>
              <div id="contenu">
                <p class="text-center" style="font-weight: bold; background-color:orange; ">Taches</p>
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">nom:</label>
                    <input type="text" class="form-control" name="tache[]">
                    </div> 
                    </div>  
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">date début:</label>
                    <input type="date" class="form-control" name="date_debut[]">
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">délai de traitement en jour:</label>
                    <input type="number" class="form-control" name="echeance[]">
                    </div>               
                    </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">responsable:</label>
                    <input type="text" class="form-control" name="responsable[]">
                    </div>
                    </div> 
                  </div>   
              </div>
                
              <div class="card-body">
                    <div>
                        <a class="btn btn-success btn-sm" id="add" role="button"><i class="fa fa-plus"></i> Ajouter plus de taches</a>
                        <input type="submit" class="btn btn-primary btn-sm" value="Soumettre" name="send" >
                    </div>
                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
            </div>
        </form>    
        </div>
    </div>
</div>
<!-- fin du modal-->
</div>
<!-- modal des taches -->
<div class="modal fade" id="modaltache" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content mr-2" style="width: 800px;" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
             <div id="donnee"></div>
          <div class="modal-footer">
          <button type="button" data-dismiss="modal" aria-label="close" class="btn btn-primary">fermer</button>
        </div>                   
        </div>

    </div>
</div>  
<!-- ./wrapper -->

<!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="js/bootstrap.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="js/dataTables.buttons.min.js"></script>
  <script src="js/jszip.min.js"></script>
  <script src="js/buttons.html5.min.js"></script>
  <script src="js/buttons.print.min.js"></script>
  <script src="js/activite.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<script>
  $(document).ready(function($) {
    var html='<div clas="row"><div class="col-lg-6"><div class="form-group"><label for="" class="col-form-label">nom:</label><input type="text" class="form-control" name="tache[]"></div></div><div class="col-lg-6"><div class="form-group"><label for="" class="col-form-label">date début:</label><input type="date" class="form-control" name="date_debut[]"></div></div></div><div class="row"> <div class="col-lg-6"><div class="form-group"><label for="" class="col-form-label">durée de traitement:</label><input type="number" class="form-control" name="echeance[]"></div></div> <div class="col-lg-6"><div class="form-group"><label for=""class="col-form-label">responsable:</label><input type="text" class="form-control" name="responsable[]"></div></div></div><div class="row"><div class="col-sm-12"><div class="form-group"><a class="remove btn btn-sm btn-danger">supprimer</a></div></div></div><hr/> '
var x=1;
var max=10;
$("#add").click(function() {
  $("#contenu").append(html);
});
$("#contenu").on("click","#remove",function() {
  $(this).remove();
});
  });
  </script>
</body>
</html>
