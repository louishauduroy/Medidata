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
  <link rel="stylesheet" href="recherche.css">
  <link rel="stylesheet" href="../../jquery_bootstrap/jquery.timepicker.css">

  <script src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="../mainpage/accueil.js"></script>
  <script type="text/javascript" src="recherche.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/jquery.timepicker.min.js"></script>

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
          <li><a style="color: #ffffff;" href="../stats/stats.php">Statistiques</a></li>
          <li><a style="color: #ffffff;" href="../gestion/gestion.php">Gestion Champs</a></li>
          <li><a style="color: #ffffff;" href="#">Recherche</a></li>
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

  <div style="padding-top: 50px;" id="wrapper">

    <div id="sidebar-wrapper">
      <button style='' type='button' id='searchbutton' class='btn btn-warning btn-lg btn-block'>SEARCH</button>
      <ul style="margin-top: 50px; padding-bottom: 100px;" class="sidebar-nav"></ul>
    </div>

    <div class="jumbotron text-center bg-blue">
      <h1 style="">Recherche dans la base de données</h1>
      <a href="#menu-toggle" style="margin: 0;" class="btn btn-default btn-lg" id="menu-toggle">Critères de recherche</a>
    </div>

    <div id="page-content-wrapper" style="margin-top: 20%;">
      <div class="col-lg-12" id="div-tab">
        <div style="margin-right: 3%;" style="" id="zone_resultats"></div>
      </div>
    </div>

  </div>

</body>

</html>
