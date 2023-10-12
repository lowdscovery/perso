<?php
require("traitversement.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Payement Salaire</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.png" rel="icon">
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

  <script>
    function checker() {
      var result = confirm('êtes-vous sûre de valider le payement ?');
      if (result == false) {
        event.preventDefault();
      }
    }
  </script>
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
          <li><a class="nav-link scrollto  active" href="profil.php">Listes</a></li>
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
          <h2>Faire un payement</h2>
        </div>

        <form action="" method="post" role="form" class="contenu">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="nom" class="form-control" id="prenom" value="<?php echo $row ['nom']; ?>" readonly/>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="prenom" id="phone" value="<?php echo $row ['prenom']; ?>" readonly/>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="categorie" id="categorie" value="<?php echo $row ['nom_categorie']; ?>" readonly/>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="text" class="form-control" name="grille" id="grille" value="<?php echo $row ['grille']; ?>"readonly/>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="text" class="form-control" name="profil" id="profil" value="<?php echo $row ['profil']; ?>" readonly/>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="text" class="form-control" name="montant" id="output" value="<?php echo $calcul; ?>" readonly/>
            </div>
          </div>
          <br> 
          <div><button type="submit"  name=""><i class="fa fa-eye"></i></button></div>
          <br> 
          <div class="text-center"><button type="submit" onclick="checker()" name="save">Validé le payement</button></div>
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