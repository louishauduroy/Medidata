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
  <link rel="stylesheet" href="../mainpage/accueil.css">

  <script src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="../mainpage/accueil.js"></script>
  <script type="text/javascript" src="gestion.js"></script>

</head>

<header>
  <?php include '../mainpage/menu.php';  ?>
</header>

<body>
  <div style="padding-top: 50px;">

    <div class="container-fluid text-center">
      <div class="row">
        <div style="" class="col-md-6 col-xs-6 bg-lightgrey" id="">
          <div class="jumbotron text-center bg-blue">
            <h1>Sélection des champs</h1>
            <p>Définissez ici les données à récolter auprès des hopitaux.</p>
            <h3 style="margin-top: 60px; color: #A4A3A3; margin-bottom: 30px; font-size: 35px;">Champs existants</h3>
            <div id="liste"></div>
          </div>
        </div>


        <div  style="margin-bottom: 80px; position: fixed; left: 50%" class="wrap-login col-md-offset-1 col-md-4 col-xs-4 col-xs-offset-1">
          <div class="row">
            <div class="col-md-12" id="">
              <h3 style="color: #00C4E1; margin-bottom: 20px;">Ajouter un champ</h3>
              <form style="margin-bottom: 30px;">
                <div class="form-group">
                  <label for="name">Nom du champ:</label>
                  <input type="text" class="form-control" id="nameAdd" placeholder="Entrer un champ">
                  <select style='margin-top: 10px; margin-bottom: 3%;' class="selectpicker show-tick col-xs-12">
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
                <p style="text-align: center; color: red;" class="add_message"></p>
                <button style="margin: 0;" type="button" class="btn btn-default" id="btn-add">Ajouter</button>
              </form>
            </div>
          </div>
          <div class="row">
          <div class="col-md-12" id="">
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
  </div>
</body>

</html>
