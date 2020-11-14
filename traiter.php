<?php 
// Pour se connecter a la base de donnee db_school, on appelle le fichier de connexion
  include("connexion.php");

if(isset($_POST['envoyer'])){
	//On utilse la fonction trim() qui enléve les espace de debut et de fin de chaine
	$nom1=$_POST['nom1'];
	$nom2=$_POST['nom2'];
    $nom3=$_POST['nom3'];
	$nom4=$_POST['nom4'];
	$nom5=$_POST['nom5'];
	$nom6=$_POST['nom6'];
	$nom7=$_POST['nom7'];
	$nom8=$_POST['nom8'];
	$nom9=$_POST['nom9'];
	$nom10=$_POST['nom10'];
	// chargement du fichier cv dans repertoire CV
       $result=$bdd->prepare('insert into donnee(numero,nom_develope,sigle,tel,gerant,tel_pca,region,departement,type,situation) value(?,?,?,?,?,?,?,?,?,?)');
       $req=$result->execute(array($nom1,$nom2,$nom3,$nom4,$nom5,$nom6,$nom7,$nom8,$nom9,$nom10));
       if($req){ 
		  header("location:formulaire.php?m=1");exit;
	  }else{
		  header("location:formulaire.php?m=0");exit;
	}
 
}

if(isset($_POST['send'])){
	//On utilse la fonction trim() qui enléve les espace de debut et de fin de chaine
	$id_donnee=$_POST['nom1'];
	$intitule=$_POST['nom2'];
    $source=$_POST['nom3'];
	$dater=$_POST['nom4'];
	$ext=pathinfo($_FILES['nom5']['name']['extension']);
	$fichier=hash(sha1, session_id().microtime().$ext);
	// chargement du fichier cv dans repertoire CV
	if (isset($_FILES['nom5']) and $_FILES['nom5']['error']==0) {
             move_uploaded_file($_FILES['nom5']['tmp_name'],'fichier/'.basename($fichier));
       $result=$bdd->prepare('insert into infos(intitule,source,dater,fichier,id_donnee) value(?,?,?,?,?)');
       $req=$result->execute(array($intitule,$source,$dater,$fichier,$id_donnee));
   }
       if($req){ 
		  header("location:form.php?m=1");exit;
	  }else{
		  header("location:form.php?m=0");exit;
	}
 
}
?>





