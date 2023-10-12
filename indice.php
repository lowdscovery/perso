<?php
require("traiteindice.php");
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');

  $req = $bdd->prepare("SELECT * FROM indice");
  $req->execute(array());
  $info = $req->fetch();
  if (isset($_POST['enregistrer'])) 
  {
    $Nagricole = $_POST['Nagricole'];
    $agricole = $_POST['agricole'];

    if (empty($Nagricole) OR empty($agricole)) {
       echo '<script type="text/javascript"> alert("Erreur de saisie") </script>';
    }
    else
    {

    $sql = $bdd->prepare("UPDATE indice SET Nagricole='$Nagricole',agricole='$agricole'");
    $sql->execute(array());
    $sql1 = $bdd->query("SELECT * FROM indice");
    $row1 = $sql1->fetch();
/*Update Non agricole embauche*/
    $sql2_id1 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 1");
    $row2_id1 = $sql2_id1->fetch();
    $sql2_id2 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 2");
    $row2_id2 = $sql2_id2->fetch();
    $sql2_id3 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 3");
    $row2_id3 = $sql2_id3->fetch();
    $sql2_id4 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 4");
    $row2_id4 = $sql2_id4->fetch();
    $sql2_id5 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 5");
    $row2_id5 = $sql2_id5->fetch();
    $sql2_id6 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 6");
    $row2_id6 = $sql2_id6->fetch();
    $sql2_id7 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 7");
    $row2_id7 = $sql2_id7->fetch();
    $sql2_id8 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 8");
    $row2_id8 = $sql2_id8->fetch();
    $sql2_id9 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 9");
    $row2_id9 = $sql2_id9->fetch();
    $sql2_id10 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 10");
    $row2_id10 = $sql2_id10->fetch();

    $indice = $row1['Nagricole'];
    $Nagricole1 = $row2_id1['indice'];
    $Nagricole2 = $row2_id2['indice'];
    $Nagricole3 = $row2_id3['indice'];
    $Nagricole4 = $row2_id4['indice'];
    $Nagricole5 = $row2_id5['indice'];
    $Nagricole6 = $row2_id6['indice'];
    $Nagricole7 = $row2_id7['indice'];
    $Nagricole8 = $row2_id8['indice'];
    $Nagricole9 = $row2_id9['indice'];
    $Nagricole10 = $row2_id10['indice'];

    $calcule1 = $Nagricole1 * $indice;
    $calcule2 = $Nagricole2 * $indice;
    $calcule3 = $Nagricole3 * $indice;
    $calcule4 = $Nagricole4 * $indice;
    $calcule5 = $Nagricole5 * $indice;
    $calcule6 = $Nagricole6 * $indice;
    $calcule7 = $Nagricole7 * $indice;
    $calcule8 = $Nagricole8 * $indice;
    $calcule9 = $Nagricole9 * $indice;
    $calcule10 = $Nagricole10 * $indice;
    $calcul1 = number_format($calcule1, 2, '.','');
    $calcul2 = number_format($calcule2, 2, '.','');
    $calcul3 = number_format($calcule3, 2, '.','');
    $calcul4 = number_format($calcule4, 2, '.','');
    $calcul5 = number_format($calcule5, 2, '.','');
    $calcul6 = number_format($calcule6, 2, '.','');
    $calcul7 = number_format($calcule7, 2, '.','');
    $calcul8 = number_format($calcule8, 2, '.','');
    $calcul9 = number_format($calcule9, 2, '.','');
    $calcul10 = number_format($calcule10, 2, '.','');
    $sql3_id1 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_horaire = '$calcul1' where id_categorie = 1");
    $sql3_id1->execute(array());
    $sql3_id2 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_horaire = '$calcul2' where id_categorie = 2");
    $sql3_id2->execute(array());
    $sql3_id3 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_horaire = '$calcul3' where id_categorie = 3");
    $sql3_id3->execute(array());
    $sql3_id4 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_horaire = '$calcul4' where id_categorie = 4");
    $sql3_id4->execute(array());
    $sql3_id5 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_horaire = '$calcul5' where id_categorie = 5");
    $sql3_id5->execute(array());
    $sql3_id6 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_horaire = '$calcul6' where id_categorie = 6");
    $sql3_id6->execute(array());
    $sql3_id7 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_horaire = '$calcul7' where id_categorie = 7");
    $sql3_id7->execute(array());
    $sql3_id8 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_horaire = '$calcul8' where id_categorie = 8");
    $sql3_id8->execute(array());
    $sql3_id9 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_horaire = '$calcul9' where id_categorie = 9");
    $sql3_id9->execute(array());
    $sql3_id10 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_horaire = '$calcul10' where id_categorie = 10");
    $sql3_id10->execute(array());

    $up1 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 1");
    $salaire1 = $up1->fetch();
    $up2 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 2");
    $salaire2 = $up2->fetch();
    $up3 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 3");
    $salaire3 = $up3->fetch();
    $up4 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 4");
    $salaire4 = $up4->fetch();
    $up5 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 5");
    $salaire5 = $up5->fetch();
    $up6 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 6");
    $salaire6 = $up6->fetch();
    $up7 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 7");
    $salaire7 = $up7->fetch();
    $up8 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 8");
    $salaire8 = $up8->fetch();
    $up9 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 9");
    $salaire9 = $up9->fetch();
    $up10 = $bdd->query("SELECT * FROM non_agri_embauche WHERE id_categorie = 10");
    $salaire10 = $up10->fetch();
    $valeur1 = $salaire1['salaire_horaire'];
    $valeur2 = $salaire2['salaire_horaire'];
    $valeur3 = $salaire3['salaire_horaire'];
    $valeur4 = $salaire4['salaire_horaire'];
    $valeur5 = $salaire5['salaire_horaire'];
    $valeur6 = $salaire6['salaire_horaire'];
    $valeur7 = $salaire7['salaire_horaire'];
    $valeur8 = $salaire8['salaire_horaire'];
    $valeur9 = $salaire9['salaire_horaire'];
    $valeur10 = $salaire10['salaire_horaire'];
    $operation1 = $valeur1 * 173.33;
    $operation2 = $valeur2 * 173.33;
    $operation3 = $valeur3 * 173.33;
    $operation4 = $valeur4 * 173.33;
    $operation5 = $valeur5 * 173.33;
    $operation6 = $valeur6 * 173.33;
    $operation7 = $valeur7 * 173.33;
    $operation8 = $valeur8 * 173.33;
    $operation9 = $valeur9 * 173.33;
    $operation10 = $valeur10 * 173.33;
    $operatio1 = number_format($operation1, 0, '.','');
    $operatio2 = number_format($operation2, 0, '.','');
    $operatio3 = number_format($operation3, 0, '.','');
    $operatio4 = number_format($operation4, 0, '.','');
    $operatio5 = number_format($operation5, 0, '.','');
    $operatio6 = number_format($operation6, 0, '.','');
    $operatio7 = number_format($operation7, 0, '.','');
    $operatio8 = number_format($operation8, 0, '.','');
    $operatio9 = number_format($operation9, 0, '.','');
    $operatio10 = number_format($operation10, 0, '.','');
    $up1 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_mensuel = '$operatio1' where id_categorie = 1");
    $up1->execute(array());
    $up2 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_mensuel = '$operatio2' where id_categorie = 2");
    $up2->execute(array());
    $up3 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_mensuel = '$operatio3' where id_categorie = 3");
    $up3->execute(array());
    $up4 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_mensuel = '$operatio4' where id_categorie = 4");
    $up4->execute(array());
    $up5 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_mensuel = '$operatio5' where id_categorie = 5");
    $up5->execute(array());
    $up6 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_mensuel = '$operatio6' where id_categorie = 6");
    $up6->execute(array());
    $up7 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_mensuel = '$operatio7' where id_categorie = 7");
    $up7->execute(array());
    $up8 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_mensuel = '$operatio8' where id_categorie = 8");
    $up8->execute(array());
    $up9 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_mensuel = '$operatio9' where id_categorie = 9");
    $up9->execute(array());
    $up10 = $bdd->prepare("UPDATE non_agri_embauche SET salaire_mensuel = '$operatio10' where id_categorie = 10");
    $up10->execute(array());

/*Update Non agricole anciennette*/
    $sql4_id1 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 1");
    $row4_id1 = $sql4_id1->fetch();
    $sql4_id2 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 2");
    $row4_id2 = $sql4_id2->fetch();
    $sql4_id3 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 3");
    $row4_id3 = $sql4_id3->fetch();
    $sql4_id4 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 4");
    $row4_id4 = $sql4_id4->fetch();
    $sql4_id5 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 5");
    $row4_id5 = $sql4_id5->fetch();
    $sql4_id6 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 6");
    $row4_id6 = $sql4_id6->fetch();
    $sql4_id7 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 7");
    $row4_id7 = $sql4_id7->fetch();
    $sql4_id8 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 8");
    $row4_id8 = $sql4_id8->fetch();
    $sql4_id9 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 9");
    $row4_id9 = $sql4_id9->fetch();
    $sql4_id10 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 10");
    $row4_id10 = $sql4_id10->fetch();

    $indice1 = $row1['Nagricole'];
    $Nagricole1_1 = $row4_id1['indice'];
    $Nagricole1_2 = $row4_id2['indice'];
    $Nagricole1_3 = $row4_id3['indice'];
    $Nagricole1_4 = $row4_id4['indice'];
    $Nagricole1_5 = $row4_id5['indice'];
    $Nagricole1_6 = $row4_id6['indice'];
    $Nagricole1_7 = $row4_id7['indice'];
    $Nagricole1_8 = $row4_id8['indice'];
    $Nagricole1_9 = $row4_id9['indice'];
    $Nagricole1_10 = $row4_id10['indice'];
    $calcule1_1 = $Nagricole1_1 * $indice1;
    $calcule1_2 = $Nagricole1_2 * $indice1;
    $calcule1_3 = $Nagricole1_3 * $indice1;
    $calcule1_4 = $Nagricole1_4 * $indice1;
    $calcule1_5 = $Nagricole1_5 * $indice1;
    $calcule1_6 = $Nagricole1_6 * $indice1;
    $calcule1_7 = $Nagricole1_7 * $indice1;
    $calcule1_8 = $Nagricole1_8 * $indice1;
    $calcule1_9 = $Nagricole1_9 * $indice1;
    $calcule1_10 = $Nagricole1_10 * $indice1;
    $calcul1_1 = number_format($calcule1_1, 2, '.','');
    $calcul1_2 = number_format($calcule1_2, 2, '.','');
    $calcul1_3 = number_format($calcule1_3, 2, '.','');
    $calcul1_4 = number_format($calcule1_4, 2, '.','');
    $calcul1_5 = number_format($calcule1_5, 2, '.','');
    $calcul1_6 = number_format($calcule1_6, 2, '.','');
    $calcul1_7 = number_format($calcule1_7, 2, '.','');
    $calcul1_8 = number_format($calcule1_8, 2, '.','');
    $calcul1_9 = number_format($calcule1_9, 2, '.','');
    $calcul1_10 = number_format($calcule1_10, 2, '.','');
    $sql5_id1 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_horaire='$calcul1_1' WHERE id_categorie = 1");
    $sql5_id1->execute(array());
    $sql5_id2 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_horaire='$calcul1_2' WHERE id_categorie = 2");
    $sql5_id2->execute(array());
    $sql5_id3 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_horaire='$calcul1_3' WHERE id_categorie = 3");
    $sql5_id3->execute(array());
    $sql5_id4 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_horaire='$calcul1_4' WHERE id_categorie = 4");
    $sql5_id4->execute(array());
    $sql5_id5 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_horaire='$calcul1_5' WHERE id_categorie = 5");
    $sql5_id5->execute(array());
    $sql5_id6 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_horaire='$calcul1_6' WHERE id_categorie = 6");
    $sql5_id6->execute(array());
    $sql5_id7 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_horaire='$calcul1_7' WHERE id_categorie = 7");
    $sql5_id7->execute(array());
    $sql5_id8 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_horaire='$calcul1_8' WHERE id_categorie = 8");
    $sql5_id8->execute(array());
    $sql5_id9 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_horaire='$calcul1_9' WHERE id_categorie = 9");
    $sql5_id9->execute(array());
    $sql5_id10 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_horaire='$calcul1_10' WHERE id_categorie = 10");
    $sql5_id10->execute(array());
    $up2_id1 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 1");
    $salaire2_id1 = $up2_id1->fetch();
    $up2_id2 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 2");
    $salaire2_id2 = $up2_id2->fetch();
    $up2_id3 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 3");
    $salaire2_id3 = $up2_id3->fetch();
    $up2_id4 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 4");
    $salaire2_id4 = $up2_id4->fetch();
    $up2_id5 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 5");
    $salaire2_id5 = $up2_id5->fetch();
    $up2_id6 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 6");
    $salaire2_id6 = $up2_id6->fetch();
    $up2_id7 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 7");
    $salaire2_id7 = $up2_id7->fetch();
    $up2_id8 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 8");
    $salaire2_id8 = $up2_id8->fetch();
    $up2_id9 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 9");
    $salaire2_id9 = $up2_id9->fetch();
    $up2_id10 = $bdd->query("SELECT * FROM non_agri_anciennete WHERE id_categorie = 10");
    $salaire2_id10 = $up2_id10->fetch();
    $valeur2_id1 = $salaire2_id1['salaire_horaire'];
    $valeur2_id2 = $salaire2_id2['salaire_horaire'];
    $valeur2_id3 = $salaire2_id3['salaire_horaire'];
    $valeur2_id4 = $salaire2_id4['salaire_horaire'];
    $valeur2_id5 = $salaire2_id5['salaire_horaire'];
    $valeur2_id6 = $salaire2_id6['salaire_horaire'];
    $valeur2_id7 = $salaire2_id7['salaire_horaire'];
    $valeur2_id8 = $salaire2_id8['salaire_horaire'];
    $valeur2_id9 = $salaire2_id9['salaire_horaire'];
    $valeur2_id10 = $salaire2_id10['salaire_horaire'];
    $operation2_id1 = $valeur2_id1 * 173.33;
    $operation2_id2 = $valeur2_id2 * 173.33;
    $operation2_id3 = $valeur2_id3 * 173.33;
    $operation2_id4 = $valeur2_id4 * 173.33;
    $operation2_id5 = $valeur2_id5 * 173.33;
    $operation2_id6 = $valeur2_id6 * 173.33;
    $operation2_id7 = $valeur2_id7 * 173.33;
    $operation2_id8 = $valeur2_id8 * 173.33;
    $operation2_id9 = $valeur2_id9 * 173.33;
    $operation2_id10 = $valeur2_id10 * 173.33;
    $operatio2_id1 = number_format($operation2_id1, 0, '.','');
    $operatio2_id2 = number_format($operation2_id2, 0, '.','');
    $operatio2_id3 = number_format($operation2_id3, 0, '.','');
    $operatio2_id4 = number_format($operation2_id4, 0, '.','');
    $operatio2_id5 = number_format($operation2_id5, 0, '.','');
    $operatio2_id6 = number_format($operation2_id6, 0, '.','');
    $operatio2_id7 = number_format($operation2_id7, 0, '.','');
    $operatio2_id8 = number_format($operation2_id8, 0, '.','');
    $operatio2_id9 = number_format($operation2_id9, 0, '.','');
    $operatio2_id10 = number_format($operation2_id10, 0, '.','');
    $up2_id1 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_mensuel = '$operatio2_id1' where id_categorie = 1");
    $up2_id1->execute(array());
    $up2_id2 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_mensuel = '$operatio2_id2' where id_categorie = 2");
    $up2_id2->execute(array());
    $up2_id3 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_mensuel = '$operatio2_id3' where id_categorie = 3");
    $up2_id3->execute(array());
    $up2_id4 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_mensuel = '$operatio2_id4' where id_categorie = 4");
    $up2_id4->execute(array());
    $up2_id5 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_mensuel = '$operatio2_id5' where id_categorie = 5");
    $up2_id5->execute(array());
    $up2_id6 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_mensuel = '$operatio2_id6' where id_categorie = 6");
    $up2_id6->execute(array());
    $up2_id7 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_mensuel = '$operatio2_id7' where id_categorie = 7");
    $up2_id7->execute(array());
    $up2_id8 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_mensuel = '$operatio2_id8' where id_categorie = 8");
    $up2_id8->execute(array());
    $up2_id9 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_mensuel = '$operatio2_id9' where id_categorie = 9");
    $up2_id9->execute(array());
    $up2_id10 = $bdd->prepare("UPDATE non_agri_anciennete SET salaire_mensuel = '$operatio2_id10' where id_categorie = 10");
    $up2_id10->execute(array());
    

/*Update agricole embauche*/
    $sql6_id1 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 1");
    $row6_id1 = $sql6_id1->fetch();
    $sql6_id2 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 2");
    $row6_id2 = $sql6_id2->fetch();
    $sql6_id3 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 3");
    $row6_id3 = $sql6_id3->fetch();
    $sql6_id4 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 4");
    $row6_id4 = $sql6_id4->fetch();
    $sql6_id5 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 5");
    $row6_id5 = $sql6_id5->fetch();
    $sql6_id6 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 6");
    $row6_id6 = $sql6_id6->fetch();
    $sql6_id7 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 7");
    $row6_id7 = $sql6_id7->fetch();
    $sql6_id8 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 8");
    $row6_id8 = $sql6_id8->fetch();
    $sql6_id9 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 9");
    $row6_id9 = $sql6_id9->fetch();
    $sql6_id10 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 10");
    $row6_id10 = $sql6_id10->fetch();

    $indice2 = $row1['agricole'];
    $Nagricole2_1 = $row6_id1['indice'];
    $Nagricole2_2 = $row6_id2['indice'];
    $Nagricole2_3 = $row6_id3['indice'];
    $Nagricole2_4 = $row6_id4['indice'];
    $Nagricole2_5 = $row6_id5['indice'];
    $Nagricole2_6 = $row6_id6['indice'];
    $Nagricole2_7 = $row6_id7['indice'];
    $Nagricole2_8 = $row6_id8['indice'];
    $Nagricole2_9 = $row6_id9['indice'];
    $Nagricole2_10 = $row6_id10['indice'];
    $calcule2_1 = $Nagricole2_1 * $indice2;
    $calcule2_2 = $Nagricole2_2 * $indice2;
    $calcule2_3 = $Nagricole2_3 * $indice2;
    $calcule2_4 = $Nagricole2_4 * $indice2;
    $calcule2_5 = $Nagricole2_5 * $indice2;
    $calcule2_6 = $Nagricole2_6 * $indice2;
    $calcule2_7 = $Nagricole2_7 * $indice2;
    $calcule2_8 = $Nagricole2_8 * $indice2;
    $calcule2_9 = $Nagricole2_9 * $indice2;
    $calcule2_10 = $Nagricole2_10 * $indice2;
    $calcul2_1 = number_format($calcule2_1, 2, '.','');
    $calcul2_2 = number_format($calcule2_2, 2, '.','');
    $calcul2_3 = number_format($calcule2_3, 2, '.','');
    $calcul2_4 = number_format($calcule2_4, 2, '.','');
    $calcul2_5 = number_format($calcule2_5, 2, '.','');
    $calcul2_6 = number_format($calcule2_6, 2, '.','');
    $calcul2_7 = number_format($calcule2_7, 2, '.','');
    $calcul2_8 = number_format($calcule2_8, 2, '.','');
    $calcul2_9 = number_format($calcule2_9, 2, '.','');
    $calcul2_10 = number_format($calcule2_10, 2, '.','');
    $sql7_id1 = $bdd->prepare("UPDATE agri_embauche SET salaire_horaire='$calcul2_1' WHERE id_categorie = 1");
    $sql7_id1->execute(array());
    $sql7_id2 = $bdd->prepare("UPDATE agri_embauche SET salaire_horaire='$calcul2_2' WHERE id_categorie = 2");
    $sql7_id2->execute(array());
    $sql7_id3 = $bdd->prepare("UPDATE agri_embauche SET salaire_horaire='$calcul2_3' WHERE id_categorie = 3");
    $sql7_id3->execute(array());
    $sql7_id4 = $bdd->prepare("UPDATE agri_embauche SET salaire_horaire='$calcul2_4' WHERE id_categorie = 4");
    $sql7_id4->execute(array());
    $sql7_id5 = $bdd->prepare("UPDATE agri_embauche SET salaire_horaire='$calcul2_5' WHERE id_categorie = 5");
    $sql7_id5->execute(array());
    $sql7_id6 = $bdd->prepare("UPDATE agri_embauche SET salaire_horaire='$calcul2_6' WHERE id_categorie = 6");
    $sql7_id6->execute(array());
    $sql7_id7 = $bdd->prepare("UPDATE agri_embauche SET salaire_horaire='$calcul2_7' WHERE id_categorie = 7");
    $sql7_id7->execute(array());
    $sql7_id8 = $bdd->prepare("UPDATE agri_embauche SET salaire_horaire='$calcul2_8' WHERE id_categorie = 8");
    $sql7_id8->execute(array());
    $sql7_id9 = $bdd->prepare("UPDATE agri_embauche SET salaire_horaire='$calcul2_9' WHERE id_categorie = 9");
    $sql7_id9->execute(array());
    $sql7_id10 = $bdd->prepare("UPDATE agri_embauche SET salaire_horaire='$calcul2_10' WHERE id_categorie = 10");
    $sql7_id10->execute(array());
    $up3_id1 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 1");
    $salaire3_id1 = $up3_id1->fetch();
    $up3_id2 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 2");
    $salaire3_id2 = $up3_id2->fetch();
    $up3_id3 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 3");
    $salaire3_id3 = $up3_id3->fetch();
    $up3_id4 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 4");
    $salaire3_id4 = $up3_id4->fetch();
    $up3_id5 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 5");
    $salaire3_id5 = $up3_id5->fetch();
    $up3_id6 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 6");
    $salaire3_id6 = $up3_id6->fetch();
    $up3_id7 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 7");
    $salaire3_id7 = $up3_id7->fetch();
    $up3_id8 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 8");
    $salaire3_id8 = $up3_id8->fetch();
    $up3_id9 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 9");
    $salaire3_id9 = $up3_id9->fetch();
    $up3_id10 = $bdd->query("SELECT * FROM agri_embauche WHERE id_categorie = 10");
    $salaire3_id10 = $up3_id10->fetch();
    $valeur3_1 = $salaire3_id1['salaire_horaire'];
    $valeur3_2 = $salaire3_id2['salaire_horaire'];
    $valeur3_3 = $salaire3_id3['salaire_horaire'];
    $valeur3_4 = $salaire3_id4['salaire_horaire'];
    $valeur3_5 = $salaire3_id5['salaire_horaire'];
    $valeur3_6 = $salaire3_id6['salaire_horaire'];
    $valeur3_7 = $salaire3_id7['salaire_horaire'];
    $valeur3_8 = $salaire3_id8['salaire_horaire'];
    $valeur3_9 = $salaire3_id9['salaire_horaire'];
    $valeur3_10 = $salaire3_id10['salaire_horaire'];
    $operation3_1 = $valeur3_1 * 200;
    $operation3_2 = $valeur3_2 * 200;
    $operation3_3 = $valeur3_3 * 200;
    $operation3_4 = $valeur3_4 * 200;
    $operation3_5 = $valeur3_5 * 200;
    $operation3_6 = $valeur3_6 * 200;
    $operation3_7 = $valeur3_7 * 200;
    $operation3_8 = $valeur3_8 * 200;
    $operation3_9 = $valeur3_9 * 200;
    $operation3_10 = $valeur3_10 * 200;
    $operatio3_1 = number_format($operation3_1, 0, '.','');
    $operatio3_2 = number_format($operation3_2, 0, '.','');
    $operatio3_3 = number_format($operation3_3, 0, '.','');
    $operatio3_4 = number_format($operation3_4, 0, '.','');
    $operatio3_5 = number_format($operation3_5, 0, '.','');
    $operatio3_6 = number_format($operation3_6, 0, '.','');
    $operatio3_7 = number_format($operation3_7, 0, '.','');
    $operatio3_8 = number_format($operation3_8, 0, '.','');
    $operatio3_9 = number_format($operation3_9, 0, '.','');
    $operatio3_10 = number_format($operation3_10, 0, '.','');
    $up3_id1 = $bdd->prepare("UPDATE agri_embauche SET salaire_mensuel = '$operatio3_1' where id_categorie = 1");
    $up3_id1->execute(array());
    $up3_id2 = $bdd->prepare("UPDATE agri_embauche SET salaire_mensuel = '$operatio3_2' where id_categorie = 2");
    $up3_id2->execute(array());
    $up3_id3 = $bdd->prepare("UPDATE agri_embauche SET salaire_mensuel = '$operatio3_3' where id_categorie = 3");
    $up3_id3->execute(array());
    $up3_id4 = $bdd->prepare("UPDATE agri_embauche SET salaire_mensuel = '$operatio3_4' where id_categorie = 4");
    $up3_id4->execute(array());
    $up3_id5 = $bdd->prepare("UPDATE agri_embauche SET salaire_mensuel = '$operatio3_5' where id_categorie = 5");
    $up3_id5->execute(array());
    $up3_id6 = $bdd->prepare("UPDATE agri_embauche SET salaire_mensuel = '$operatio3_6' where id_categorie = 6");
    $up3_id6->execute(array());
    $up3_id7 = $bdd->prepare("UPDATE agri_embauche SET salaire_mensuel = '$operatio3_7' where id_categorie = 7");
    $up3_id7->execute(array());
    $up3_id8 = $bdd->prepare("UPDATE agri_embauche SET salaire_mensuel = '$operatio3_8' where id_categorie = 8");
    $up3_id8->execute(array());
    $up3_id9 = $bdd->prepare("UPDATE agri_embauche SET salaire_mensuel = '$operatio3_9' where id_categorie = 9");
    $up3_id9->execute(array());
    $up3_id10 = $bdd->prepare("UPDATE agri_embauche SET salaire_mensuel = '$operatio3_10' where id_categorie = 10");
    $up3_id10->execute(array());

/*Update agricole anciennette*/ 
    $sql8_id1 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 1");
    $row8_id1 = $sql8_id1->fetch();
    $sql8_id2 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 2");
    $row8_id2 = $sql8_id2->fetch();
    $sql8_id3 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 3");
    $row8_id3 = $sql8_id3->fetch();
    $sql8_id4 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 4");
    $row8_id4 = $sql8_id4->fetch();
    $sql8_id5 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 5");
    $row8_id5 = $sql8_id5->fetch();
    $sql8_id6 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 6");
    $row8_id6 = $sql8_id6->fetch();
    $sql8_id7 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 7");
    $row8_id7 = $sql8_id7->fetch();
    $sql8_id8 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 8");
    $row8_id8 = $sql8_id8->fetch();
    $sql8_id9 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 9");
    $row8_id9 = $sql8_id9->fetch();
    $sql8_id10 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 10");
    $row8_id10 = $sql8_id10->fetch();

    $indice3 = $row1['agricole'];
    $Nagricole3_1 = $row8_id1['indice'];
    $Nagricole3_2 = $row8_id2['indice'];
    $Nagricole3_3 = $row8_id3['indice'];
    $Nagricole3_4 = $row8_id4['indice'];
    $Nagricole3_5 = $row8_id5['indice'];
    $Nagricole3_6 = $row8_id6['indice'];
    $Nagricole3_7 = $row8_id7['indice'];
    $Nagricole3_8 = $row8_id8['indice'];
    $Nagricole3_9 = $row8_id9['indice'];
    $Nagricole3_10 = $row8_id10['indice'];
    $calcule3_1 = $Nagricole3_1 * $indice3;
    $calcule3_2 = $Nagricole3_2 * $indice3;
    $calcule3_3 = $Nagricole3_3 * $indice3;
    $calcule3_4 = $Nagricole3_4 * $indice3;
    $calcule3_5 = $Nagricole3_5 * $indice3;
    $calcule3_6 = $Nagricole3_6 * $indice3;
    $calcule3_7 = $Nagricole3_7 * $indice3;
    $calcule3_8 = $Nagricole3_8 * $indice3;
    $calcule3_9 = $Nagricole3_9 * $indice3;
    $calcule3_10 = $Nagricole3_10 * $indice3;
    $calcul3_1 = number_format($calcule3_1, 2, '.','');
    $calcul3_2 = number_format($calcule3_2, 2, '.','');
    $calcul3_3 = number_format($calcule3_3, 2, '.','');
    $calcul3_4 = number_format($calcule3_4, 2, '.','');
    $calcul3_5 = number_format($calcule3_5, 2, '.','');
    $calcul3_6 = number_format($calcule3_6, 2, '.','');
    $calcul3_7 = number_format($calcule3_7, 2, '.','');
    $calcul3_8 = number_format($calcule3_8, 2, '.','');
    $calcul3_9 = number_format($calcule3_9, 2, '.','');
    $calcul3_10 = number_format($calcule3_10, 2, '.','');
    $sql9_id1 = $bdd->prepare("UPDATE agri_anciennete SET salaire_horaire='$calcul3_1' WHERE id_categorie = 1");
    $sql9_id1->execute(array());
    $sql9_id2 = $bdd->prepare("UPDATE agri_anciennete SET salaire_horaire='$calcul3_2' WHERE id_categorie = 2");
    $sql9_id2->execute(array());
    $sql9_id3 = $bdd->prepare("UPDATE agri_anciennete SET salaire_horaire='$calcul3_3' WHERE id_categorie = 3");
    $sql9_id3->execute(array());
    $sql9_id4 = $bdd->prepare("UPDATE agri_anciennete SET salaire_horaire='$calcul3_4' WHERE id_categorie = 4");
    $sql9_id4->execute(array());
    $sql9_id5 = $bdd->prepare("UPDATE agri_anciennete SET salaire_horaire='$calcul3_5' WHERE id_categorie = 5");
    $sql9_id5->execute(array());
    $sql9_id6 = $bdd->prepare("UPDATE agri_anciennete SET salaire_horaire='$calcul3_6' WHERE id_categorie = 6");
    $sql9_id6->execute(array());
    $sql9_id7 = $bdd->prepare("UPDATE agri_anciennete SET salaire_horaire='$calcul3_7' WHERE id_categorie = 7");
    $sql9_id7->execute(array());
    $sql9_id8 = $bdd->prepare("UPDATE agri_anciennete SET salaire_horaire='$calcul3_8' WHERE id_categorie = 8");
    $sql9_id8->execute(array());
    $sql9_id9 = $bdd->prepare("UPDATE agri_anciennete SET salaire_horaire='$calcul3_9' WHERE id_categorie = 9");
    $sql9_id9->execute(array());
    $sql9_id10 = $bdd->prepare("UPDATE agri_anciennete SET salaire_horaire='$calcul3_10' WHERE id_categorie = 10");
    $sql9_id10->execute(array());
    $up4_id1 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 1");
    $salaire4_id1 = $up4_id1->fetch();
    $up4_id2 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 2");
    $salaire4_id2 = $up4_id2->fetch();
    $up4_id3 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 3");
    $salaire4_id3 = $up4_id3->fetch();
    $up4_id4 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 4");
    $salaire4_id4 = $up4_id4->fetch();
    $up4_id5 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 5");
    $salaire4_id5 = $up4_id5->fetch();
    $up4_id6 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 6");
    $salaire4_id6 = $up4_id6->fetch();
    $up4_id7 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 7");
    $salaire4_id7 = $up4_id7->fetch();
    $up4_id8 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 8");
    $salaire4_id8 = $up4_id8->fetch();
    $up4_id9 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 9");
    $salaire4_id9 = $up4_id9->fetch();
    $up4_id10 = $bdd->query("SELECT * FROM agri_anciennete WHERE id_categorie = 10");
    $salaire4_id10 = $up4_id10->fetch();
    $valeur4_1 = $salaire4_id1['salaire_horaire'];
    $valeur4_2 = $salaire4_id2['salaire_horaire'];
    $valeur4_3 = $salaire4_id3['salaire_horaire'];
    $valeur4_4 = $salaire4_id4['salaire_horaire'];
    $valeur4_5 = $salaire4_id5['salaire_horaire'];
    $valeur4_6 = $salaire4_id6['salaire_horaire'];
    $valeur4_7 = $salaire4_id7['salaire_horaire'];
    $valeur4_8 = $salaire4_id8['salaire_horaire'];
    $valeur4_9 = $salaire4_id9['salaire_horaire'];
    $valeur4_10 = $salaire4_id10['salaire_horaire'];
    $operation4_1 = $valeur4_1 * 200;
    $operation4_2 = $valeur4_2 * 200;
    $operation4_3 = $valeur4_3 * 200;
    $operation4_4 = $valeur4_4 * 200;
    $operation4_5 = $valeur4_5 * 200;
    $operation4_6 = $valeur4_6 * 200;
    $operation4_7 = $valeur4_7 * 200;
    $operation4_8 = $valeur4_8 * 200;
    $operation4_9 = $valeur4_9 * 200;
    $operation4_10 = $valeur4_10 * 200;
    $operatio4_1 = number_format($operation4_1, 0, '.','');
    $operatio4_2 = number_format($operation4_2, 0, '.','');
    $operatio4_3 = number_format($operation4_3, 0, '.','');
    $operatio4_4 = number_format($operation4_4, 0, '.','');
    $operatio4_5 = number_format($operation4_5, 0, '.','');
    $operatio4_6 = number_format($operation4_6, 0, '.','');
    $operatio4_7 = number_format($operation4_7, 0, '.','');
    $operatio4_8 = number_format($operation4_8, 0, '.','');
    $operatio4_9 = number_format($operation4_9, 0, '.','');
    $operatio4_10 = number_format($operation4_10, 0, '.','');
    $up4_id1 = $bdd->prepare("UPDATE agri_anciennete SET salaire_mensuel = '$operatio4_1' where id_categorie = 1");
    $up4_id1->execute(array());
    $up4_id2 = $bdd->prepare("UPDATE agri_anciennete SET salaire_mensuel = '$operatio4_2' where id_categorie = 2");
    $up4_id2->execute(array());
    $up4_id3 = $bdd->prepare("UPDATE agri_anciennete SET salaire_mensuel = '$operatio4_3' where id_categorie = 3");
    $up4_id3->execute(array());
    $up4_id4 = $bdd->prepare("UPDATE agri_anciennete SET salaire_mensuel = '$operatio4_4' where id_categorie = 4");
    $up4_id4->execute(array());
    $up4_id5 = $bdd->prepare("UPDATE agri_anciennete SET salaire_mensuel = '$operatio4_5' where id_categorie = 5");
    $up4_id5->execute(array());
    $up4_id6 = $bdd->prepare("UPDATE agri_anciennete SET salaire_mensuel = '$operatio4_6' where id_categorie = 6");
    $up4_id6->execute(array());
    $up4_id7 = $bdd->prepare("UPDATE agri_anciennete SET salaire_mensuel = '$operatio4_7' where id_categorie = 7");
    $up4_id7->execute(array());
    $up4_id8 = $bdd->prepare("UPDATE agri_anciennete SET salaire_mensuel = '$operatio4_8' where id_categorie = 8");
    $up4_id8->execute(array());
    $up4_id9 = $bdd->prepare("UPDATE agri_anciennete SET salaire_mensuel = '$operatio4_9' where id_categorie = 9");
    $up4_id9->execute(array());
    $up4_id10 = $bdd->prepare("UPDATE agri_anciennete SET salaire_mensuel = '$operatio4_10' where id_categorie = 10");
    $up4_id10->execute(array());
       
    if ($up4_id10->execute(array())) 
    {
      echo '<script type="text/javascript"> alert("Modification réussi") </script>';
    }
    else{
      echo '<script type="text/javascript"> alert("Erreur de modification") </script>';
    }
    }
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Indice</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>

  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">rasoafenosoafara@gmail.com</a>
        <i class="bi bi-phone"></i> +261 32 50 135 09
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">Gestion du personnel</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Accueil</a></li>
          <li class="dropdown"><a href="#">Inscription<i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="inscription.php">Personnel non Agricole</a></li>
              <li><a href="inscription_agricole.php">Personnel Agricole</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="profil.php">Liste</a></li>
          <li><a class="nav-link scrollto active" href="indice.php">Indice</a></li>
          <li><a class="nav-link scrollto" href="grille.php">Grille</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="deconnexion.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Se</span> deconnecté <i class="fa fa-power-off"></i></a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
        </div>
      </div>
    </section>

    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Modifier la valeur du point d'indice</h2>
        </div>
        <form  method="POST" action="" enctype="multipart/form-data" class="contenu">
          <div class="row">
            <?php echo $info ['Nagricole']; ?>
            <div class="col-md-4 form-group">
              <input type="text" name="Nagricole" class="form-control" id="name" placeholder="Secteur NON Agricole" title="Le nom doit être en majuscule" />
            </div>
            
          </div>
          <div class="row">
          
          <?php echo $info ['agricole']; ?>
          
          <div class="col-md-4 form-group">
              <input type="text" name="agricole" class="form-control" id="agricole" placeholder="Secteur Agricole" />
            </div>
          </div>
          <br>  
          <div class="text-center"><button type="submit"  name="enregistrer">Enregistrer</button></div>
          <br>
          <br>
          <br>
          <div class="section-title">
          <h2>Modification de l'indice</h2>
        </div>
        <div class="row">
             <div class="col-md-4 form-group mt-3">
              <select name="categorie" id="input" title="Selectionné une categorie Professionnelle" class="form-select">
                <option value="">Catégorie Professionnelle</option>
                <option value="M1-1A">M1-1A</option>
                <option value="M2-1B">M2-1B</option>
                <option value="OS1-2A">OS1-2A</option>
                <option value="OS2-2B">OS2-2B</option>
                <option value="OS3-3A">OS3-3A</option>
                <option value="OP1A-3B">OP1A-3B</option>
                <option value="OP1B-4A">OP1B-4A</option>
                <option value="OP2A-4B">OP2A-4B</option>
                <option value="OP2B-5A">OP2B-5A</option>
                <option value="OP3-5B">OP3-5B</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="grille" id="grille" class="form-select" >
                <option value="">Grille Salariale</option>
                <option value="non_agricole">Non Agricole</option>
                <option value="agricole">Agricole</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="profil" id="profil" class="form-select" >
                <option value="">Profil</option>
                <option value="embauche">Embauche</option>
                <option value="anciennete">Ancienneté</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="text" name="indice" class="form-control" id="indice" placeholder="Inserer une indice" />
            </div>
            <div class="text-center"><button type="submit"  name="save">Enregistrer</button></div>
          </div>
        </form>
      </div>
      
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>2023</span></strong>. Tout droit reservé
        </div>
        <div class="credits">
          Developpé par <a href="#">RASOAFENO Pauline</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>