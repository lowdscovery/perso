<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=miniprojet', 'root', '');
  $fichier = "";
  if (isset($_GET['id']) AND $_GET['id'] > 0) 
{
  $getid = intval($_GET['id']);
  $requser = $bdd->prepare("SELECT * FROM personnel_central WHERE id = ? ");
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();

  if (isset($_POST['insertion'])) 
  {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateNaissance = $_POST['dateNaissance'];
    $sexe = $_POST['sexe'];
    $nationalite = $_POST['nationalite'];
    $cin = $_POST['cin'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $situation = $_POST['situation'];
    $nombre = $_POST['nombre'];
    $diplome = $_POST['diplome'];
    $categorie = $_POST['categorie'];
    $categorie = $_POST['categorie'];
    $classe = $_POST['classe'];
    $echelon = $_POST['echelon'];
    $photo = $_FILES['photo']['name'];
    $fichier = $_FILES['photo']['name'];

    $upload = "img/".$fichier;

    move_uploaded_file($_FILES['photo']['tmp_name'], $upload);


    $sql = $bdd->prepare("UPDATE personnel_central SET nom='$nom',prenom='$prenom',dateNaissance='$dateNaissance',sexe='$sexe',nationalite='$nationalite',cin='$cin',adresse='$adresse',telephone='$telephone',mail='$email',situation='$situation',nombre='$nombre',categorie='$categorie',classe='$classe',photo='$photo',echelon='$echelon' WHERE id = ? ");
    $sql->execute(array($getid));
    if ($sql->execute(array($getid))) 
    {
      echo '<script type="text/javascript"> alert("Modification réussi") </script>';
      header("Location: liste_central.php");
    }
    else{
      echo '<script type="text/javascript"> alert("Erreur de modification") </script>';
    }
  }
  }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Modifier</title>
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

  <link href="style.css" rel="stylesheet">
<script>
  function random()
  {
    var a=document.getElementById('input').value;
    if (a==="CAT_1") 
    {
      var array=["Employe"];
    }
    else if (a==="CAT_2")
    {
      var array=["Assistant"];
    }
    else if (a==="CAT_3")
    {
      var array=["Adjoint"];
    }
    else
    {
      var array=[];
    }
    var string="";
    for (i = 0; i < array.length; i++) 
    {
      string=string+"<option>"+array[i]+"</option>";
    }
    string="<select>"+string+"</select>";
    document.getElementById('classe').innerHTML=string;
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

      <h1 class="logo me-auto"><a href="index.php">Gestion du personnel</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="inscription_central.php">Inscription</a></li>
          <li><a class="nav-link scrollto" href="liste_central.php">Liste</a></li>
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
          <h2>Modification information central</h2>
        </div>
        <form  method="POST" action="" enctype="multipart/form-data" class="contenu">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="nom" class="form-control" value="<?php echo $userinfo ['nom']; ?>"  required pattern="[A-Z]+" title="Le nom doit être en majuscule" />
            </div>
            <div class="col-md-4 form-group">
              <input type="text" name="prenom" class="form-control" value="<?php echo $userinfo ['prenom']; ?>" required pattern="[A-Z][a-z]*\s*[A-Z]*[a-z]*\s*[A-Z]*[a-z]*" title="La première lettre du prenom doit être en majuscule" />
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="date" class="form-control" name="dateNaissance" value="<?php echo $userinfo ['dateNaissance']; ?>" title="Date de naissance" required/>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4 form-group mt-3">
              <select name="sexe" id="sexe" class="form-select" title="Selectionné une sexe" required>
                <option value="<?php echo $userinfo ['sexe']; ?>"><?php echo $userinfo ['sexe']; ?></option>
                <option value="Masculin">Masculin</option>
                <option value="Feminin ">Féminin</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="nationalite" id="department" class="form-select" title="Selectionné un nationalité" required>
                <option value="<?php echo $userinfo ['nationalite']; ?>"><?php echo $userinfo ['nationalite']; ?></option>
                <option value="Malagasy">Malagasy</option>
                <option value="Etranger ">Etranger</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="tel" class="form-control" name="cin" value="<?php echo $userinfo ['cin']; ?>" required pattern="\d{12}" title="Le numero de la CIN doit être composer de 12 chiffres"/>
            </div>
            </div>
            <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="text" class="form-control" name="adresse" value="<?php echo $userinfo ['adresse']; ?>" title="Saisissez une adresse" required/>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="text" class="form-control" name="telephone" value="<?php echo $userinfo ['telephone']; ?>" required pattern="\d{10}" title="Le numero telephone doit être composé de 10 chiffres"/>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="email" class="form-control" name="email" value="<?php echo $userinfo ['mail']; ?>" required/>
            </div>
            </div>
            <div class="row">
            <div class="col-md-4 form-group mt-3">
              <select name="situation" id="situation" title="Selectionné une situation familiale" class="form-select" required>
                <option value="<?php echo $userinfo ['situation']; ?>"><?php echo $userinfo ['situation']; ?></option>
                <option value="celibataire">Célibataire</option>
                <option value="marié">Marié</option>
                <option value="autres">Autres</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="number" class="form-control" name="nombre" value="<?php echo $userinfo ['nombre']; ?>" title="Nombre d'enfant" required/>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="categorie" id="input" onchange="random()" title="Selectionné un categorie" class="form-select" required>
                <option value="<?php echo $userinfo ['categorie']; ?>"><?php echo $userinfo ['categorie']; ?></option>
                <option value="CAT_1">CAT I</option>
                <option value="CAT_2">CAT II</option>
                <option value="CAT_3">CAT III</option>
                <option value="CAT_4">CAT IV</option>
                <option value="CAT_5">CAT V</option>
                <option value="CAT_6">CAT VI</option>
                <option value="CAT_7">CAT VII</option>
                <option value="CAT_8">CAT VIII</option>
              </select>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4 form-group mt-3">
              <select name="classe" id="classe" title="Selectionné une Classe" class="form-select" required>
                <option value="<?php echo $userinfo ['classe']; ?>"><?php echo $userinfo ['classe']; ?></option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="echelon" id="echelon" title="Selectionné un echelon" class="form-select">
                <option value="<?php echo $userinfo ['echelon']; ?>"><?php echo $userinfo ['echelon']; ?></option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="file" class="form-control" name="photo" value="<?php echo $userinfo ['photo']; ?>" required/>
            </div>
          </div>
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