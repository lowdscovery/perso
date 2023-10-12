<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
  $getid = intval($_GET['id']);
  $requete = $bdd->prepare("SELECT * FROM `personnel` left JOIN historique_poste on historique_poste.id_personnel = personnel.id left JOIN historique_service ON personnel.id = historique_service.id_personnel WHERE id = ?");
  $requete->execute(array($getid));
  $user = $requete->fetch();
  $req = $bdd->prepare("SELECT *,DATE_FORMAT(date, '%d-%m-%Y') AS date FROM historique_poste WHERE id_personnel = ?");
  $req->execute(array($getid));
  
  $req1 = $bdd->prepare("SELECT *,DATE_FORMAT(date_service, '%d-%m-%Y') AS date_service FROM  historique_service WHERE id_personnel = ?");
  $req1->execute(array($getid));
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
        <h6><b>Tous les historiques de poste et de service excercé par <?php echo $user ['prenom']; ?> : 
        <br>
        <br>
            <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                      <th><center>Poste</center></th>
                      <th><center>Date poste</center></th>
                    </tr>
                    </thead>
                    <?php while ($row_poste = $req->fetch()) { ?>
                        <tr>
                          <td><center><?= $row_poste['nom_poste']?></center></td>
                          <td><center><?= $row_poste['date']?></center></td>
                        </tr>
                     <?php } ?>
         
                </table> 
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                      <th><center>Service</center></th>
                      <th><center>Date service</center></th>
                    </tr>
                    </thead>
                    <?php while ($row_service = $req1->fetch()) { ?>
                        <tr>
                        
                          <td><center><?= $row_service['nom_service']?></center></td>
                          <td><center><?= $row_service['date_service']?></center></td>  
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