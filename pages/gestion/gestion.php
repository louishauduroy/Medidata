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
  <link rel="icon" href="../../img/logo2.png">

  <link rel="stylesheet" href="../../jquery_bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../common/menu.css">
  <link rel="stylesheet" href="gestion.css">

  <script type="text/javascript" src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="../common/menu.js"></script>
  <script type="text/javascript" src="gestion.js"></script>

</head>

<body>

  <header>
    <?php include '../common/menu.php';  ?>
  </header>

  <main>
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-6 col-sm-6 bg-lightgrey" id="">
          <div class="jumbotron text-center bg-blue">
            <h1>Sélection des champs</h1>
            <p>Définissez ici les données à récolter auprès des hopitaux.</p>
            <h3>Champs existants</h3>
            <div id="liste"></div>
          </div>
        </div>


        <div class="wrap-login text-center col-md-5 col-sm-5">

          <div class="row">
            <div class="col-md-12">
              <h3>Ajouter un champ</h3>
              <form>
                <div class="form-group">
                  <label for="name">Nom du champ:</label>
                  <input type="text" class="form-control" id="nameAdd" placeholder="Entrer un champ">
                  <select class="selectpicker show-tick col-xs-12">
                      <optgroup label="VARCHAR">
                        <option>VARCHAR(11)</option>
                        <option>VARCHAR(100)</option>
                        <option>VARCHAR(255)</option>
                      </optgroup>
                      <option>DATE</option>
                      <option>TIME</option>
                      <optgroup label="INT">
                        <option>INT(11)</option>
                        <option>INT(100)</option>
                      </optgroup>
                  </select>
                </div>
                <p class="add_message"></p>
                <button type="button" class="btn btn-default" id="btn-add">Ajouter</button>
              </form>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12" id="">
              <h3>Supprimer un champ</h3>
              <form>
                <div class="form-group">
                  <label for="name">Nom du champ:</label>
                  <input type="text" class="form-control" id="nameDel" placeholder="Entrer un champ">
                </div>
                <p class="del_message"></p>
                <button type="button" class="btn btn-default" id="btn-del">Supprimer</button>
              </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </main>

</body>

</html>
