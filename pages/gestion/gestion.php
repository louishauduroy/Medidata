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
  <link rel="stylesheet" href="../mainpage/accueil.css">

  <script src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="../mainpage/accueil.js"></script>
  <script type="text/javascript" src="gestion.js"></script>

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
          <li><a style="color: #ffffff;" href="#">Gestion Champs</a></li>
          <li><a style="color: #ffffff;" href="../recherche/recherche.php">Recherche</a></li>
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

  <body >

  <div class="jumbotron text-center bg-blue">
    <h1>Sélection des champs</h1>
    <p>Définissez ici les données à récolter auprès des hopitaux.</p>
  </div>
  <div class="container-fluid text-center">
    <div class="row">
      <div class="col-md-5 col-xs-6 bg-lightgrey existingData" id="existingData">
        <h3 style="margin-top: 60px; margin-left: 30px; color: #A4A3A3; margin-bottom: 30px; font-size: 35px;">Champs existants</h3>
        <div id="liste">

        </div>
      </div>
      <div  style="margin-bottom: 80px;" class="wrap-login col-md-offset-2 col-md-4 col-xs-6">
        <div class="row">
        <div class="col-md-12 addData" id="addData">
          <h3 style="color: #00C4E1; margin-bottom: 20px;">Ajouter un champ</h3>
          <form style="margin-bottom: 30px;">
            <div class="form-group">
              <label for="name">Nom du champ:</label>
              <input type="text" class="form-control" id="nameAdd" placeholder="Entrer un champ">
            </div>
            <p style="text-align: center; color: red;" class="add_message"></p>
            <button style="margin: 0;" type="button" class="btn btn-default" id="btn-add">Ajouter</button>
          </form>
        </div>
        </div>
        <div class="row">
        <div class="col-md-12 addData" id="delData">
          <h3 style="color: #00C4E1; margin-bottom: 20px;">Supprimer un champ</h3>
          <form>
            <div class="form-group">
              <label for="name">Nom du champ:</label>
              <input type="text" class="form-control" id="nameDel" placeholder="Entrer un champ">
            </div>
            <p style="text-align: center; color: red;" class="del_message"></p>
            <button style="margin: 0;" type="button" class="btn btn-default" id="btn-del">Supprimer</button>
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
</body>

</body>

</html>
