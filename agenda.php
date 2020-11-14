<?php 
session_start();
if (empty($_SESSION['service']) ){
  header('location:index.php');
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
    <?php 
     include('connexion.php');
     $req=$bdd->query('select * from agenda where etat="prevu"');
     $n=0;
      while ($reponse=$req->fetch()) {
      $date_fin=strtotime($reponse['dater']);
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
          $req=$bdd->query('select * from agenda where etat="prevu"'); 
           while ($reponse1=$req->fetch()) {
      $date_fin1=strtotime($reponse1['dater']);
      $duree1=abs($date_fin1-time());
      $delai1=date("H",$duree1);
      $delai2=date("i",$duree1);
      if ($duree1<=86400) {
           ?>
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <strong><?php echo $reponse1['nature']." "."id=".$reponse1["id"]; ?></strong>
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Bonjour,vous avez une <?php echo $reponse1['nature']; ?> avec <?php echo $reponse1['identite']; ?> </p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> prévu dans <?php echo $delai1."H-".$delai2."min"; ?></p>
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
      <?php 
include('menu.php');
       ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#dee2e6">
    <?php 
     $req=$bdd->prepare('select * from agenda where YEAR(dater)=? and MONTH(dater)=?');
     $req->execute(array(date("Y"),date("m")));
     $count=$req->rowCount();
     $req1=$bdd->prepare('select * from agenda where etat=? and YEAR(dater)=? and MONTH(dater)=?');
     $req1->execute(array("tenu",date("Y"),date("m")));
     $count1=$req1->rowCount();
     $req2=$bdd->prepare('select * from agenda where etat=? and YEAR(dater)=? and MONTH(dater)=?');
     $req2->execute(array("annule",date("Y"),date("m")));
     $count2=$req2->rowCount();
     $req3=$bdd->prepare('select * from agenda where etat=? and YEAR(dater)=? and MONTH(dater)=?');
     $req3->execute(array("reporte",date("Y"),date("m")));
     $count3=$req3->rowCount();
     ?>
    <h2 class="ml-2">Statistiques du mois </h2>
    <div class="container-fluid mt-3">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-refresh"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Prévu</span>
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
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tenu</span>
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
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-warning"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Annulé</span>
                <span class="info-box-number"><?php echo $count2; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-share"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Reporté</span>
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
        <div class="card m-2 pb-1">
          <div class="card-header">
            <?php if ($_SESSION['service']=="Assistance") {
              echo '<button  class="btn-primary ajoutA"><i class="fa fa-plus"></i> ajouter</button> ';
            } ?>
          </div>
        <div class="card-body">
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="agenda" width="100%" cellspacing="0">
                  <thead style="background-color: #007bff;color:white;">
                    <tr>
                      <th>ID</th>
                      <th>date</th>
                      <th>nature</th>
                      <th>type de contact</th>
                      <th>identité</th>
                      <th>contact</th>
                      <th>etat</th>
                      <th>reçu par</th>
                      <th>commentaire</th>
                      <th>mise à jour</th>
                    </tr>
                   
                  </thead>
                  <tfoot style="background-color: #007bff;color:white;">
                    <tr>
                      <th>ID</th>
                      <th>date</th>
                      <th>nature</th>
                      <th>type de contact</th>
                      <th>identité</th>
                      <th>contact</th>
                      <th>etat</th>
                      <th>reçu par</th>
                      <th>commentaire</th>
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
  <div class="modal fade" id="agendaA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="col-lg-12">
                    <div class="form-group">
                    <label for="" class="col-form-label">date:</label>
                    <input type="datetime-local" class="form-control" id="nom1" required>
                    </div>
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">nature:</label>
                    <select id="nom2" class="form-control">
                      <option value="">choisir</option>
                      <option value="audience">audience</option>
                      <option value="rencontre">rencontre</option>
                    </select>
                    </div>               
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">type de contact:</label>
                        <select id="nom3" class="form-control">
                      <option value="">choisir</option>
                      <option value="personne morale">personne morale</option>
                      <option value="particulier">particuler</option>
                    </select>
                        </div>
                    </div> 
                  </div>
                    <div class="row">   
                    <div class="col-lg-12">    
                        <div class="form-group">
                        <label for="" class="col-form-label">identité:</label>
                        <input type="text" class="form-control" id="nom4" required>
                        </div>            
                    </div>      
                </div>
                <div class="row">      
                    <div class="col-lg-12">
                    <div class="form-group">
                    <label for="" class="col-form-label">contact:</label>
                    <input type="text" class="form-control" id="nom5" required>
                    </div>
                    </div>  
                </div> 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label for="" class="col-form-label">commentaire:</label>
                        <textarea id="nom6" class="form-control">
                          
                        </textarea>
                        </div>
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
<!-- modal pour la modification -->
<div class="modal fade" id="agendaB" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formulaireB">    
            <div class="modal-body">
              <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group">
                    <label for="" class="col-form-label">date:</label>
                    <input type="datetime-local" class="form-control" id="nom11">
                    </div>
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">nature:</label>
                    <select id="nom22" class="form-control">
                      <option value="">choisir</option>
                      <option value="audience">audience</option>
                      <option value="rencontre">rencontre</option>
                    </select>
                    </div>               
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">type de contact:</label>
                        <select id="nom33" class="form-control">
                      <option value="">choisir</option>
                      <option value="personne morale">personne morale</option>
                      <option value="particulier">particuler</option>
                    </select>
                        </div>
                    </div> 
                  </div>
                    <div class="row">   
                    <div class="col-lg-12">    
                        <div class="form-group">
                        <label for="" class="col-form-label">identité:</label>
                        <input type="text" class="form-control" id="nom44" required>
                        </div>            
                    </div>      
                </div>
                <div class="row">      
                    <div class="col-lg-12">
                    <div class="form-group">
                    <label for="" class="col-form-label">contact:</label>
                    <input type="text" class="form-control" id="nom55" required>
                    </div>
                    </div>  
                </div> 
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">etat:</label>
                        <select id="nom66" class="form-control">
                      <option value="">choisir</option>
                      <option value="annule">annulé</option>
                      <option value="reporte">reporté</option>
                    </select>
                        </div>
                    </div>    
                    <div class="col-lg-6">    
                        <div class="form-group">
                        <label for="" class="col-form-label">reçu par:</label>
                        <input type="text" class="form-control" id="nom77">
                        </div>            
                    </div>    
                </div> 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label for="" class="col-form-label">commentaire:</label>
                        <textarea id="nom88" class="form-control">
                          
                        </textarea>
                        </div>
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
<!-- fin du modal -->
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
  <script src="js/file.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>
