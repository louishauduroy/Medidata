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
          <li><a style="color: #ffffff;" href="#">Recherche</a></li>
          <li class="dropdown">
            <a style="color: #ffffff;" href="#" class="username dropdown-toggle" data-toggle="dropdown">name <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a style="color: #00C4E1;" href="#">Compte</a></li>
              <li><a class="logout" style="color: #00C4E1;" href="">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>

<body>
  <h1 style="text-align: center; font-size: 60px; color: #A4A3A3; margin-top: 50px; margin-bottom: 30px;">Gestion de compte</h1>
  <div class="wrap-login col-md-10 col-xs-10 col-xs-offset-1 col-md-offset-1">
    <form>
      <h1 class ="titre_login">Changer votre mot de passe :</h1>
      <div class="form-group">
        <label for="">Email :</label>
        <input type="email" class="form-control" id="email" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="">Ancien mot de passe :</label>
        <input type="password" class="form-control" id="Amdp" placeholder="Ancien Password">
      </div>
      <div class="form-group">
        <label for="">Nouveau mot de passe :</label>
        <input type="password" class="form-control" id="Nmdp" placeholder="Nouveau Password">
      </div>
      <div class="form-group">
        <label for="">Confirm :</label>
        <input type="password" class="form-control" id="Nmdp2" placeholder="Nouveau Password">
      </div>
      <p class="mdp_message"></p>
      <button type="button" class="btn-mdp btn btn-default btn-lg btn-block" name="button">SUBMIT</button>
    </form>
  </div>

  <div style="margin-top: 70px;" class="wrap-login col-md-10 col-xs-10 col-xs-offset-1 col-md-offset-1">
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
        <input type="password" class="form-control" id="mdp" placeholder="Password">
      </div>
      <p class="email_message"></p>
      <button type="button" class="btn-email btn btn-default btn-lg btn-block" name="button">SUBMIT</button>
    </form>
  </div>

  <div style="margin-top: 70px; margin-bottom: 70px;" class="wrap-login col-md-10 col-xs-10 col-xs-offset-1 col-md-offset-1">
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
        <input type="password" class="form-control" id="mdp2" placeholder="Password">
      </div>
      <p class="email_message"></p>
      <button type="button" class="btn-username btn btn-default btn-lg btn-block" name="button">SUBMIT</button>
    </form>
  </div>

</body>

</html>
