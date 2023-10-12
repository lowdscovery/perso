<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
if (isset($_GET['id']) AND $_GET['id'] > 0) 
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT *,DATE_FORMAT(dateNaissance, '%d-%m-%Y') AS dateNaissance,DATE_FORMAT(date, '%d-%m-%Y') AS date FROM personnel_central WHERE id = ?");
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
	if (isset($_POST['horservise'])) {
		$sql = $bdd->query("UPDATE personnel_central SET hors_service='0' WHERE id =".$getid);	
	}
	$sql1 =  $bdd->query("SELECT * FROM personnel_central WHERE id =".$getid);
	$row = $sql1->fetch();
	$hs = $row['hors_service'];
	if ($hs == 0) {
		$uv = "Ce personnel est Hors Service";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Information</title>
	<meta charset="utf-8">

  	<link rel="stylesheet" type="text/css" href="inforamtion_central.css">
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
	<div class="container">
		<div class="header">
		<div class="img-area">
		<?php echo '<img class="img-fluid img-thumbnail" src="img/'.$userinfo ["photo"].'"/>'; ?>
		</div>
		<h1><?php echo $userinfo ['prenom']; ?></h1>
		<h3><?php echo $userinfo ['categorie']; ?></h3>
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
        	<li><strong>Catégorie :</strong>  <?php echo $userinfo ['categorie']; ?></li>
        	<li><strong>Classe :</strong>  <?php echo $userinfo ['classe']; ?></li>
        	<li><strong>Echelon :</strong>  <?php echo $userinfo ['echelon']; ?></li>
        	<li><strong>Date d'inscription :</strong>   <?php echo $userinfo ['date']; ?></li>
        </ul> 
		</div>
		</div>
		<button onclick="window.print();" class="enregistrer" id="print">Imprimer</button>
		<button name="horservise" onclick="checker()" class="hors" id="print">HS</button>
		</form>
		<center id="print">
		<?php
	    if(isset($uv))
	    {
            echo '<font color="red">'.$uv."</font>";
	    }
	    ?>
		</center>
		<br>
			<a href="liste_central.php" id="print">Revenir en arrière</a>
	</div>
		
</body>
</html>

