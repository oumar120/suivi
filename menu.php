<?php 
if($_SESSION['service']=="DG"){ ?>
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
            <a class="nav-link">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Suivi comptable
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tresorerie.php" class="nav-link active">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Trésorerie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="facture.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Factures en attente</p>
                </a>
              </li>
            </ul>
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
            <a class="nav-link disabled">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Comptes
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin/user.php" class="nav-link active">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Compte utilisateur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="banque.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Compte bancaire</p>
                </a>
              </li>
            </ul>
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
<?php } if($_SESSION['service']=="DPPP"){ ?>
	<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a  class="nav-link" title="espace réservé au DG et son assistante">
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
            <a class="nav-link disabled">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Suivi comptable
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tresorerie.php" class="nav-link active">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Trésorerie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="facture.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Factures en attente</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Suivi recommandation
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" >
              <i class="nav-icon fa fa-bar-chart"></i>
              <p>
                Diagrammes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Comptes
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin/user.php" class="nav-link active">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>compte utilisateur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="banque.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>compte bancaire</p>
                </a>
              </li>
            </ul>
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
<?php } if($_SESSION['service']=="DPS"){ ?>
	<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a  class="nav-link">
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
            <a class="nav-link disabled">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Suivi comptable
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tresorerie.php" class="nav-link active">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Trésorerie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="facture.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Factures en attente</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a  class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Suivi recommandation
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fa fa-bar-chart"></i>
              <p>
                Diagrammes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Comptes
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin/user.php" class="nav-link active">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>compte utilisateur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="banque.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>compte bancaire</p>
                </a>
              </li>
            </ul>
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
<?php } if($_SESSION['service']=="BAF"){ ?>
	<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a class="nav-link">
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
            <a class="nav-link">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Suivi comptable
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tresorerie.php" class="nav-link active">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Trésorerie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="facture.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Factures en attente</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link">
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
            <a class="nav-link disabled">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Comptes
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin/user.php" class="nav-link active">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>compte utilisateur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="banque.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>compte bancaire</p>
                </a>
              </li>
            </ul>
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
<?php } if($_SESSION['service']=="Informatique"){ ?>
	<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a class="nav-link">
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
            <a class="nav-link disabled">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Suivi comptable
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tresorerie.php" class="nav-link active">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Trésorerie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="facture.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Factures en attente</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Suivi recommandation
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a  class="nav-link">
              <i class="nav-icon fa fa-bar-chart"></i>
              <p>
                Diagrammes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Comptes
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin/user.php" class="nav-link active">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>compte utilisateur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="banque.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>compte bancaire</p>
                </a>
              </li>
            </ul>
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
      <?php } if($_SESSION['service']=="Assistante"){ ?>
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
            <a class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Suivi des activités
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Suivi comptable
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tresorerie.php" class="nav-link active">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Trésorerie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="facture.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Factures en attente</p>
                </a>
              </li>
            </ul>
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
            <a class="nav-link">
              <i class="nav-icon fa fa-bar-chart"></i>
              <p>
                Diagrammes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Comptes
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin/user.php" class="nav-link active">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Compte utilisateur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="banque.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Compte bancaire</p>
                </a>
              </li>
            </ul>
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
    <?php } ?>
