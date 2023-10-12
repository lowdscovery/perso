<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');

if (isset($_GET['id']) AND $_GET['id'] > 0) 
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT * FROM `personnel` inner JOIN categorie ON personnel.id_categorie = categorie.id_categorie WHERE id = ?");
	$requser->execute(array($getid));
	$row = $requser->fetch();
	$categorie = $_POST['categorie'];

		if ($row ['grille'] =='agricole' AND $row ['profil'] =='embauche') {
			$req = $bdd->prepare("SELECT * FROM `categorie` inner JOIN agri_embauche ON categorie.id_categorie = agri_embauche.id_categorie WHERE nom_categorie ='$categorie'");
			$req->execute(array());
			$row1 = $req->fetch();
			$oo = $row1 ['salaire_mensuel'];
			$calcul = number_format($oo, 0, '.',' ');
			echo $calcul;
		}
		else if ($row ['grille'] =='agricole' AND $row ['profil'] =='anciennete') {
			$req = $bdd->prepare("SELECT * FROM `categorie` inner JOIN agri_anciennete ON categorie.id_categorie = agri_anciennete.id_categorie WHERE nom_categorie ='$categorie'");
			$req->execute(array());
			$row1 = $req->fetch();
			$oo = $row1 ['salaire_mensuel'];
			$calcul = number_format($oo, 0, '.',' ');
			echo $calcul;
		}
		else if ($row ['grille'] =='non_agricole' AND $row ['profil'] =='embauche') {
			$req = $bdd->prepare("SELECT * FROM `categorie` inner JOIN non_agri_embauche ON categorie.id_categorie = non_agri_embauche.id_categorie WHERE nom_categorie ='$categorie'");
			$req->execute(array());
			$row1 = $req->fetch();
			$oo = $row1 ['salaire_mensuel'];
			$calcul = number_format($oo, 0, '.',' ');
			echo $calcul; 
		}
		else if ($row ['grille'] =='non_agricole' AND $row ['profil'] =='anciennete') {
			$req = $bdd->prepare("SELECT * FROM `categorie` inner JOIN non_agri_anciennete ON categorie.id_categorie = non_agri_anciennete.id_categorie WHERE nom_categorie ='$categorie'");
			$req->execute(array());
			$row1 = $req->fetch();
			$oo = $row1 ['salaire_mensuel'];
			$calcul = number_format($oo, 0, '.',' ');
			echo $calcul;
		}
		if (isset($_POST['save'])) {
			$sql2 = $bdd->prepare("SELECT * FROM personnel WHERE id = ?");
			$sql2->execute(array($getid));
			$row1 = $sql2->fetch();
			if ($row1['hors_service'] == '0') 
			{
				echo '<script type="text/javascript"> alert("Ce personnel est hors service") </script>';
			}
			elseif ($row1['pay'] == '0') 
			{
				echo '<script type="text/javascript"> alert("Salaire déja payer") </script>';
			}
			else
			{
				$sql1 = $bdd->prepare("UPDATE personnel SET pay='0' WHERE id = ?");
				$sql1->execute(array($getid));
				$exe = $bdd->prepare("INSERT INTO salaire(id_personnel,montant) VALUES('$getid','$calcul')");
				$exe->execute(array());
				header("Location: recu.php?id=".$row ['id']);
			}
			
		}
}
?>