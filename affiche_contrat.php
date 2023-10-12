<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
if (isset($_GET['id']) AND $_GET['id'] > 0) 
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM personnel  WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>TUTO PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="imprimer.css" media="print">
</head>
<body id="b3">
		<form method="POST" action="">
		    <?php echo '<img class="img-fluid img-thumbnail" src="fichier/'.$userinfo ["fichier_contrat"].'"/>'; ?>
			<br><br>
			<button onclick="window.print();" class="btn btn-info" id="print">Imprimer</button>
		</form>
		<br>
			<a href="detail.php?id=<?= $userinfo['id'] ?>" id="print">Revenir en arrière</a>
</body>
</html>
<?php
}
?>