<!DOCTYPE html>

<?php
session_start();
if (!isset($_SESSION['username'])){
  ?>
    <script> window.location.replace('../login/login.php') </script>
  <?php
}
else {
  include '../../phpBDD/connexionBDD.php';
  $email = $_SESSION['email'];
  $requete = "SELECT type FROM utilisateurs WHERE email = '$email'";

  $req = $bdd->prepare($requete);
  $req->execute();
  $resultat = $req->fetch();
  if($resultat){
    if($resultat['type'] != 'admin'){
      ?>
        <script> window.location.replace('../mainpage/accueil.php') </script>
      <?php
    }
  }
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
  <link rel="stylesheet" href="createAccount.css">

  <script type="text/javascript" src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="../common/menu.js"></script>
  <script type="text/javascript" src="createAccount.js"></script>


</head>

<body>

  <header>
    <?php include '../common/menu.php'; ?>
  </header>

  <main>
    <div class="col-md-3">
      <ul class="nav nav-stacked">
        <li class="active">
          <a data-toggle="tab" href="#utilisateurs">Utilisateurs</a>
        </li>
        <li>
          <a data-toggle="tab" href="#newaccount">Créer Compte</a>
        </li>
        <li>
          <a data-toggle="tab" href="#delaccount">Supprimer Compte</a>
        </li>
      </ul>
    </div>

    <!-- Tab panes -->
    <div class="tab-content col-md-9">

      <div class="tab-pane active" id="utilisateurs" role="tabpanel">
        <div class="utilisateurs wrap-login">
          <table class="table table-hover">
            <thead class="head">
              <tr>
                <th>Email</th>
                <th class='hidden-xs'>Username</th>
                <th class='hidden-xs'>Date Inscription</th>
                <th>Type</th>
              </tr>
            </thead>
            <tbody id="maj_user">
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-pane" id="newaccount" role="tabpanel">
        <div class="newaccount">
            <div class="wrap-login col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
              <form>
                <h1 class ="titre_login">Créer un compte Medidata</h1>
                <div class="form-group">
                  <label>Addresse Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label>Mot de passe</label>
                  <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                  <label>Confirmez</label>
                  <input type="password" class="form-control" id="password2" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Username">
                </div>
                <p class="login_message"></p>
                <button type="button" class="btn-new btn-login btn btn-default btn-lg btn-block" name="button">CRÉER</button>
              </form>

            </div>
        </div>
      </div>

      <div class="tab-pane" id="delaccount" role="tabpanel">
        <div class="delwaccount">
            <div class="wrap-login col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
              <form>
                <h1 class ="titre_login">Supprimer un compte Medidata</h1>
                <div class="form-group">
                  <label>Addresse Email à supprimer</label>
                  <input type="email" class="form-control" id="email_supp1" placeholder="Email">
                </div>
                <div class="form-group">
                  <label>Confirmez email</label>
                  <input type="email" class="form-control" id="email_supp2" placeholder="Email">
                </div>
                <div class="form-group">
                  <label>Addresse Email administrateur</label>
                  <input type="email" class="form-control" id="email_supp_admin" placeholder="Email">
                </div>
                <div class="form-group">
                  <label>Mot de passe administrateur</label>
                  <input type="password" class="form-control" id="password_supp" placeholder="Mot de passe">
                </div>
                <p class="del_message"></p>
                <button type="button" class="btn-del btn-login btn btn-default btn-lg btn-block" name="button">SUPPRIMER</button>
              </form>

            </div>
        </div>
      </div>

    </div>

  </main>

</body>

</html>
