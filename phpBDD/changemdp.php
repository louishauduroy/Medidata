<?php

if(isset($_POST["email"]) && isset($_POST["Amdp"]) && isset($_POST["Nmdp"]) && isset($_POST["Nmdp2"])) {
  include 'connexionBDD.php';
  session_start();

  $email = $_POST["email"];
  $Amdp = sha1($_POST["Amdp"]);
  $Nmdp = sha1($_POST["Nmdp"]);
  $Nmdp2 = sha1($_POST["Nmdp2"]);

  if($Nmdp == $Nmdp2){
    // Vérification des identifiants
    $req = $bdd->prepare('SELECT id FROM utilisateurs WHERE email= :email AND mdp= :mdp AND name= :name');
    $req->execute(array(
      "email" => $email,
      "mdp" => $Amdp,
      "name" => $_SESSION['username']));

    $resultat = $req->fetch();

    if (!$resultat) { echo 'Mauvais identifiant ou mot de passe ou loggez-vous sur votre session !';}
    else {
      $req2 = $bdd->prepare('UPDATE utilisateurs SET mdp= :mdp WHERE email= :email');
      $req2->execute(array(
        "mdp" => $Nmdp,
        "email" => $email));
        echo 'Changement mot de passe réussi !';
      $req2->closeCursor();
    }
    $req->closeCursor();
  } else { echo 'Confirme le même mot de passe !'; }
} else { echo 'failed!'; }

?>
