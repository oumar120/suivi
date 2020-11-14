<?php 
session_start();
if (empty($_SESSION['service']) ){
  header('location:../index.php');
  exit();
}
 ?>
<!DOCTYPE html>
<html lang="en">
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
      <?php 
         include('menu.php');
       ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#dee2e6">
      <div class="col-lg-12">
        <div class="card m-4 pb-1">
          <div class="card-header">
            <button  class="ajout btn-success"><i class="fa fa-plus"></i> ajouter</button> 
          </div>
        <div class="card-body">
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="tresorerie" width="100%" cellspacing="0">
                  <thead style="background-color: #28A745;color:white;">
                    <tr>
                      <th>ID</th>
                      <th>compte</th>
                      <th>solde</th>
                      <th>date</th>
                      <th>mise à jour</th>
                    </tr>
                   
                  </thead>
                  <tfoot style="background-color: #28A745;color:white;">
                    <tr>
                      <th>ID</th>
                      <th>compte</th>
                      <th>solde</th>
                      <th>date</th>
                      <th>mise à jour</th>
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
        <form id="formulaireA">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">compte:</label>
                    <select id="nom1" class="form-control" required>
                      <option value="">choisir</option>
                      <option value="Tresor">Tresor</option>
                      <option value="Bnde">Bnde</option>
                      <option value="Caisse">Caisse</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">solde:</label>
                    <input type="number" class="form-control" id="nom2">
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-12">
                    <div class="form-group">
                    <label for="" class="col-form-label">date:</label>
                    <input type="date" class="form-control" id="nom3">
                    </div>               
                    </div>
                  </div>
                                  
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-dark">Sauvegarder</button>
            </div>
        </form>    
        </div>
    </div>
</div>
<!-- fin du modal-->
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
  <script src="js/comptable.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>
