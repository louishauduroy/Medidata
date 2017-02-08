<?php
session_start();
if (!isset($_SESSION['username'])){
  ?>
    <script> window.location.replace('../login/login.php') </script>
  <?php
}
?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Medidata</title>

  <link rel="stylesheet" href="../../jquery_bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../common/menu.css">
  <link rel="stylesheet" href="accueil.css">

  <script type="text/javascript" src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="../common/menu.js"></script>

</head>

<header>
  <?php include '../common/menu.php';  ?>
</header>

<body>
  <div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2">
    <img class="logo" src="../../img/logo.png" alt="">
  </div>
  <div class="col-md-12 col-xs-12 col-sm-12">
    <h3>Medidata est un outil développé par 4 étudiants ingénieurs de l'ECE Paris.
      Il permet de centraliser les données des centres hospitaliers vers les Agences Régionales de Santé (ARS).</h3>
  </div>
</body>

</html>
