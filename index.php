<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
if (isset($_POST['formconnexion'])) 
{
	$mailconnect = htmlspecialchars($_POST['mailconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);
	if(!empty($mailconnect) AND !empty($mdpconnect))
	{
		$requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
		$requser->execute(array($mailconnect, $mdpconnect));
		$userexist = $requser->rowCount();
		if ($userexist == 1) 
		{
			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['mail'] = $userinfo['mail'];
			header("Location: accueil.php?id=".$_SESSION['id']);
		}
		else
		{
			$erreur = "Mauvais mail ou mot de passe !";
		}
	}
	else
	{
		$erreur = "Toutes les champs doivent être complétés !";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body id="b1">
	<div class="loginbox">
		<img src="style/avatar.png" class="avatar">
		<h1>Connexion</h1>
	    <form method="POST" action="">
	    	<p>Email</p>
		    	<input type="email" class="input" name="mailconnect" placeholder="Entré votre adresse email" />
		    <p>Mot de passe</p>	
		    	<input type="password" class="input" name="mdpconnect" placeholder="Entré votre mot de passe" />
		    	<input type="submit" name="formconnexion" value="Se connecter" />	
	    </form>
	    
	    <a href="inscriptio.php">Créer un nouveau utilisteur?</a>
	    
	    <br>
	    <?php
	    if(isset($erreur))
	    {
            echo '<font color="red">'.$erreur."</font>";
	    }
	    ?>
    </div>
</body>
</html> 