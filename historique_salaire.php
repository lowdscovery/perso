<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
  $getid = intval($_GET['id']);
  $requete = $bdd->prepare("SELECT * FROM `personnel` INNER JOIN salaire on personnel.id = salaire.id_personnel WHERE id = ?");
  $requete->execute(array($getid));
  $user = $requete->fetch();
  $req = $bdd->prepare("SELECT *,DATE_FORMAT(date, '%d-%m-%Y') AS date FROM salaire WHERE id_personnel = ?");
  $req->execute(array($getid));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Historique poste et service</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <section id="appointment">
      <div class="container">
        <form action="" method="POST">
        <br>
      <a href="detail.php?id=<?= $user['id'] ?>" id="print">←</a>
        <?php if($user > 0) { ?>
        <h6><b>Tous les versement fait par <?php echo $user ['prenom']; ?> : 
        <br>
        <br>
            <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                      <th><center>Date du versement</center></th>
                      <th><center>Montant</center></th>
                      
                    </tr>
                    </thead>
                    <?php while ($row = $req->fetch()) { ?>
                        <tr>
                          <td><center><?= $row['date']?></center></td>
                          <td><center><?= $row['montant']?> AR</center></td>
                          
                        </tr>
                     <?php } ?>
                </table> 
                     <?php } else { ?>
                    <center>
                       <h5><font color="red">Aucun historique</font></h5> 
                    </center>    
                        <?php } ?>   
                           
        </form>
      </div>
    </section>


</body>

</html>