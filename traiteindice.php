<?php
require("db.php");

if (isset($_POST['save'])) 
  {
    $categorie = $_POST['categorie'];
    $grille = $_POST['grille'];
    $profil = $_POST['profil'];
    $indi = $_POST['indice'];
    if (empty($categorie) OR empty($grille) OR empty($profil) OR empty($indi)) 
    {
       echo '<script type="text/javascript"> alert("Erreur de saisie") </script>';
    }
    else
    {
    if ($grille =='agricole' AND $profil =='embauche') 
    {
      $req = "SELECT * FROM `categorie` inner JOIN agri_embauche ON categorie.id_categorie = agri_embauche.id_categorie WHERE nom_categorie ='$categorie'";
      $resutat = mysqli_query($conn,$req);
      $row = $resutat->fetch_assoc();
      $identifiant = $row['id_categorie'];
      $req1 = "SELECT * FROM indice";
      $resu = mysqli_query($conn,$req1);
      $row1 = $resu->fetch_assoc();
      $indice = $row1['agricole'];
 
      $sql1 = "UPDATE agri_embauche SET indice='$indi' WHERE id_categorie = $identifiant";
      $resutat1 = mysqli_query($conn,$sql1);
      $sql2 = "SELECT * FROM agri_embauche WHERE id_categorie = $identifiant";
      $resutat2 = mysqli_query($conn,$sql2);
      $row2 = $resutat2->fetch_assoc();
      $agricole = $row2['indice'];
      $calcule = $agricole * $indice;
      $calcul = number_format($calcule, 2, '.','');
      $sql3 = "UPDATE agri_embauche SET salaire_horaire='$calcul' WHERE id_categorie = $identifiant";
      $resutat3 = mysqli_query($conn,$sql3);
      $sql4 = "SELECT * FROM agri_embauche WHERE id_categorie = $identifiant";
      $resutat4 = mysqli_query($conn,$sql4);
      $row4 = $resutat4->fetch_assoc();
      $valeur = $row4['salaire_horaire'];
      $operation = $valeur * 200;
      $operatio = number_format($operation, 0, '.','');
      $sql5 = "UPDATE agri_embauche SET salaire_mensuel='$operatio' WHERE id_categorie = $identifiant";
      if(mysqli_query($conn,$sql5))
        {
          
          echo '<script type="text/javascript"> alert("Insersion réussi") </script>'; 
        }
        else
          {
          echo '<script type="text/javascript"> alert("Erreur d`insersion") </script>';
          }
    }
    else if ($grille =='agricole' AND $profil =='anciennete') 
    {
      $req = "SELECT * FROM `categorie` inner JOIN agri_anciennete ON categorie.id_categorie = agri_anciennete.id_categorie WHERE nom_categorie ='$categorie'";
      $resutat = mysqli_query($conn,$req);
      $row = $resutat->fetch_assoc();
      $identifiant = $row['id_categorie'];
      $req1 = "SELECT * FROM indice";
      $resu = mysqli_query($conn,$req1);
      $row1 = $resu->fetch_assoc();
      $indice = $row1['agricole'];
 
      $sql1 = "UPDATE agri_anciennete SET indice='$indi' WHERE id_categorie = $identifiant";
      $resutat1 = mysqli_query($conn,$sql1);
      $sql2 = "SELECT * FROM agri_anciennete WHERE id_categorie = $identifiant";
      $resutat2 = mysqli_query($conn,$sql2);
      $row2 = $resutat2->fetch_assoc();
      $agricole = $row2['indice'];
      $calcule = $agricole * $indice;
      $calcul = number_format($calcule, 2, '.','');
      $sql3 = "UPDATE agri_anciennete SET salaire_horaire='$calcul' WHERE id_categorie = $identifiant";
      $resutat3 = mysqli_query($conn,$sql3);
      $sql4 = "SELECT * FROM agri_anciennete WHERE id_categorie = $identifiant";
      $resutat4 = mysqli_query($conn,$sql4);
      $row4 = $resutat4->fetch_assoc();
      $valeur = $row4['salaire_horaire'];
      $operation = $valeur * 200;
      $operatio = number_format($operation, 0, '.','');
      $sql5 = "UPDATE agri_anciennete SET salaire_mensuel='$operatio' WHERE id_categorie = $identifiant";
      if(mysqli_query($conn,$sql5))
        {
          
          echo '<script type="text/javascript"> alert("Insersion réussi") </script>'; 
        }
        else
          {
          echo '<script type="text/javascript"> alert("Erreur d`insersion") </script>';
          }
    }
    else if ($grille =='non_agricole' AND $profil =='embauche') 
    {
      $req = "SELECT * FROM `categorie` inner JOIN non_agri_embauche ON categorie.id_categorie = non_agri_embauche.id_categorie WHERE nom_categorie ='$categorie'";
      $resutat = mysqli_query($conn,$req);
      $row = $resutat->fetch_assoc();
      $identifiant = $row['id_categorie'];
      $req1 = "SELECT * FROM indice";
      $resu = mysqli_query($conn,$req1);
      $row1 = $resu->fetch_assoc();
      $indice = $row1['Nagricole'];
 
      $sql1 = "UPDATE non_agri_embauche SET indice='$indi' WHERE id_categorie = $identifiant";
      $resutat1 = mysqli_query($conn,$sql1);
      $sql2 = "SELECT * FROM non_agri_embauche WHERE id_categorie = $identifiant";
      $resutat2 = mysqli_query($conn,$sql2);
      $row2 = $resutat2->fetch_assoc();
      $agricole = $row2['indice'];
      $calcule = $agricole * $indice;
      $calcul = number_format($calcule, 2, '.','');
      $sql3 = "UPDATE non_agri_embauche SET salaire_horaire='$calcul' WHERE id_categorie = $identifiant";
      $resutat3 = mysqli_query($conn,$sql3);
      $sql4 = "SELECT * FROM non_agri_embauche WHERE id_categorie = $identifiant";
      $resutat4 = mysqli_query($conn,$sql4);
      $row4 = $resutat4->fetch_assoc();
      $valeur = $row4['salaire_horaire'];
      $operation = $valeur * 173.33;
      $operatio = number_format($operation, 0, '.','');
      $sql5 = "UPDATE non_agri_embauche SET salaire_mensuel='$operatio' WHERE id_categorie = $identifiant";
      if(mysqli_query($conn,$sql5))
        {
          
          echo '<script type="text/javascript"> alert("Insersion réussi") </script>'; 
        }
        else
          {
          echo '<script type="text/javascript"> alert("Erreur d`insersion") </script>';
          }
    }
    else if ($grille =='non_agricole' AND $profil =='anciennete') 
    {
      $req = "SELECT * FROM `categorie` inner JOIN non_agri_anciennete ON categorie.id_categorie = non_agri_anciennete.id_categorie WHERE nom_categorie ='$categorie'";
      $resutat = mysqli_query($conn,$req);
      $row = $resutat->fetch_assoc();
      $identifiant = $row['id_categorie'];
      $req1 = "SELECT * FROM indice";
      $resu = mysqli_query($conn,$req1);
      $row1 = $resu->fetch_assoc();
      $indice = $row1['Nagricole'];
 
      $sql1 = "UPDATE non_agri_anciennete SET indice='$indi' WHERE id_categorie = $identifiant";
      $resutat1 = mysqli_query($conn,$sql1);
      $sql2 = "SELECT * FROM non_agri_anciennete WHERE id_categorie = $identifiant";
      $resutat2 = mysqli_query($conn,$sql2);
      $row2 = $resutat2->fetch_assoc();
      $agricole = $row2['indice'];
      $calcule = $agricole * $indice;
      $calcul = number_format($calcule, 2, '.','');
      $sql3 = "UPDATE non_agri_anciennete SET salaire_horaire='$calcul' WHERE id_categorie = $identifiant";
      $resutat3 = mysqli_query($conn,$sql3);
      $sql4 = "SELECT * FROM non_agri_anciennete WHERE id_categorie = $identifiant";
      $resutat4 = mysqli_query($conn,$sql4);
      $row4 = $resutat4->fetch_assoc();
      $valeur = $row4['salaire_horaire'];
      $operation = $valeur * 173.33;
      $operatio = number_format($operation, 0, '.','');
      $sql5 = "UPDATE non_agri_anciennete SET salaire_mensuel='$operatio' WHERE id_categorie = $identifiant";
      if(mysqli_query($conn,$sql5))
        {
          
          echo '<script type="text/javascript"> alert("Insersion réussi") </script>'; 
        }
        else
          {
          echo '<script type="text/javascript"> alert("Erreur d`insersion") </script>';
          }
    }
    }
    }
  

?>