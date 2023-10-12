<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');

if (isset($_POST['forminscription'])) 
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

     if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))

     {
        
        $pseudolength = strlen($pseudo);
        if($pseudolength <= 255)
        {

        	if($mail == $mail2)
         	{
         		if(filter_var($mail, FILTER_VALIDATE_EMAIL))
         		{
         			$reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
         			$reqmail->execute(array($mail));
         			$mailexist = $reqmail->rowCount();
         				if ($mailexist == 0) 
         				{

         					if($mdp == $mdp2)
			               {
			               		$insertmbr = $bdd->prepare("INSERT INTO membres(pseudo,mail,motdepasse) VALUES(?, ?, ?)");
			               		$insertmbr-> execute(array($pseudo, $mail ,$mdp));
			               		$erreur = "Votre compte a bien été créé !<br/> <a href=\"index.php\">Me connecter</a>";
			               	}

	               		
			               else
			               {
			               	   $erreur = "Vos mot de passes ne correspondent pas !";
			               }
	               		}
	               		else
	               		{
	               			$erreur = "Adresse mail déjà utilisée !";
	               		}
	            }
	            else
	            {
	            	$erreur = "Votre adresse mail n'est pas valide !";
	            }
			        }
			        else
			        {
			        	$erreur = "Votre adresse mail ne correspondent pas !";
			        }
        }
        else
        {
        	$erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
        }
     }
     else
     {
        $erreur = "Tout les champ doivent être complétés !";
     }
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body id="b1">
	<div class="loginbox1">
		<h1>Inscription</h1>
	    <form method="POST" action="">
	    		<input type="text" class="input" class="input" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; }?>" />
	    	
	    	
	    		<input type="email" class="input" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; }?>"/>
	    	
	    	
	    		<input type="email" class="input" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; }?>"mail2/>
	    	
	    	   
	    		 <input type="password" class="input" placeholder="Votre mot de passe" id="mdp" name="mdp"/>
	    	
	    		    
	    		<input type="password" class="input" placeholder="Confirmez votre mot de passe" id="mdp2" name="mdp2"/>
	    	
	    		<input class="btn" type="submit" name="forminscription" value="Je m'inscris"/>
	    			
	    </form>
	    <?php
	    if(isset($erreur))
	    {
            echo '<font color="red">'.$erreur."</font>";
	    }
	    ?>
    </div>
</body>
</html>