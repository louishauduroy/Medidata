<?php

if(isset($_POST["email"]) && isset($_POST["mdp"])) {
  include 'connexionBDD.php';

  // Hachage du mot de passe
  $password = sha1($_POST["mdp"]);
  $email = $_POST["email"];

  // Vérification des identifiants
  $req = $bdd->prepare('SELECT name FROM utilisateurs WHERE email= :email AND mdp= :mdp');
  $req->execute(array(
    "email" => $email,
    "mdp" => $password));

  $resultat = $req->fetch();

  if (!$resultat) { echo 'Mauvais identifiant ou mot de passe !';}
  else {

      session_start();
      $_SESSION['username'] = $resultat['name'];
      echo 'Vous êtes connecté !';
  }
  $req->closeCursor();
} else { echo 'failed'; }

?>
