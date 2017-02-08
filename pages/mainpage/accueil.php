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
  <link rel="stylesheet" href="../login/login.css">
  <link rel="stylesheet" href="accueil.css">

  <script src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="accueil.js"></script>

</head>

<header>
  <?php include 'menu.php';  ?>
</header>

<body>
  <div style="margin-top: 30px;" class="row">
    <div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2">
      <img class="logo" src="../../img/logo.png" alt="">
    </div>
  </div>
  <h3 style="text-align: center; color: #A4A3A3; margin-top: 50px;">Medidata est un outil développé par 4 étudiants ingénieurs de l'ECE Paris.
    Il permet de centraliser les données des centres hospitaliers vers les Agences Régionales de Santé (ARS).</h3>
</body>

</html>
