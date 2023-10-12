<?php
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
if (isset($_GET['id']) AND $_GET['id'] > 0) 
{
  $getid = intval($_GET['id']);
  $req1 = $bdd->prepare("SELECT * FROM personnel WHERE id = ?");
  $req1->execute(array($getid));
  $row = $req1->fetch();
  if (isset($_POST['insertion'])) 
  {
    $heure_presence = $_POST['heure_presence'];
    $sql = $bdd->prepare("INSERT INTO presence(id_personnel,heure_presence) VALUES ('$getid','$heure_presence')");
    if ($row['hors_service'] == 0) 
    {
      echo '<script type="text/javascript"> alert("Ce personnel est hors service") </script>';
    }
    elseif($sql->execute(array()))
    {
      echo '<script type="text/javascript"> alert("Présence Enregister") </script>';
    }
    else
    {
      echo '<script type="text/javascript"> alert("Erreur") </script>';
    }
    
  }
  if (isset($_POST['inser'])) {
    header("Location: liste_presence.php?id=".$row ['id']);
  }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Présence</title>
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

      <h1 class="logo me-auto"><a href="accueil.php">Gestion du personnel</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="accueil.php">Accueil</a></li>
          <li><a class="nav-link scrollto" href="inscription.php">Inscription</a></li>
          <li><a class="nav-link scrollto" href="profil.php">Liste</a></li>
          <li><a class="nav-link scrollto" href="indice.php">Indice</a></li>
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
          <h2>Faire un présence</h2>
        </div>
        <form action="" method="post">
        <center>
        
            <div class="col-md-4 form-group mt-3">
              <input type="number" class="form-control" name="heure_presence" id="heure_presence" placeholder="Heure de presence" title="Saisissez l'heure de presence"/>
            </div>
        
        </center>
        
          <br>  
          <div class="text-center"><button type="submit"  name="insertion">Faire un présence</button></div>  
          <br> 
          <div><button type="submit"  name="inser"><i class="fa fa-eye"></i></button></button></div>        
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