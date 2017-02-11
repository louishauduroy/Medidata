<?php
session_start();
if (!isset($_SESSION['username'])){
  ?>
    <script> window.location.replace('../login/login.php') </script>
  <?php
}
include '../../phpBDD/userExist.php';
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Medidata</title>

  <link rel="stylesheet" href="../../jquery_bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../common/menu.css">
  <link rel="stylesheet" href="compte.css">

  <script type="text/javascript" src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="../common/menu.js"></script>
  <script type="text/javascript" src="compte.js"></script>

</head>

<body>
  <header>
    <?php include '../common/menu.php';  ?>
  </header>

  <main>
    <div>
      <h1>Gestion de compte</h1>
      <div class="wrap-login col-md-10 col-xs-10 col-xs-offset-1 col-md-offset-1">
        <form>
          <h1 class ="titre_login">Changer votre mot de passe :</h1>
          <div class="form-group">
            <label>Email :</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label>Ancien mot de passe :</label>
            <input type="password" class="form-control" id="Amdp" placeholder="Ancien mot de passe">
          </div>
          <div class="form-group">
            <label for="">Nouveau mot de passe :</label>
            <input type="password" class="form-control" id="Nmdp" placeholder="Nouveau mot de passe">
          </div>
          <div class="form-group">
            <label for="">Confirmez :</label>
            <input type="password" class="form-control" id="Nmdp2" placeholder="Nouveau mot de passe">
          </div>
          <p class="mdp_message"></p>
          <button type="button" class="btn-mdp btn btn-default btn-lg btn-block" name="button">VALIDEZ</button>
        </form>
      </div>

      <div class="wrap-login col-md-10 col-xs-10 col-xs-offset-1 col-md-offset-1">
        <form>
          <h1 class ="titre_login">Changer votre email :</h1>
          <div class="form-group">
            <label for="">Ancien email :</label>
            <input type="email" class="form-control" id="Aemail" placeholder="Ancien Email">
          </div>
          <div class="form-group">
            <label for="">Nouvel email :</label>
            <input type="email" class="form-control" id="Nemail" placeholder="Nouveau Email">
          </div>
          <div class="form-group">
            <label for="">Mot de passe :</label>
            <input type="password" class="form-control" id="mdp" placeholder="Mot de passe">
          </div>
          <p class="email_message"></p>
          <button type="button" class="btn-email btn btn-default btn-lg btn-block" name="button">VALIDEZ</button>
        </form>
      </div>

      <div class="wrap-login col-md-10 col-xs-10 col-xs-offset-1 col-md-offset-1">
        <form>
          <h1 class ="titre_login">Changer votre username :</h1>
          <div class="form-group">
            <label for="">Email :</label>
            <input type="email" class="form-control" id="email2" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="">Nouveau username :</label>
            <input type="text" class="form-control" id="username2" placeholder="Username">
          </div>
          <div class="form-group">
            <label for="">Mot de passe :</label>
            <input type="password" class="form-control" id="mdp2" placeholder="Mot de passe">
          </div>
          <p class="username_message"></p>
          <button type="button" class="btn-username btn btn-default btn-lg btn-block" name="button">VALIDEZ</button>
        </form>
      </div>
    </div>
  </main>

</body>

</html>
