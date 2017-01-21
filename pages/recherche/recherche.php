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

  <script src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="../mainpage/accueil.js"></script>
  <script type="text/javascript" src="recherche.js"></script>

</head>

<header>
  <div class="navbar navbar-default navbar-static-top">
    <div class="container">
      <a href="../mainpage/accueil.php" style="color: #ffffff;" class="navbar-brand">MEDIDATA</a>
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse" name="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse navHeaderCollapse">
        <ul class="nav navbar-nav navbar-right">
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

  <div id="wrapper">

      <div class="col-lg-3">
        <?php include "getChamps.php"; ?>
      </div>
      <!-- /#sidebar-wrapper -->
      <!-- Page Content -->
      <div id="col-lg-11">
          <div class="">
              <div class="row">
                  <div class="">
                      <h1>Recherches sur la base de donnée</h1>

                      <div id="zone_resultats">


                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

</body>

</html>