<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
  if (isset($_POST['enregistrer'])) 
  {
    $poste = $_POST['poste'];
    $service = $_POST['service'];
    if (!empty($poste) AND empty($service)) {
       $sql = $bdd->prepare("INSERT INTO poste (nom_poste) VALUES ('$poste')");
       $sql->execute(array());
       echo '<script type="text/javascript"> alert("Insersion reussi") </script>';
    }
    else if (!empty($service) AND empty($poste)) 
    {
      $sql = $bdd->prepare("INSERT INTO service (nom_service) VALUES ('$service')");
      $sql->execute(array());
      echo '<script type="text/javascript"> alert("Insersion reussi") </script>';
    }
    else if (!empty($service) AND !empty($poste)) 
    {
      $sql = $bdd->prepare("INSERT INTO poste (nom_poste) VALUES ('$poste')");
      $sql->execute(array());
      $sql1 = $bdd->prepare("INSERT INTO service (nom_service) VALUES ('$service')");
      $sql1->execute(array());
      echo '<script type="text/javascript"> alert("Insersion reussi") </script>';
    }
    else
    {
      echo '<script type="text/javascript"> alert("Erreur d`Insersion") </script>';
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

      <h1 class="logo me-auto"><a href="accueil.php">Gestion de personnel</a></h1>

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
          <h2>Modifier la valeur du point d'indice</h2>
        </div>
        <form  method="POST" action="" enctype="multipart/form-data" class="contenu">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="poste" class="form-control" id="poste" placeholder="Poste" title="Saisissez la nouvelle poste"/>
            </div>
              <div class="col-md-4 form-group">
              <input type="text" name="service" class="form-control" id="" placeholder="Service" title="Saisissez le nouveau service"/>
            </div>
          </div>
          <br>  
          <div class="text-center"><button type="submit"  name="enregistrer">Enregistrer</button></div>
      
        </div>
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