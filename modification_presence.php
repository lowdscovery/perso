<?php
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
if (isset($_GET['id']) AND $_GET['id'] > 0) 
{
  $getid = intval($_GET['id']);
  $req1 = $bdd->prepare("SELECT * FROM presence WHERE id_presence  = ?");
  $req1->execute(array($getid));
  $row = $req1->fetch();
  if (isset($_POST['insertion'])) 
  {
    $heure_presence = $_POST['heure_presence'];
    $sql = $bdd->prepare("UPDATE presence SET heure_presence = '$heure_presence' WHERE id_presence =".$getid);
    if($sql->execute(array()))
    {
      echo '<script type="text/javascript"> alert("Modification reussi") </script>';
      header("Location: liste_presence.php?id=".$row['id_personnel']);
    }
    else
    {
      echo '<script type="text/javascript"> alert("Erreur") </script>';
    }
    
  }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Modifié Heure</title>
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
  <link rel="stylesheet" type="text/css" href="css/all.css">

  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>




  <main id="main">



    <section id="appointment" class="appointment section-bg">
      <div class="container">
        <div class="section-title">
          <h3><b>Modifié l'heure de présence</b></h3>
        </div>
        <form action="" method="post">
        <center>
        
            <div class="col-md-4 form-group mt-3">
              <input type="number" class="form-control" name="heure_presence" id="heure_presence" placeholder="Heure de presence" title="Saisissez l'heure de presence"/>
            </div>
        
        </center>
        
          <br>  
          <div class="text-center"><button type="submit"  name="insertion">Modifier</button></div>  
          <br> 
          <a href="liste_presence.php?id=<?= $row['id_personnel'] ?>" id="print">←</a>        
        </form>
      </div>
    </section>

  </main><!-- End #main -->

  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>