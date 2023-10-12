<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
if (isset($_GET['id']) AND $_GET['id'] > 0) 
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT nom,prenom,DATE_FORMAT(dateNaissance, '%d/%m/%Y') AS dateNaissance,nationalite,cin,adresse,telephone,mail,niveau,parcours,mention,DATE_FORMAT(date, '%d/%m/%Y') AS date,photo,versement,montant,DATE_FORMAT(dateVersement, '%d/%m/%Y') AS dateVersement FROM `ecolage` inner JOIN etudiant ON ecolage.idEtudiant = etudiant.id WHERE ecolage.idEcolage = ?");
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
?>

<!DOCTYPE html>
<html>
<head>
	<title>TUTO PHP</title>
	<meta charset="utf-8">
	  <link href="assets/img/favicon.png" rel="icon">
	  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="imprimer.css" media="print">
</head>
<body id="b3">
	<div class="block">
		<div class="container">
		<form method="POST" action="">
		    <fieldset>
		    	<legend class="text-danger">Information concernant l'étudiant</legend>
			    Nom :  <?php echo $userinfo ['nom']; ?>
			    <br>
			    Prénom :  <?php echo $userinfo ['prenom']; ?>
			    <br>
			    Niveau : <?php echo $userinfo ['niveau']; ?>
			    <br>
			    Mention : <?php echo $userinfo ['mention']; ?>
			    <br>
			    Parcours : <?php echo $userinfo ['parcours']; ?>
			    <br>
			    Adrèsse : <?php echo $userinfo ['adresse']; ?>
			    </fieldset>
			    <br>
			    <fieldset>
			    <legend class="text-danger">À propos du versement</legend>
			    Détail : <?php echo $userinfo ['versement']; ?> 
			    <br>
			    Montant : <?php echo $userinfo ['montant']; ?> Ar
			    <br>
			    Date du vèrsement : <?php echo $userinfo ['dateVersement']; ?>
			</fieldset>
			<br>
			
			<button onclick="window.print();" class="btn btn-info" id="print">Imprimer</button>
		</form>
		<br>
			<a href="profil.php" id="print">Revenir en arrière</a>
		</div>

	</div>
</body>
</html>
<?php
}
?>
