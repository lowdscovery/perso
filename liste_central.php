<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');

$articles = $bdd->query('SELECT * FROM personnel_central');

if (isset($_GET['recherche']) AND !empty($_GET['recherche'])) {
    $recherche = htmlspecialchars($_GET['recherche']);
    $articles = $bdd->query('SELECT * FROM personnel_central WHERE nom LIKE "%'.$recherche.'%" OR prenom LIKE "%'.$recherche.'%" OR categorie LIKE "%'.$recherche.'%"');
  }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Liste</title>
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

  <link href="style.css" rel="stylesheet">

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
          <li><a class="nav-link scrollto" href="inscription_central.php">Inscription</a></li>
          <li><a class="nav-link scrollto active" href="liste_central.php">Liste</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="recherche">
        <form action="" method="GET">
        <input type="search" name="recherche" placeholder="Faire une recherche">
        <button type="submit" name="cherche" class="appointment-btn scrollto"><i class="fa fa-search"></i></button>
        </form>
    </div>

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
          <h2>Liste des personnels centrals</h2>
        </div>
        <?php if($articles->rowCount() > 0) { ?>
        <form action="" method="post">
          <table class="table table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Catégorie</th>
                        <th><center>Modifier</center></th>
                        <th><center>Information</center></th>
                       
                    </tr>
                    </thead>
                    <tr>
                        <?php while ($a = $articles->fetch()) { ?>
                        <tr>
                            <td><?= $a['nom']?></td>
                            <td><?= $a['prenom']?></td>
                            <td><?= $a['categorie']?></td>
                            <td><center><a href="modifier_central.php?id=<?= $a['id'] ?>" class="btn btn-outline-success mr-2 mb-2" name="modifier"><i class="fa fa-recycle"></i></a></center></td>  
                            <td><center><a href="information_central.php?id=<?= $a['id'] ?>" class="btn btn-outline-primary mr-2 mb-2" name="enregistre"><i class="fa fa-info"></i></a></center></td>
                               
                        </tr>
                        <?php } ?>  
                        <?php } else { ?>
                    <center>
                       <h4>Aucun Resultat pour : <?= '<font color="red">'.$recherche."</font>"; ?>...</h4> 
                    </center>    
                        
                        <?php } ?>
                    </tr>
                </table>
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