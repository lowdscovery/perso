<?php
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
  $getid = intval($_GET['id']);
  $req = $bdd->prepare("SELECT * FROM `personnel` inner join conge ON personnel.id = conge.id_personnel WHERE id = ?");
  $req->execute(array($getid));
  $user = $req->fetch();
  $req1 = $bdd->prepare("SELECT DATE_FORMAT(date_depart, '%d-%m-%Y') AS  date_depart, DATE_FORMAT(date_arriver, '%d-%m-%Y') AS  date_arriver,DATE_FORMAT(date, '%d-%m-%Y') AS  date FROM  conge WHERE id_personnel = ?");
  $req1->execute(array($getid));

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Congé</title>
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
      <a href="conge.php?id=<?= $user['id'] ?>">←</a>
        <?php if($user > 0) { ?>
        <h6><b>Tous les congés fait par <?php echo $user ['prenom']; ?> : 
          <br>
        Jours de congé restant <font color="red"><?php echo $user ['jours_conge']; ?></font></b> </h6>
            <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                      <th><center>Date du demande</center></th>
                      <th><center>Date de depart</center></th>
                      <th><center>Date d'arrivé</center></th>
                    </tr>
                    </thead>
                    <?php while ($row1 = $req1->fetch()) { ?>
                        <tr>
                          <td><center><?= $row1['date']?></center></td>
                          <td><center><?= $row1['date_depart']?></center></td>
                           <td><center><?= $row1['date_arriver']?></center></td>                        
                        </tr>
                     <?php } ?>
                     <?php } else { ?>
                    <center>
                       <h5><font color="red">Aucune congé n'a été fait par ce personnel</font></h5> 
                    </center>    
                        <?php } ?>   
                </table>              
        </form>
      </div>
    </section>


</body>

</html>