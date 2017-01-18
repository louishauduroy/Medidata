<?php

if(isset($_POST["Nemail"]) && isset($_POST["Aemail"]) && isset($_POST["mdp"])) {
  include 'connexionBDD.php';
  session_start();

  $Nemail = $_POST["Nemail"];
  $Aemail = $_POST["Aemail"];
  $mdp = sha1($_POST["mdp"]);

  // Vérification des identifiants
  $req = $bdd->prepare('SELECT id FROM utilisateurs WHERE email= :email AND mdp= :mdp AND name= :name');
  $req->execute(array(
    "email" => $Aemail,
    "mdp" => $mdp,
    "name" => $_SESSION['username']));

  $resultat = $req->fetch();

  if (!$resultat) { echo 'Mauvais identifiant ou mot de passe ou loggez-vous sur votre session !';}
  else {
    $req2 = $bdd->prepare('SELECT id FROM utilisateurs WHERE email= :email');
    $req2->execute(array(
      "email" => $Nemail));
    $resultat2 = $req2->fetch();

    if(!$resultat2){
      $req3 = $bdd->prepare('UPDATE utilisateurs SET email= :email1 WHERE email= :email2');
      $req3->execute(array(
        "email1" => $Nemail,
        "email2" => $Aemail));
      $req3->closeCursor();
      echo 'Changement email réussi !';
    }
    else { echo 'Cet Email existe déjà !'; }
    $req2->closeCursor();
  }
  $req->closeCursor();
} else { echo 'failed!'; }

?>
