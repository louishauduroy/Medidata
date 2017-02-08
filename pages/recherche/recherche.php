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
  <link rel="stylesheet" href="../../jquery_bootstrap/jquery.timepicker.css">
  <link rel="stylesheet" href="../common/menu.css">
  <link rel="stylesheet" href="recherche.css">

  <script type="text/javascript" src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/jquery.timepicker.min.js"></script>
  <script type="text/javascript" src="../common/menu.js"></script>
  <script type="text/javascript" src="recherche.js"></script>

</head>



<body>
  <header>
    <?php include '../common/menu.php';  ?>
  </header>

  <main>
    <div id="wrapper">

      <div id="sidebar-wrapper">
        <button type='button' id='searchbutton' class='btn btn-warning btn-lg btn-block'>RECHERCHE</button>
        <ul class="sidebar-nav"></ul>
      </div>

      <div class="jumbotron text-center bg-blue">
        <h1>Recherche dans la base de données</h1>
        <a href="#menu-toggle" class="btn btn-default btn-lg" id="menu-toggle">Critères de recherche</a>
      </div>

      <div id="page-content-wrapper">
        <div class="col-lg-12" id="div-tab">
          <div id="zone_resultats"></div>
        </div>
      </div>

    </div>
  </main>

</body>

</html>
