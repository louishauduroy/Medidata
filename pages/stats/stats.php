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
  <link rel="stylesheet" href="../login/login.css">
  <link rel="stylesheet" href="../mainpage/accueil.css">
  <link rel="stylesheet" href="stats.css">

  <script src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../jquery_bootstrap/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


  <script type="text/javascript" src="../mainpage/accueil.js"></script>
   <script src="raphael.js"></script>
  <script type="text/javascript" src="stats.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>

</head>

<header>
  <?php include '../mainpage/menu.php';  ?>
</header>

<body >
  <div style="margin-top: 100px;" class="container col-xl-12 col-md-12 col-xs-12">

    <div class="tab-content">
      <div class="container-fluid text-center ">
			<div class="row">
				<div class="col-md-3 box" id="test">
				  <h2>Aujourd'hui</h2>
				  <div id="morts_ajd_nb" class="nb" width="19%" height="150px"></div>
				  <h3>décès</h3>
				   <hr>
				  <h2>Hier</h2>
				  <div id="morts_hier_nb" class="nb" width="19%" height="150px"></div>
				  <h3>décès</h3>
				</div>

				<div class="col-md-9 box">
				  <h3>Par tranches d'âge:</h3>
				  <div id="legende"  class="divInterne" style="height: 50px;"></div>
				  <div  id="bar1"  class="divInterne" style="height: 250px;"></div>
				</div>



			</div>

			<div class="row">


				<div class="col-md-8 box">
				  <h3>Evolution hebdomadaire:</h3>

				  <div  id="semaine" class="divInterne"></div>
				</div>

				<div class="col-md-4 box">
				  <h3>Total semaine:</h3>
				  <div id="total"  class="nb"></div>
				  <h3>décès</h3>
				</div>

			</div>
		</div>
    </div>

  </div>
  <canvas id="myChart"></canvas>
</body>

</html>
