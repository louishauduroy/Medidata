<?php
if(isset($_POST["email"]) && isset($_POST["mdp"]) && isset($_POST["username"])) {
  include '../../phpBDD/connexionBDD.php';

  // Hachage du mot de passe
  $password = sha1($_POST["mdp"]);
  $email = $_POST["email"];
  $name = $_POST["username"];

  // Vérification des identifiants
  $req = $bdd->prepare('SELECT id FROM utilisateurs WHERE email= :email');
  $req->execute(array(
    "email" => $email));

  $resultat = $req->fetch();

  if (!$resultat)
  {
    $req = $bdd->prepare('INSERT INTO utilisateurs(id, name, mdp, email, date_inscription) VALUES(NULL, :name, :mdp, :email, CURDATE())');
    $req->execute(array(
      "name" => $name,
      "mdp" => $password,
      "email" => $email));

    echo 'Creation reussi';
  } else { echo 'Email existe déjà'; }
} else { echo 'failed'; }
?>
