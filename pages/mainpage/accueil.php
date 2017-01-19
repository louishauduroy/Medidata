<!DOCTYPE html>

<html>

<?php
session_start();
if (!isset($_SESSION['username'])){
  ?>
    <script> window.location.replace('../login/login.php') </script>
  <?php
}
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Medidata</title>

  <link rel="stylesheet" href="../../jquery_bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../login/login.css">
  <link rel="stylesheet" href="accueil.css">

  <script src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="accueil.js"></script>

</head>

<header>
  <div class="navbar navbar-default navbar-static-top">
    <div class="container">
      <a href="#" style="color: #ffffff;" class="navbar-brand">MEDIDATA</a>
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse" name="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse navHeaderCollapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a style="color: #ffffff;" href="../gestion/gestion.php">Gestion Champs</a></li>
          <li><a style="color: #ffffff;" href="">Recherche</a></li>
          <li class="dropdown">
            <a style="color: #ffffff;" href="#" class="username dropdown-toggle" data-toggle="dropdown">name <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a style="color: #00C4E1;" href="../compte/compte.php">Compte</a></li>
              <li><a class="logout" style="color: #00C4E1;" href="">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>

<body>
  <div class="row">
    <div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2">
      <img class="logo" src="../../img/logo.png" alt="">
    </div>
  </div>
  <h3 style="text-align: center; color: #A4A3A3; margin-top: 50px;">Medidata est un outil dévellopé par 4 étudiants ingénieurs de l'ECE Paris.
    Il permet de centraliser les données des centres hospitaliers vers les Agences Régionales de Santé (ARS).</h3>
</body>

</html>
