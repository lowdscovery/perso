<?php 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
$sql2 = $bdd->query("SELECT * FROM non_agri_embauche");
while ($row2 = $sql2->fetch()) 
{
	echo $row2['id'];
}
 ?>