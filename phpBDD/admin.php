<?php

session_start();

if (isset($_SESSION['username'])){
  include 'connexionBDD.php';
  $email = $_SESSION['email'];
  $requete = "SELECT type FROM utilisateurs WHERE email = '$email'";

  $req = $bdd->prepare($requete);
  $req->execute();
  $resultat = $req->fetch();

  echo $resultat[0];
}
else {
  echo 'pas connecté';
}

 ?>
