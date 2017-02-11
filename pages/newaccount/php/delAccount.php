<?php
if(isset($_POST["email1"]) && isset($_POST["email2"]) && isset($_POST["email_admin"]) && isset($_POST["mdp_admin"])) {
  include '../../../phpBDD/connexionBDD.php';

  // Hachage du mot de passe
  $email1 = $_POST["email1"];
  $email2 = $_POST["email2"];
  $email_admin = $_POST["email_admin"];
  $mdp_admin = sha1($_POST["mdp_admin"]);

  if($email1 == $email2){
    $req3 = $bdd->prepare("SELECT type FROM utilisateurs WHERE email= :email");
    $req3->execute(array(
      'email' => $email1));

    $resultat3 = $req3->fetch();

    if($resultat3){
      if ($resultat3['type'] == "admin"){
        echo 'Impossible de supprimer un compte administrateur';
      }
      else {
        // Vérification des identifiants
        $req = $bdd->prepare("SELECT id, email FROM utilisateurs WHERE email= :email AND type='admin'");
        $req->execute(array(
          "email" => $email_admin));

        $resultat = $req->fetch();

        if ($resultat)
        {
          session_start();
          if($resultat['email'] == $_SESSION['email']){
            $req2 = $bdd->prepare("SELECT id FROM utilisateurs WHERE email= :email AND mdp= :mdp");
            $req2->execute(array(
              "email" => $email_admin,
              "mdp" => $mdp_admin));

            $resultat2 = $req2->fetch();

            if($resultat2){
              $req4 = $bdd->prepare('DELETE FROM utilisateurs WHERE email = :email');
              $req4->execute(array(
                "email" => $email1));
              echo 'Suppression réussi';
            }
            else { echo "Mauvais mot de passe"; }
            $req2->closeCursor();
          }
          else { echo 'Connectez-vous sous votre session pour faire cette suppression'; }

        } else { echo "Vous n'êtes pas administrateur"; }
        $req->closeCursor();

      }
    }
    else { echo 'Compte inconnu'; }

    $req3->closeCursor();
  }
  else { echo 'Confirmez le même email';}

} else { echo 'failed'; }
?>
