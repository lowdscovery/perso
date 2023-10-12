<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
if (isset($_GET['id']) AND $_GET['id'] > 0) 
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT *,DATE_FORMAT(dateNaissance, '%d-%m-%Y') AS dateNaissance,DATE_FORMAT(date, '%d-%m-%Y') AS date,DATE_FORMAT(date_poste, '%d-%m-%Y') AS date_poste,DATE_FORMAT(date_service, '%d-%m-%Y') AS date_service FROM `personnel` inner JOIN categorie inner JOIN poste_insertion ON personnel.id_categorie = categorie.id_categorie AND categorie.id_categorie = poste_insertion.id_categorie WHERE personnel.id = ? ORDER BY personnel.id DESC");
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
	$date = date("Y-m-d");
	if (isset($_POST['horservise'])) {
		$sql = $bdd->query("UPDATE personnel SET pay='0',jours_conge='0',hors_service='0' WHERE id =".$getid);
		
	}
	$date_reference = $userinfo['date_retrait'];
  	$date_pc = date("Y-m-d");
 	$ro = strtotime($date_reference);
  	$ra = strtotime($date_pc);
  	$diff = $ra - $ro;
  	$jour = floor($diff/(60*60*24));
  	if ($jour == 30) {
    	$sql = $bdd->prepare("UPDATE personnel SET pay='1',date_retrait='$date_pc' WHERE id =".$getid);
    	$sql->execute(array());
	}
	elseif ($userinfo ['date_fin'] == $date) {
		$mlm = $bdd->prepare("UPDATE personnel SET hors_service='0' WHERE id =".$getid);
    	$mlm->execute(array());
	}
	if ($userinfo ['hors_service'] == 0) {
		$uv = "Ce personnel est Hors Service";
	}
	elseif ($userinfo ['pay'] == 0) {
	$us = "La salaire de ce mois ci est déja payée";
	}
	if (isset($_POST['historique'])) {
		header("Location: historique_service.php?id=".$userinfo ['id']);
	}
	if (isset($_POST['salaire'])) {
		header("Location: historique_salaire.php?id=".$userinfo ['id']);
	}
	if (isset($_POST['contrat'])) {
		header("Location: affiche_contrat.php?id=".$userinfo ['id']);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Information</title>
	<meta charset="utf-8">

  	<link rel="stylesheet" type="text/css" href="Inforamtion.css">
	<link rel="stylesheet" type="text/css" href="imprimer.css" media="print">
	<script>
		function checker() {
			var result = confirm('êtes-vous sûre de mettre ce personnel hors service ?');
			if (result == false) {
				event.preventDefault();
			}
		}
	</script>
</head>
<body id="b3">
<?php if($requser->rowCount() > 0) { ?>
	<div class="container">
		<div class="header">
		<div class="img-area">
		<?php echo '<img class="img-fluid img-thumbnail" src="img/'.$userinfo ["photo"].'"/>'; ?>
		</div>
		<h1><?php echo $userinfo ['prenom']; ?></h1>
		<h3><?php echo $userinfo ['nom_poste']; ?></h3>
		</div>
		<div class="main">
		<div class="left">
        <h2>Information Personnel</h2>
    <form method="POST" action="">
        <p><strong>Nom :</strong> <?php echo $userinfo ['nom']; ?></p>
        <p><strong>Prénom :</strong> <?php echo $userinfo ['prenom']; ?></p>
        <p><strong>Date de naissance :</strong> <?php echo $userinfo ['dateNaissance']; ?></p>
        <p><strong>Sexe :</strong> <?php echo $userinfo ['sexe']; ?></p>
        <p><strong>Nationalité :</strong><?php echo $userinfo ['nationalite']; ?></p>
        <p><strong>CIN ou passeport :</strong><?php echo $userinfo ['cin']; ?></p>
        <p><strong>Adresse :</strong> <?php echo $userinfo ['adresse']; ?></p>
        <p><strong>Telephone :</strong>   <?php echo $userinfo ['telephone']; ?></p>
        <p><strong>Mail :</strong>  <?php echo $userinfo ['mail']; ?></p>
        <p><strong>Situation familiale :</strong> <?php echo $userinfo ['situation']; ?></p>
        <p><strong>Nombre d'enfant:</strong><?php echo $userinfo ['nombre']; ?></p>
       
        
		</div>
		<div class="right">
			<h2>Information Proféssionnel</h2>
        
        <ul>
        	<li><strong>Diplôme :</strong> <?php echo $userinfo ['diplome']; ?></li>
        	<li><strong>Catégorie :</strong>  <?php echo $userinfo ['nom_categorie']; ?></li>
        	<li><strong>Profil :</strong>  <?php echo $userinfo ['profil']; ?></li>
        	<li><strong>Grille :</strong>  <?php echo $userinfo ['grille']; ?></li>
        	<li><strong>Poste :</strong>  <?php echo $userinfo ['nom_poste']; ?></li>
        	<li><strong>Service :</strong>  <?php echo $userinfo ['nom_service']; ?></li>
        	<li><strong>Date debut du poste :</strong>   <?php echo $userinfo ['date_poste']; ?></li>
        	<li><strong>Date debut de service :</strong>   <?php echo $userinfo ['date_service']; ?></li>
        	<li><strong>Date d'inscription :</strong>   <?php echo $userinfo ['date']; ?></li>
        	<li><strong>Type du contrat :</strong>   <?php echo $userinfo ['type_contrat']; ?></li>
        </ul> 
		</div>
		</div>
		<button onclick="window.print();" class="enregistrer" id="print">Imprimer</button>
		<button name="historique" class="historique" id="print">Historique</button>
		<button name="salaire" class="salaire" id="print">Salaire</button>
		<button name="contrat" class="contrat" id="print">Contrat</button>
		<button name="horservise" onclick="checker()" class="hors" id="print">HS</button>
		</form>
		<center id="print">
		<?php
	    if(isset($uv))
	    {
            echo '<font color="red">'.$uv."</font>";
	    }
	    elseif (isset($us)) {
	    	echo '<font color="red">'.$us."</font>";
	    }
	    ?>
		</center>
		<br>
			<a href="profil.php" id="print">Revenir en arrière</a>
	</div>
		
</body>
</html>
<?php
}
?>
