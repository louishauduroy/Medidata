<?php

session_start();

if (isset($_SESSION['username'])){
  include 'connexionBDD.php';
  $name = $_SESSION['username'];
  $requete = "SELECT type FROM utilisateurs WHERE name = '$name'";

  $req = $bdd->prepare($requete);
  $req->execute();
  $resultat = $req->fetch();

  echo $resultat[0];
}
else {
  echo 'pas connecté';
}

 ?>
