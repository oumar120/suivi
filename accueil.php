<?php 
session_start();
if (empty($_SESSION['service']) ){
  header('location:../index.php');
  exit();
}
var_dump($_SESSION['service']);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edmin</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href="css/font-awesome.min.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <?php
        include('profil.html');
        ?>
        <!-- /navbar -->
        <div class="wrapper " style="padding-top:70px;padding-bottom: 50px; background-color: #BBDEFB">
            <div class="container">
                <div class="row">
                    <!--/.span3-->
                <?php  if ($_SESSION['service']=="DG") { ?>
                    <div class="span10">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="agenda.php" class="btn-box big span4"><i class="fa fa-calendar"></i>
                                        <b>Agenda du DG</b>
            
                                    </a><a href="activite.php" class="btn-box big span4"><i class="fa fa-tasks"></i>
                                        <b>Suivi des activités</b>
                                        
                                    </a><a href="comptable.php" class="btn-box big span4"><i class="fa fa-money"></i>
                                        <b>Suivi comptable</b>
                                       
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <a href="recommandation.php" class="btn-box big span4"><i class="fa fa-users"></i>
                                        <b>Suivi recommandation</b>
                                       
                                    </a><a href="diagramme.php" class="btn-box big span4"><i class="fa fa-bar-chart"></i>
                                        <b>Diagrammes</b>
                                    </a><a class="btn-box big span4"><i class="fa fa-users"></i>
                                        <b>Comptes</b>
                                    </a>
                                </div>
                            </div>
                            <!--/#btn-controls-->
                           
                            <!--/.module-->
                            
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
            <?php } if($_SESSION['service']=="DPPP") { ?>
                    <div class="span10">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a class="btn-box big span4" title="espace réservé au DG et son assistante"><i class="fa fa-calendar"></i>
                                        <b>Agenda du DG</b>
            
                                    </a><a href="activite.php" class="btn-box big span4"><i class="fa fa-tasks"></i>
                                        <b>Suivi des activités</b>
                                        
                                    </a><a class="btn-box big span4"><i class="fa fa-money"></i>
                                        <b>Suivi comptable</b>
                                       
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <a class="btn-box big span4"><i class="fa fa-users"></i>
                                        <b>Suivi recommandation</b>
                                       
                                    </a><a class="btn-box big span4"><i class="fa fa-bar-chart"></i>
                                        <b>Diagrammes</b>
                                    </a><a class="btn-box big span4"><i class="fa fa-users"></i>
                                        <b>Comptes</b>
                                    </a>
                                </div>
                            </div>
                            <!--/#btn-controls-->
                           
                            <!--/.module-->
                            
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <?php } if ($_SESSION['service']=="DPS") { ?>
                    <div class="span10">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a  class="btn-box big span4"><i class="fa fa-calendar"></i>
                                        <b>Agenda du DG</b>
            
                                    </a><a href="activite.php" class="btn-box big span4"><i class="fa fa-tasks"></i>
                                        <b>Suivi des activités</b>
                                        
                                    </a><a class="btn-box big span4"><i class="fa fa-money"></i>
                                        <b>Suivi comptable</b>
                                       
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <a class="btn-box big span4"><i class="fa fa-users"></i>
                                        <b>Suivi recommandation</b>
                                       
                                    </a><a class="btn-box big span4"><i class="fa fa-bar-chart"></i>
                                        <b>Diagrammes</b>
                                    </a><a class="btn-box big span4"><i class="fa fa-bar-chart"></i>
                                        <b>Comptes</b>
                                    </a>
                                </div>
                            </div>
                            <!--/#btn-controls-->
                           
                            <!--/.module-->
                            
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <?php } if ($_SESSION['service']=="BAF") { ?>
                    <div class="span10">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a class="btn-box big span4"><i class="fa fa-calendar"></i>
                                        <b>Agenda du DG</b>
            
                                    </a><a href="activite.php" class="btn-box big span4"><i class="fa fa-tasks"></i>
                                        <b>Suivi des activités</b>
                                        
                                    </a><a href="comptable.php" class="btn-box big span4"><i class="fa fa-money"></i>
                                        <b>Suivi comptable</b>
                                       
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <a class="btn-box big span4"><i class="fa fa-users"></i>
                                        <b>Suivi recommandation</b>
                                       
                                    </a><a href="diagramme.php" class="btn-box big span4"><i class="fa fa-bar-chart"></i>
                                        <b>Diagrammes</b>
                                    </a><a class="btn-box big span4"><i class="fa fa-users"></i>
                                        <b>Comptes</b>
                                    </a>
                                </div>
                            </div>
                            <!--/#btn-controls-->
                           
                            <!--/.module-->
                            
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <?php } if ($_SESSION['service']=="Informatique") { ?>
                    <div class="span10">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a class="btn-box big span4"><i class="fa fa-calendar"></i>
                                        <b>Agenda du DG</b>
            
                                    </a><a href="activite.php" class="btn-box big span4"><i class="fa fa-tasks"></i>
                                        <b>Suivi des activités</b>
                                        
                                    </a><a class="btn-box big span4"><i class="fa fa-money"></i>
                                        <b>Suivi comptable</b>
                                       
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <a class="btn-box big span4"><i class="fa fa-users"></i>
                                        <b>Suivi recommandation</b>
                                       
                                    </a><a class="btn-box big span4"><i class="fa fa-bar-chart"></i>
                                        <b>Diagrammes</b>
                                    </a><a class="btn-box big span4"><i class="fa fa-users"></i>
                                        <b>Comptes</b>
                                    </a>
                                </div>
                            </div>
                            <!--/#btn-controls-->
                           
                            <!--/.module-->
                            
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                <?php } if ($_SESSION['service']=="Assistante") { ?>
                    <div class="span10">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="agenda.php" class="btn-box big span4"><i class="fa fa-calendar"></i>
                                        <b>Agenda du DG</b>
            
                                    </a><a class="btn-box big span4"><i class="fa fa-tasks"></i>
                                        <b>Suivi des activités</b>
                                        
                                    </a><a class="btn-box big span4"><i class="fa fa-money"></i>
                                        <b>Suivi comptable</b>
                                       
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <a href="recommandation.php" class="btn-box big span4"><i class="fa fa-users"></i>
                                        <b>Suivi recommandation</b>
                                       
                                    </a><a class="btn-box big span4"><i class="fa fa-bar-chart"></i>
                                        <b>Diagrammes</b>
                                    </a><a class="btn-box big span4"><i class="fa fa-users"></i>
                                        <b>Comptes</b>
                                    </a>
                                </div>
                            </div>
                            <!--/#btn-controls-->
                           
                            <!--/.module-->
                            
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                <?php } ?>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <?php
         include('footer.html');
        ?>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
    </body>
