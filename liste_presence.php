<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
  $getid = intval($_GET['id']);
  $req = $bdd->prepare("SELECT * FROM `personnel` inner join presence on personnel.id = presence.id_personnel  WHERE id = ?");
  $req->execute(array($getid));
  $user = $req->fetch();
  $req1 = $bdd->prepare("SELECT id_presence,heure_presence,DATE_FORMAT(date_presence, '%d-%m-%Y') AS date_presence FROM  presence WHERE id_personnel = ?");
  $req1->execute(array($getid));

?>
<!DOCTYPE html>
<html lang="en">

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
      <a href="presence.php?id=<?= $user['id'] ?>" id="print">←</a>
        <?php if($user > 0) { ?>
        <h6><b>Tous les présence faite par <?php echo $user ['prenom']; ?> : 
        <br>
        <br>
            <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                      <th><center>Date de présence</center></th>
                      <th><center>Heure de présence</center></th>
                      <th><center>Modification</center></th>
                    </tr>
                    </thead>
                    <?php while ($row1 = $req1->fetch()) { ?>
                        <tr>
                          <td><center><?= $row1['date_presence']?></center></td>
                          <td><center><?= $row1['heure_presence']?>h</center></td>
                          <td><center><a href="modification_presence.php?id=<?= $row1['id_presence'] ?>" class="btn btn-primary mr-2 mb-2" name="enregistre"><i class="fa fa-edit"></i></a></center></td>                        
                        </tr>
                     <?php } ?>
                     <?php } else { ?>
                    <center>
                       <h5><font color="red">Aucune présence n'a été fait par ce personnel</font></h5> 
                    </center>    
                        <?php } ?>   
                </table>              
        </form>
      </div>
    </section>


</body>

</html>