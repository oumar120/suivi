<?php
/*session_start();
if (empty($_SESSION['id']) ){
  header('location:index.php');
  exit();
}*/
if (isset($_GET['v']) and !empty($_GET['v'])) {
  $v=$_GET['v'];
  include ('connexion.php');
$req=$bdd->query('select percent,etat from tache where id='.$v);
$donnee=$req->fetch();
}
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

    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark elevation-4">
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
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="agenda.php" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Agenda du directeur
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="activite.php" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Suivi des activités
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="comptable.php" class="nav-link">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Suivi comptable
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="recommandation.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Suivi recommandation
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="diagramme.php" class="nav-link">
              <i class="nav-icon fa fa-bar-chart"></i>
              <p>
                Diagrammes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="deconnexion.php" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
                Deconnexion
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#dee2e6">
      <div class="col-lg-10 card m-5">
       <form method="post" action="admin/crud.php">    
              <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $v ;?>" >
                    </div>
                    </div> 
                    <div class="col-lg-6">
                    <div class="form-group">
          <input type="hidden" class="form-control" name="pourcent" value="<?php echo $donnee['percent'] ;?>" >
                    </div>
                    </div>    
                </div>
            <?php   if ($donnee['etat']=="en retard") {?>
                <div class="row"> 
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">état:</label>
                        <input type="text" name="etat" value="<?php echo $donnee['etat'] ;?>" readonly>
                        </div>
                    </div> 
                  </div>
            <?php } ?>
            <?php   if ($donnee['etat']=="en cours") {?>
                <div class="row"> 
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">état:</label>
                        <input type="text" name="etat" value="termine" readonly>
                        </div>
                    </div> 
                  </div>
            <?php } ?>
            <?php   if ($donnee['etat']=="termine") {?>
                <div class="row"> 
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">état:</label>
                        <input type="text" name="etat" value="termine" readonly>
                        </div>
                    </div> 
                  </div>
            <?php } ?>
                <div class="row">   
                    <div class="col-lg-12">    
                        <div class="form-group">
                        <label for="" class="col-form-label">commentaire:</label>
                        <textarea name="commentaire" class="form-control" required></textarea>
                        </div>            
                    </div>    
                </div> 
              <div class="card-body">
                    <div>
                    <input type="submit" class="btn btn-primary btn-sm" value="modifier" name="save" >
                    </div>
                </div>
        </form>      
  </div>
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
   <p style="text-align: center"><strong>&copy; FIMF-2020</strong>
    tout droit reservé
  </p>
  </footer>
</div>
  <!-- le modal pour l'ajout-->

<!-- fin du modal-->
<!-- modal des taches -->
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
</body>
</html>
