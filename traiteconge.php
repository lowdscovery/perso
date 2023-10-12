<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
if (isset($_GET['id']) AND $_GET['id'] > 0) 
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT * FROM personnel WHERE id = ?");
	$requser->execute(array($getid));
	$row = $requser->fetch();

	if (isset($_POST['insertion'])) 
	{
		$date_depart = $_POST['date_depart'];
		$date_arrive = $_POST['date_arrive'];
		$date = date("Y-m-d");
		$ro = strtotime($date_depart);
		$ra = strtotime($date_arrive);
		$diff = $ra - $ro;
		$jour = floor($diff/(60*60*24));
		if ($row['hors_service'] == '0') 
			{
				echo '<script type="text/javascript"> alert("Ce personnel est hors service") </script>';
			}
		else if ($row['jours_conge'] == '0') 
		{
			echo '<script type="text/javascript"> alert("Cette personne ne peut pas demander un congé") </script>';
		}
		elseif ($date_depart < $date OR $date_arrive <= $date OR $date_arrive <= $date_depart OR $row['jours_conge'] < $jour) 
		{
			echo '<script type="text/javascript"> alert("Erreur de saisie") </script>';
		}
		else
		{
			$res = $bdd->prepare("SELECT jours_conge FROM personnel WHERE id =".$getid);
			$res->execute(array());
			$ro = $res->fetch();
			$joursconge = $ro['jours_conge'];
			$calculejour = $joursconge - $jour;
			$sql = $bdd->prepare("INSERT INTO conge(id_personnel,date_depart,date_arriver) VALUES ('$getid','$date_depart','$date_arrive')");
			$sq = $sql->execute(array());
			$sql1 = $bdd->prepare("UPDATE personnel SET jours_conge='$calculejour' WHERE id =".$getid);
			if($sql1->execute(array()))
			{
				echo '<script type="text/javascript"> alert("Demande reussi") </script>';
			}
			else
			{
				echo '<script type="text/javascript"> alert("Erreur d`inscription") </script>';
			}
		}
		
	}
	$requete = $bdd->query("SELECT DATE_FORMAT(date_depart, '%d-%m-%Y') AS date_depart,DATE_FORMAT(date_arriver, '%d-%m-%Y') AS date_arriver,DATE_FORMAT(date, '%d-%m-%Y') AS date FROM conge WHERE id_personnel =".$getid);
}
?>