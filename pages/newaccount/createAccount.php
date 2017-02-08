<!DOCTYPE html>

<?php
session_start();
if (!isset($_SESSION['username'])){
  ?>
    <script> window.location.replace('../login/login.php') </script>
  <?php
}
else {
  include '../../phpBDD/connexionBDD.php';
  $name = $_SESSION['username'];
  $requete = "SELECT type FROM utilisateurs WHERE name = '$name'";

  $req = $bdd->prepare($requete);
  $req->execute();
  $resultat = $req->fetch();
  if($resultat[0] != 'admin'){
    ?>
      <script> window.location.replace('../mainpage/accueil.php') </script>
    <?php
  }
}
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Medidata</title>

  <link rel="stylesheet" href="../../jquery_bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../login/login.css">

  <script src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="../mainpage/accueil.js"></script>


</head>

<body>

  <header>
    <?php include '../mainpage/menu.php'; ?>
  </header>

  <main>
    <div style="margin-top:60px;" class="container">
      <div class="row">
        <div style="margin-bottom: 40px;" class="wrap-login col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
          <form>
            <h1 style="color: #A4A3A3;" class ="titre_login">Créer un compte Medidata</h1>
            <div class="form-group">
              <label for="">Addresse Email</label>
              <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="">Mot de passe</label>
              <input type="password" class="form-control" id="password" placeholder="Mot de passe">
            </div>
            <div class="form-group">
              <label for="">Confirmez</label>
              <input type="password" class="form-control" id="password2" placeholder="Mot de passe">
            </div>
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" class="form-control" id="username" placeholder="Username">
            </div>
            <p class="login_message"></p>
            <button type="button" class="btn-login btn btn-default btn-lg btn-block" name="button">CRÉER</button>
          </form>

        </div>
      </div>
    </div>
  </main>

</body>

</html>
