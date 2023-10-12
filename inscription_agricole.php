<?php
require("traiteinscription_agricole.php");
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
  $req = $bdd->query("SELECT * FROM poste");
  $req1 = $bdd->query("SELECT * FROM service");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inscription personnel agricole</title>
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
  <script>
  function random()
  {
    var a=document.getElementById('contrat').value;
    if (a==="CDI") 
    {
      document.getElementById("mois").style.display = "none";
      document.getElementById("fin").style.display = "none";
    }
    else{
      document.getElementById("mois").style.display = "block";
      document.getElementById("fin").style.display = "block";
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
          <li class="dropdown"><a class="nav-link scrollto active" href="#">Inscription<i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="inscription.php">Personnel non Agricole</a></li>
              <li><a href="inscription_agricole.php">Personnel Agricole</a></li>
            </ul>
          </li>
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
          <h2>Inscrire un personnel agricole</h2>
        </div>
        <form  method="POST" action="" enctype="multipart/form-data" class="contenu">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="nom" class="form-control" id="name" placeholder="Nom"  required pattern="[A-Z]+" title="Le nom doit être en majuscule" />
            </div>
            <div class="col-md-4 form-group">
              <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prenom" required pattern="[A-Z][a-z]*\s*[A-Z]*[a-z]*\s*[A-Z]*[a-z]*" title="La première lettre doit être en majuscule" />
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="date" class="form-control" name="dateNaissance" title="Date de naissance" required/>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4 form-group mt-3">
              <select name="sexe" id="sexe" class="form-select" required>
                <option value="">sexe</option>
                <option value="Masculin">Masculin</option>
                <option value="Feminin ">Féminin</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="nationalite" id="department" class="form-select" required>
                <option value="">Nationalité</option>
                <option value="Malagasy">Malagasy</option>
                <option value="Etranger ">Etrangers</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="tel" class="form-control" name="cin" id="phone" placeholder="Cin ou passeport" required pattern="\d{12}" title="Le numero de la CIN doit être composer de 12 chiffres"/>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="text" class="form-control" name="adresse" id="phone" placeholder="Adresse" required/>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="text" class="form-control" name="telephone" id="phone" placeholder="Telephone" required pattern="\d{10}" title="Le numero telephone doit être composé de 10 chiffres"/>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="email" class="form-control" name="email" id="phone" placeholder="Mail" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <select name="situation" id="situation" title="Selectionné une situation familiale" class="form-select" required>
                <option value="">Situation Familiale</option>
                <option value="celibataire">Célibataire</option>
                <option value="marié">Marié</option>
                <option value="autres">Autres</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="number" class="form-control" name="nombre" id="nombre" placeholder="Nombre d'enfant" data-msg="Please enter at least 4 chars" required/>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="diplome" id="diplome" title="Selectionné un diplôme" class="form-select" required>
                <option value="">Diplôme</option>
                <option value="Licence">Licence</option>
                <option value="Master1">Master I</option>
                <option value="Master2">Master II</option>
                <option value="Doctorat">Doctorat</option>
              </select>
            </div>
          </div>
          <div class="row">
             <div class="col-md-4 form-group mt-3">
              <select name="categorie" id="input" title="Selectionné une categorie Professionnelle" class="form-select" required>
                <option value="">Catégorie Professionnelle</option>
                <option value="M1-1A">M1-1A</option>
                <option value="M2-1B">M2-1B</option>
                <option value="OS1-2A">OS1-2A</option>
                <option value="OS2-2B">OS2-2B</option>
                <option value="OS3-3A">OS3-3A</option>
                <option value="OP1A-3B">OP1A-3B</option>
                <option value="OP1B-4A">OP1B-4A</option>
                <option value="OP2A-4B">OP2A-4B</option>
                <option value="OP2B-5A">OP2B-5A</option>
                <option value="OP3-5B">OP23-5B</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="file" class="form-control" name="photo" id="photo" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="poste" id="poste" class="form-select" title="Selectionné une poste" required>
               <option value="">Poste</option>
              <?php while ($user = $req->fetch()) { ?>
                <option value="<?php echo $user ['nom_poste']; ?>"><?php echo $user ['nom_poste']; ?></option>
              <?php } ?>
              </select>
            </div>
          </div>
          <div class="row"> 
            <div class="col-md-4 form-group mt-3">
              <select name="service" id="service" class="form-select" title="Selectionné un service" required>
              <option value="">Service</option>
              <?php while ($user1 = $req1->fetch()) { ?>
                <option value="<?php echo $user1 ['nom_service']; ?>"><?php echo $user1 ['nom_service']; ?></option>
              <?php } ?>
              </select>
            </div>
          </div>
          <br>
          <fieldset>
          <legend class="text-primary"><b>À propos du contrat</b></legend>
           <div class="row">
            <div class="col-md-4 form-group mt-3">
              <select name="contrat" id="contrat" class="form-select" onchange="random()" required>
                <option value="">Contrat</option>
                <option value="CDD">CDD</option>
                <option value="CDI">CDI</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="file" class="form-control" name="fichier_contrat" id="fichier_contrat" title="Selectionné le fichier du contrat" required/>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="date" class="form-control" name="mois" id="mois" title="Date debut du contrat"/>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="date" class="form-control" name="fin" id="fin" title="Date fin du contrat"/>
            </div>
          </div> 
          </fieldset>
          <br>  
          <div class="text-center"><button type="submit"  name="insertion">Enregistrer</button></div>
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