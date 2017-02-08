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
  <?php include '../mainpage/menu.php';  ?>
</header>

<body>

  <div style="padding-top: 50px;" id="wrapper">

    <div id="sidebar-wrapper">
      <button style='' type='button' id='searchbutton' class='btn btn-warning btn-lg btn-block'>RECHERCHE</button>
      <ul style="margin-top: 50px; padding-bottom: 100px;" class="sidebar-nav"></ul>
    </div>

    <div class="jumbotron text-center bg-blue">
      <h1 style="">Recherche dans la base de données</h1>
      <a href="#menu-toggle" style="margin: 0;" class="btn btn-default btn-lg" id="menu-toggle">Critères de recherche</a>
    </div>

    <div id="page-content-wrapper" style="margin-top: 200px;">
      <div class="col-lg-12" id="div-tab">
        <div style="margin-right: 3%;" style="" id="zone_resultats"></div>
      </div>
    </div>

  </div>

</body>

</html>
