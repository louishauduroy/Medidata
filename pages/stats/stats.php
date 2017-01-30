<?php
session_start();
if (!isset($_SESSION['username'])){
  ?>
    <script> window.location.replace('../login/login.php') </script>
  <?php
}
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Medidata</title>

  <link rel="stylesheet" href="../../jquery_bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../login/login.css">
  <link rel="stylesheet" href="../mainpage/accueil.css">

  <script src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="../mainpage/accueil.js"></script>
  <script type="text/javascript" src="stats.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>

</head>

<header>
  <div class="navbar-fixed-top" style="background-color: #00C4E1;">
    <div class="container">
      <a href="../mainpage/accueil.php" style="color: #ffffff;" class="navbar-brand">MEDIDATA</a>
      <button  style="background-color: white;" class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse" name="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse navHeaderCollapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a style="color: #ffffff;" href="#">Statistiques</a></li>
          <li><a style="color: #ffffff;" href="../gestion/gestion.php">Gestion Champs</a></li>
          <li><a style="color: #ffffff;" href="../recherche/recherche.php">Recherche</a></li>
          <li class="dropdown">
            <a style="color: #ffffff;" href="#" class="username dropdown-toggle" data-toggle="dropdown">name <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a style="color: #00C4E1;" href="../compte/compte.php">Compte</a></li>
              <li><a class="logout" style="color: #00C4E1;" href="">Déconnexion</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>

<body >
  <div style="margin-top: 100px;" class="container col-xl-12 col-md-12 col-xs-12">
    <ul style="margin-bottom: 50px;" class="nav nav-tabs">
      <li>
        <a class="topmenu" href="#graphiques" data-toggle="tab">Grahpiques</a>
      </li>
      <li>
        <a class="topmenu" href="#statistiques" data-toggle="tab">Numériques</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane" id="graphiques">
        <h2>Créer votre graphique:</h2>
        <p>Champs 1:
        <div class="champs">
        </div></p>

        <p>Champs 2:
        <div class="champs">
        </div></p>

        <button type="button" class="btn btn-warning btn-lg" name="button">Créer</button>

      </div>
      <div class="tab-pane" id="statistiques">
        <p>Hello stats</p>
      </div>
    </div>

  </div>
  <canvas id="myChart"></canvas>
</body>

</html>
