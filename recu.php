<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
if (isset($_GET['id']) AND $_GET['id'] > 0) 
{
  $getid = intval($_GET['id']);
  $requser = $bdd->prepare("SELECT * FROM `personnel` inner JOIN categorie ON personnel.id_categorie = categorie.id_categorie WHERE id = ? ORDER BY id DESC");
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();
  $categorie = $userinfo ['nom_categorie'];
  if ($userinfo ['grille'] =='agricole' AND $userinfo ['profil'] =='embauche') 
  {
    $req = $bdd->prepare("SELECT * FROM `categorie` inner JOIN agri_embauche ON categorie.id_categorie = agri_embauche.id_categorie WHERE nom_categorie ='$categorie'");
    $req->execute(array());
    $row1 = $req->fetch();
    $oo = $row1 ['salaire_mensuel'];
    $calcul = number_format($oo, 0, '.',' ');
    $req1 = $bdd->prepare("SELECT agricole FROM indice");
    $req1->execute(array());
    $row2 = $req1->fetch();
    $uu = $row2 ['agricole']; 

  }
  else if ($userinfo ['grille'] =='agricole' AND $userinfo ['profil'] =='anciennete') 
  {
    $req = $bdd->prepare("SELECT * FROM `categorie` inner JOIN agri_anciennete ON categorie.id_categorie = agri_anciennete.id_categorie WHERE nom_categorie ='$categorie'");
    $req->execute(array());
    $row1 = $req->fetch();
    $oo = $row1 ['salaire_mensuel'];
    $calcul = number_format($oo, 0, '.',' ');
    $req1 = $bdd->prepare("SELECT agricole FROM indice");
    $req1->execute(array());
    $row2 = $req1->fetch();
    $uu = $row2 ['agricole'];

  }
  else if ($userinfo ['grille'] =='non_agricole' AND $userinfo ['profil'] =='embauche') 
  {
    $req = $bdd->prepare("SELECT * FROM `categorie` inner JOIN non_agri_embauche ON categorie.id_categorie = non_agri_embauche.id_categorie WHERE nom_categorie ='$categorie'");
    $req->execute(array());
    $row1 = $req->fetch();
    $oo = $row1 ['salaire_mensuel'];
    $calcul = number_format($oo, 0, '.',' ');
    $req1 = $bdd->prepare("SELECT Nagricole FROM indice");
    $req1->execute(array());
    $row2 = $req1->fetch();
    $uu = $row2 ['Nagricole'];

  }
  else if ($userinfo ['grille'] =='non_agricole' AND $userinfo ['profil'] =='anciennete') 
  {
    $req = $bdd->prepare("SELECT * FROM `categorie` inner JOIN non_agri_anciennete ON categorie.id_categorie = non_agri_anciennete.id_categorie WHERE nom_categorie ='$categorie'");
    $req->execute(array());
    $row1 = $req->fetch();
    $oo = $row1 ['salaire_mensuel'];
    $calcul = number_format($oo, 0, '.',' ');
    $req1 = $bdd->prepare("SELECT Nagricole FROM indice");
    $req1->execute(array());
    $row2 = $req1->fetch();
    $uu = $row2 ['Nagricole'];
  }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Reçu</title>
    <link rel="stylesheet" href="recu.css" />
    <link rel="stylesheet" type="text/css" href="imprimer.css" media="print">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="voice">
     <div class="voice-header">
        <div class="image">
            <img src="images.jpeg">
        </div>
        <div class="company">
            <h2><?php echo $userinfo ['nom']; ?> <?php echo $userinfo ['prenom']; ?></h2>
      
        </div>
     </div>

       <div class="customer">
         <div>
          
         
         </div>
           <div class="detail">
             
             <table>
               <tr>
                 <td>Reçu N°</td>
                 <td>:</td>
                 <td><b>0000<?php echo $userinfo ['id']; ?></b></td>
               </tr>
               <tr>
                 <td>Date</td>
                 <td>:</td>
                 <td><b><?php echo date('d/m/Y')?> </b></td>
               </tr>
               <tr>
                 <td>Bill No</td>
                 <td>:</td>
                 <td><b>200</b></td>
               </tr>
             </table>
         </div>
       </div>

       <div class="producte">
         <table class="tab" border="1" cellspacing="0">
           <tr>
             <th>Valeur</th>
             <th>Indice</th>
             <th>Salaire horaire</th>
             <th>Salaire mensuel</th>
             
             <th rowspan="2">Montant</th>
           </tr>
           <tr> 
           <td><?php echo $uu; ?></td>
           <td><?php echo $row1 ['indice']; ?></td>
           <td><?php echo $row1 ['salaire_horaire']; ?> AR</td>
           <td><?php echo $row1 ['salaire_mensuel']; ?> AR</td>
           
        
           </tr>
            <tr> 
    
           <th colspan="4">Montant</th>
           
           <th><?php echo $calcul;?> AR</th>         
           </tr>
         </table>
       </div>

       <div class="footer">
       
               
               
          <h4> Signature </h4>
          
      

       </div>
   <button onclick="window.print();" class="enregistrer" id="print">Imprimer</button>
    </div>
    <br>
      <a href="profil.php" id="print">Revenir en arrière</a>
  </body>
</html>
