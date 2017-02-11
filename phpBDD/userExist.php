<?php
include 'connexionBDD.php';
session_start();
$email = $_SESSION['email'];
$requete = "SELECT id FROM utilisateurs WHERE email = '$email'";

$req = $bdd->prepare($requete);
$req->execute();
$resultat = $req->fetch();

if(!$resultat){
  include 'logout.php';
  ?>
  <script> window.location.replace('../login/login.php') </script>
  <?php
}
?>
