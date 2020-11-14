<?php
session_start();
include_once '../connexion.php';
$service=$_SESSION['service'];
$nom1 = (isset($_POST['nom1'])) ? $_POST['nom1'] : '';
$nom2 = (isset($_POST['nom2'])) ? $_POST['nom2'] : '';
$nom3 = (isset($_POST['nom3'])) ? $_POST['nom3'] : '';
$nom4 = (isset($_POST['nom4'])) ? $_POST['nom4'] : '';
$nom5 = (isset($_POST['nom5'])) ? $_POST['nom5'] : '';
$nom6 = (isset($_POST['nom6'])) ? $_POST['nom6'] : '';
$nom7 = (isset($_POST['nom7'])) ? $_POST['nom7'] : '';
$nom8 = (isset($_POST['nom8'])) ? $_POST['nom8'] : '';
$nom9 = (isset($_POST['nom9'])) ? $_POST['nom9'] : '';
$nom10 = (isset($_POST['nom10'])) ? $_POST['nom10'] : '';
$nom11 = (isset($_POST['nom11'])) ? $_POST['nom11'] : '';
$nom12 = (isset($_POST['nom12'])) ? $_POST['nom12'] : '';

$option = (isset($_POST['option'])) ? $_POST['option'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$option1 = (isset($_POST['option1'])) ? $_POST['option1'] : '';
$id1 = (isset($_POST['id1'])) ? $_POST['id1'] : '';
$option2 = (isset($_POST['option2'])) ? $_POST['option2'] : '';
$id2 = (isset($_POST['id2'])) ? $_POST['id2'] : '';
$option3 = (isset($_POST['option3'])) ? $_POST['option3'] : '';
$id3 = (isset($_POST['id3'])) ? $_POST['id3'] : '';
// agenda du directeur
switch($option){ 
    case 1:  
    $consulter = "INSERT INTO agenda (dater,nature,type_contact,identite,contact,commentaire) VALUES
     ('$nom1','$nom2','$nom3','$nom4','$nom5','$nom6')";
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();
                break;
    
    case 2: 
      $req=$bdd->query('select * from agenda where id='.$id);
      $req1=$req->fetch();
      if ($nom1=="") {
                $nom1=$req1['dater'];
             } 
      if ($nom2=="") {
                $nom2=$req1['nature'];
             } 
      if ($nom3=="") {
                $nom3=$req1['type_contact'];
             }  
    if ($nom6=="") {
        switch ($req1['etat']) {
            case 'tenu':
                $nom6="tenu";
                break;
            case 'prevu':
                $nom6="prevu";
                break;
            case 'annule':
                $nom6="annule";
                break;
            default:
                $nom6="reporte";
                break;
        }
         }  
        $consulter = "UPDATE agenda SET dater='$nom1',nature='$nom2',type_contact='$nom3',identite='$nom4',contact='$nom5',etat='$nom6',recu='$nom7',commentaire='$nom8' WHERE id='$id'";		
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();   

        $consulter = "SELECT * FROM agenda WHERE id='$id'";       
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();
        $data=$resultat->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $bdd=null;
        break;
    case 3:        
        $consulter = "DELETE FROM donnee WHERE sigle='$id'";		
        $resultat = $bdd->prepare($consulter);
        $resultat->execute(); 
                        $req=$bdd->query('select fichier from infos where id_donnee="$id"');
                        while ($donnee=$req->fetch()) {
                            $chemin='../fichier/<?php echo $donnee["fichier"]?>';
                          if (file_exists($chemin))
                              unlink($chemin);
                        }
                        $consult = "DELETE FROM infos WHERE id_donnee='$id'";        
                        $result = $bdd->prepare($consult);
                        $result->execute(); 

                                        
        break;
   case 4:    
        $req=$bdd->prepare("select id,dater from agenda where etat='prevu'");
        $req->execute();
    while($reponse=$req->fetch()) {
            $dater=$reponse['dater'];
            $id=$reponse['id'];
            if (date("Y-m-d H:i:s")>=$dater) {
            $bdd->query("update agenda set etat='tenu' where id=".$id);
            }
            }
        $consulter = "SELECT * FROM agenda";
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();        
        $data=$resultat->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $bdd=null;
        break;
}

// suivi des activités
if (isset($_POST['send'])) {
    $activite=$_POST['activite'];
    $date_activite=$_POST['date_activite'];
    $service=$_POST['service'];
    $date_debut=$_POST['date_debut'];
    $nom=$_POST['tache'];
    $echeance=$_POST['echeance'];
    $responsable=$_POST['responsable'];
    $id_activite=hash(sha1, session_id().microtime());
    $n=0;
    $percent=0;
foreach ($date_debut as $key => $value) {
 $duree+=$echeance[$key];
 $n++;
}
foreach ($date_debut as $key => $value) {
    $date = date_create("$date_debut[$key]"); 
date_add($date,date_interval_create_from_date_string("$echeance[$key] day"));
    $date=date_format($date,"Y-m-d");
    $pourcent=($echeance[$key]*100)/$duree;
    $pourcent=round($pourcent);
 $consulter = "INSERT INTO tache (date_debut,nom,date_fin,echeance,responsable,commentaire,percent,id_activite,service) VALUES
     ('$value','$nom[$key]','$date','$echeance[$key]','$responsable[$key]',' ','$pourcent','$id_activite','$service')";
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();
}
$consulter = "INSERT INTO activite (nom,date_debut,duree,service,percent,nombre_tache,id_activite) VALUES
     ('$activite','$date_activite','$duree','$service','$percent','$n','$id_activite')";
$req=$bdd->query($consulter);
if ($req) {
    header('location:../activite.php?m=1');
}else
header('location:../activite.php?m=0');
}
if (isset($_POST['save'])) {
    $id=$_POST['id'];
    $percent=$_POST['pourcent'];
    $etat=$_POST['etat'];
    $commentaire=$_POST['commentaire'];
$id_activite=$bdd->query('select * from tache where id='.$id);
$reponse=$id_activite->fetch();
$id_activite=$reponse['id_activite'];
$etat1=$reponse['etat'];
$pourcent=$bdd->prepare('select * from activite where id_activite=?');
$pourcent->execute(array($id_activite));
$pourcent=$pourcent->fetch();
$pourcent=$pourcent['percent']+$percent;
if ($etat1=="en cours") {
 $req=$bdd->prepare('UPDATE activite set percent=? where id_activite=?');
 $req->execute(array($pourcent,$id_activite));   
}
$requete=$bdd->prepare('UPDATE tache set etat=?,commentaire=? where id=?');
$requete->execute(array($etat,$commentaire,$id));
if ($requete) {
    header('location:../activite.php?m=1');
}else
   header('location:../activite.php?m=0');
}
switch($option1){
    case 5:
     ?>    
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-condensed" width="100%">
            <thead>
                <tr>
                <th>taches</th>
                <th>date début</th>
                <th>durée</th>
                <th>date de fin</th>
                <th>état</th>
                <th>responsable</th>
                <th>commentaire</th>
                <?php if($service!=="DG") echo "<th>mise à jour</th>"; ?>
                </tr>
            </thead>
    <?php 

    $id_act=$bdd->query("select * from activite where id=".$id1);
    $id_act=$id_act->fetch();
    $id_act=$id_act['id_activite'];
    $req=$bdd->prepare("select id,etat,date_fin from tache where id_activite=?");
    $req->execute(array($id_act));
    while($reponse=$req->fetch()) {
            $date_fin=$reponse['date_fin'];
            $id=$reponse['id'];
            $etat=$reponse['etat'];
            if (date("Y-m-d")>=$date_fin and $etat!="termine") {
            $bdd->query("update tache set etat='en retard' where id=".$id);
            }
            }
    $req1=$bdd->prepare("select * from tache where id_activite=?");
    $req1->execute(array($id_act));
    while($donnee=$req1->fetch()) {
             ?>
            <tbody>
                <tr>
            <td> <?php echo $donnee['nom']; ?> </td>
            <td> <?php echo $donnee['date_debut']; ?> </td>
        <td><small class="badge badge-info"><i class="fa fa-history"></i> <?php echo $donnee['echeance']; ?> jours </small></td>
         <td> <?php echo $donnee['date_fin']; ?> </td>
            <?php if ($donnee['etat']=="en cours") {?>
<td> <span class="badge" style="background-color: orange;"><i class="fa fa-refresh"></i> <?php echo $donnee['etat']; ?> </span> </td>
        <?php } if ($donnee['etat']=="termine") {?>
<td> <span class="badge" style="background-color:  #28A745"><i class="fa fa-check"></i> <?php echo $donnee['etat']; ?> </span> </td>
        <?php } if ($donnee['etat']=="en retard") {?>
<td> <span class="badge" style="background-color:#ff3933;"><i class="fa fa-warning"></i> <?php echo $donnee['etat']; ?> </span> </td>
        <?php } ?>
            <td> <?php echo $donnee['responsable']; ?> </td>
            <td class="card"><?php echo $donnee['commentaire']; ?> </td>
            <?php 
           if ($service=="DPPP" or $service=="DPS" or $service=="BAF" or $service=="Informatique") {
            echo '<td> <a href="modifier.php?v='.$donnee["id"].'" type="btn" class="btn btn-primary" target="_blank"> <i class="fa fa-edit"></i></a> </td>';
           }
             ?>
                </tr>
            </tbody>
    <?php } ?>
        </table>
        </div>
<?php  
                break;
    case 2:        
        $consulter = "UPDATE agenda SET dater='$nom1',nature='$nom2',type_contact='$nom3',identite='$nom4',contact='$nom5',etat='$nom6',recu='$nom7',commentaire='$nom8' WHERE id='$id'";       
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();   

        $consulter = "SELECT * FROM agenda WHERE id='$id'";       
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();
        $data=$resultat->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $bdd=null;
        break;
    case 3:        
        $consulter = "DELETE FROM donnee WHERE sigle='$id'";        
        $resultat = $bdd->prepare($consulter);
        $resultat->execute(); 
                        $req=$bdd->query('select fichier from infos where id_donnee="$id"');
                        while ($donnee=$req->fetch()) {
                            $chemin='../fichier/<?php echo $donnee["fichier"]?>';
                          if (file_exists($chemin))
                              unlink($chemin);
                        }
                        $consult = "DELETE FROM infos WHERE id_donnee='$id'";        
                        $result = $bdd->prepare($consult);
                        $result->execute(); 

                                        
        break;
    case 1: 
         $consulter = "SELECT id_activite FROM tache where id='$id1'";
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();

        $consulter = "SELECT * FROM tache where id_activite='$resultat'";
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();        
        $data=$resultat->fetchAll(PDO::FETCH_ASSOC);      
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $bdd=null;
        break;
    case 4:  
    if ($service=="DG") {
        $consulter = "SELECT * FROM activite"; 
     }else{
        $consulter = "SELECT * FROM activite where service=?";
    }
        $resultat = $bdd->prepare($consulter);
        $resultat->execute(array($service));        
        $data=$resultat->fetchAll(PDO::FETCH_ASSOC); 
    print json_encode($data, JSON_UNESCAPED_UNICODE);
        $bdd=null;
        break;
}
// LA TRESORERIE
switch($option2){ 
    case 1:  
    $consulter = "INSERT INTO tresorerie (compte,solde,dater) VALUES
     ('$nom1','$nom2','$nom3')";
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();
                break;
    case 2:        
        $consulter = "UPDATE tresorerie SET compte='$nom1',solde='$nom2',dater='$nom3' WHERE id='$id2'";      
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();   

        $consulter = "SELECT * FROM tresorerie WHERE id='$id2'";       
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();
        $data=$resultat->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $bdd=null;
        break;
    case 3:        
        $consulter = "DELETE FROM donnee WHERE sigle='$id'";        
        $resultat = $bdd->prepare($consulter);
        $resultat->execute(); 
                        $req=$bdd->query('select fichier from infos where id_donnee="$id"');
                        while ($donnee=$req->fetch()) {
                            $chemin='../fichier/<?php echo $donnee["fichier"]?>';
                          if (file_exists($chemin))
                              unlink($chemin);
                        }
                        $consult = "DELETE FROM infos WHERE id_donnee='$id'";        
                        $result = $bdd->prepare($consult);
                        $result->execute(); 

                                        
        break;
   case 4:    
        $consulter = "SELECT * FROM tresorerie";
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();        
        $data=$resultat->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $bdd=null;
        break;
}
// LES FACTURES EN ATTENTE
switch($option3){ 
    case 1:  
    $consulter = "INSERT INTO facture (fournisseur,montant,date_reception,echeance,date_reglement) VALUES
     ('$nom1','$nom2','$nom3','$nom4','non reglée')";
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();
                break;
    case 2:   
    if ($nom3=="") {
        $consulter = "UPDATE facture SET fournisseur='$nom1',montant='$nom2',echeance='$nom4',date_reglement='$nom5' WHERE id='$id3'";     
         }else{
        $consulter = "UPDATE facture SET fournisseur='$nom1',montant='$nom2',date_reception='$nom3',echeance='$nom4',date_reglement='$nom5' WHERE id='$id3'";   
         }        
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();   

        $consulter = "SELECT * FROM facture WHERE id='$id3'";       
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();
        $data=$resultat->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $bdd=null;
        break;
    case 3:        
        $consulter = "DELETE FROM donnee WHERE sigle='$id'";        
        $resultat = $bdd->prepare($consulter);
        $resultat->execute(); 
                        $req=$bdd->query('select fichier from infos where id_donnee="$id"');
                        while ($donnee=$req->fetch()) {
                            $chemin='../fichier/<?php echo $donnee["fichier"]?>';
                          if (file_exists($chemin))
                              unlink($chemin);
                        }
                        $consult = "DELETE FROM infos WHERE id_donnee='$id'";        
                        $result = $bdd->prepare($consult);
                        $result->execute(); 

                                        
        break;
   case 4:    
        $consulter = "SELECT * FROM facture";
        $resultat = $bdd->prepare($consulter);
        $resultat->execute();        
        $data=$resultat->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $bdd=null;
        break;
}
?>



