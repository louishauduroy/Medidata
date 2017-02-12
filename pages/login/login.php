<?php
session_start();
if (isset($_SESSION['username'] )){
  ?>
    <script> window.location.replace('../mainpage/accueil.php') </script>
  <?php
}
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Medidata</title>
  <link rel="icon" href="../../img/logo2.png">

  <link rel="stylesheet" href="../../jquery_bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="../common/menu.css">

  <script src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script src="login.js"></script>

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2">
        <img class="logo" src="../../img/logo.png" alt="">
      </div>
    </div>
    <div class="row">
      <div class="wrap-login col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2">
        <form>
          <h1 class ="titre_login">Identification</h1>
          <div class="form-group">
            <label for="">Adresse Email :</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="">Mot de passe :</label>
            <input type="password" class="form-control" id="password" placeholder="Mot de passe">
          </div>
          <p class="login_message"></p>
          <button type="button" class="btn-login btn btn-default btn-lg btn-block" name="button">Se connecter</button>
        </form>

      </div>
    </div>
  </div>

</body>

</html>
