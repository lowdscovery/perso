<?php
	$conn = mysqli_connect("localhost","root","","miniprojet");

	if ($conn===false) 
	{
		die("Erreur: Non connecté au serveur.".mysqli_connect_error());
	}
?>