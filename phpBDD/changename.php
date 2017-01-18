<?php

if(isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["mdp"])) {
  include 'connexionBDD.php';
  session_start();

  $email = $_POST["email"];
  $mdp = sha1($_POST["mdp"]);
  $name = $_POST["name"];

  // Vérification des identifiants
  $req = $bdd->prepare('SELECT id FROM utilisateurs WHERE email= :email AND mdp= :mdp AND name= :name');
  $req->execute(array(
    "email" => $email,
    "mdp" => $mdp,
    "name" => $_SESSION['username']));

  $resultat = $req->fetch();

  if (!$resultat) { echo 'Mauvais identifiant ou mot de passe ou loggez-vous sur votre session !';}
  else {
    $req2 = $bdd->prepare('UPDATE utilisateurs SET name= :name WHERE email= :email');
    $req2->execute(array(
      "name" => $name,
      "email" => $email));
    $_SESSION['username'] = $name;
    echo 'Changement username réussi !';
    $req2->closeCursor();
  }
  $req->closeCursor();

} else { echo 'failed!'; }

?>
