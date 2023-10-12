<?php
	require("db.php");
	$fichier = "";
	
	if (isset($_POST['insertion'])) 
	{
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$dateNaissance = $_POST['dateNaissance'];
		$sexe = $_POST['sexe'];
		$nationalite = $_POST['nationalite'];
		$cin = $_POST['cin'];
		$adresse = $_POST['adresse'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$situation = $_POST['situation'];
		$nombre = $_POST['nombre'];
		$diplome = $_POST['diplome'];
		$categorie = $_POST['categorie'];
		$poste = $_POST['poste'];
		$service = $_POST['service'];
		$contrat = $_POST['contrat'];
		$mois = $_POST['mois'];
		$fin = $_POST['fin'];

		$fichier_contrat = $_FILES['fichier_contrat']['name'];
		$photo = $_FILES['photo']['name'];

		$fichier = $_FILES['photo']['name'];
		$fichier1 = $_FILES['fichier_contrat']['name'];

		$upload = "img/".$fichier;
		$upload1 = "fichier/".$fichier1;

		move_uploaded_file($_FILES['photo']['tmp_name'], $upload);
		move_uploaded_file($_FILES['fichier_contrat']['tmp_name'], $upload1);
		$req = "SELECT * FROM categorie WHERE nom_categorie ='$categorie'";
		$resutat = mysqli_query($conn,$req);
		$row = $resutat->fetch_assoc();
		$identifiant = $row['id_categorie'];
		$sql = "INSERT INTO personnel(id_categorie,nom,prenom,dateNaissance,sexe,nationalite,cin,adresse,telephone,mail,situation,nombre,diplome,grille,photo,profil,pay,jours_conge,hors_service,type_contrat,fichier_contrat,date_debut,date_fin) VALUES ('$identifiant','$nom','$prenom','$dateNaissance','$sexe','$nationalite','$cin','$adresse','$telephone','$email','$situation','$nombre','$diplome','non_agricole','$photo','embauche','1','0','1','$contrat','$fichier_contrat','$mois','$fin')";
			if(mysqli_query($conn,$sql))
				{
					$req1 = "SELECT * FROM personnel ORDER BY id DESC";
					$res = mysqli_query($conn,$req1);
					$row1 = $res->fetch_assoc();
					$id_personnel = $row1['id'];
					$id_categorie = $row1['id_categorie'];
					$sql1 = "INSERT INTO poste_insertion(id_personnel,id_categorie,nom_poste,nom_service) VALUES ('$id_personnel','$id_categorie','$poste','$service')";
					$res1 = mysqli_query($conn,$sql1);
					header("Location: profil.php");
				}
				else
				{
					echo '<script type="text/javascript"> alert("Erreur d`inscription") </script>';
				}
		
		
		}
?>