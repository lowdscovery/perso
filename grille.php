accueil<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');

$req = $bdd->prepare("SELECT * FROM `categorie` inner JOIN agri_embauche ON categorie.id_categorie = agri_embauche.id_categorie");
$req->execute(array());
$req1 = $bdd->prepare("SELECT * FROM `categorie` inner JOIN agri_anciennete ON categorie.id_categorie = agri_anciennete.id_categorie");
$req1->execute(array());
$req2 = $bdd->prepare("SELECT * FROM `categorie` inner JOIN non_agri_embauche ON categorie.id_categorie = non_agri_embauche.id_categorie");
$req2->execute(array());
$req3 = $bdd->prepare("SELECT * FROM `categorie` inner JOIN non_agri_anciennete ON categorie.id_categorie = non_agri_anciennete.id_categorie");
$req3->execute(array());
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Grille</title>
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
          <li class="dropdown"><a href="#">Inscription<i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="inscription.php">Personnel non Agricole</a></li>
              <li><a href="inscription_agricole.php">Personnel Agricole</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="profil.php">Liste</a></li>
          <li><a class="nav-link scrollto" href="indice.php">Indice</a></li>
          <li><a class="nav-link scrollto active" href="grille.php">Grille</a></li>
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
          <h2>Grille des salaires</h2>
        </div>
        
        <form action="" method="post">
        <h6><b>A- SECTEUR NON AGRICOLE</b></h6>
        <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th rowspan="2"><center>Catégorie Professionnelle</center></th>
                        <th colspan="3"><center>Embauche</center></th>
                        <th colspan="3"><center>Ancienneté</center></th>   
                    </tr>
                    <tr>
                        
                        <th><center>indice</center></th>
                        <th><center>Salaire Horaire<br>(en Ariary)</center></th>
                        <th><center>Salaire Mensuel<br>(en Ariary)</center></th>
                        <th><center>indice</center></th>
                        <th><center>Salaire Horaire<br>(en Ariary)</center></th>
                        <th><center>Salaire Mensuel<br>(en Ariary)</center></th>
                    </tr>
                    </thead>
                    <?php while ($row = $req2->fetch() AND $row1 = $req3->fetch()) { ?>
                        <tr>
                            <td><center><?= $row['nom_categorie']?></center></td>
                            <td><center><?= $row['indice']?></center></td>
                            <td><center><?= number_format($row['salaire_horaire'], 2, ',',' ')?></center></td>
                            <td><center><?= number_format($row['salaire_mensuel'], 0, ',',' ')?></center></td>
                            <td><center><?= $row1['indice']?></center></td>
                            <td><center><?= number_format($row1['salaire_horaire'], 2, ',',' ')?></center></td>
                            <td><center><?= number_format($row1['salaire_mensuel'], 0, ',',' ')?></center></td>        
                        </tr>
                     <?php } ?>   
                </table>
                <br>
                <h6><b>B- SECTEUR AGRICOLE</b> </h6>
          <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th rowspan="2"><center>Catégorie Professionnelle</center></th>
                        <th colspan="3"><center>Embauche</center></th>
                        <th colspan="3"><center>Ancienneté</center></th>   
                    </tr>
                    <tr>
                        <th><center>indice</center></th>
                        <th><center>Salaire Horaire<br>(en Ariary)</center></th>
                        <th><center>Salaire Mensuel<br>(en Ariary)</center></th>
                        <th><center>indice</center></th>
                        <th><center>Salaire Horaire<br>(en Ariary)</center></th>
                        <th><center>Salaire Mensuel<br>(en Ariary)</center></th>
                    </tr>
                    </thead>
                    <?php while ($row = $req->fetch() AND $row1 = $req1->fetch()) { ?>
                        <tr>
                            <td><center><?= $row['nom_categorie']?></center></td>
                            <td><center><?= $row['indice']?></center></td>
                            <td><center><?= number_format($row['salaire_horaire'], 2, ',',' ')?></center></td>
                            <td><center><?= number_format($row['salaire_mensuel'], 0, ',',' ')?></center></td>
                            <td><center><?= $row1['indice']?></center></td>
                            <td><center><?= number_format($row1['salaire_horaire'], 2, ',',' ')?></center></td>
                            <td><center><?= number_format($row1['salaire_mensuel'], 0, ',',' ')?></center></td>        
                        </tr>
                     <?php } ?>
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