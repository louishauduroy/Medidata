<?php
if(isset($_POST["champs"])) {
	include "../../../phpBDD/connexionBDD.php";

	$champs=$_POST["champs"];

  $req = $bdd->prepare("SELECT * FROM champs WHERE name = '$champs'");
  $req->execute();
  $resultat = $req->fetch();

  if(!$resultat){ echo "Ce champs n'existe pas!"; }
  else {
    $req2 = $bdd->prepare("DELETE FROM champs WHERE champs.name = '$champs'");
    $req2->execute();
    $req2->closeCursor();

    $req3 = $bdd->prepare("ALTER TABLE `certificat` DROP COLUMN `$champs`");
    $req3->execute();
    $req3->closeCursor();
    echo 'Champs supprimé !';
  }
  $req->closeCursor();
} else { echo 'entrez les info'; }
?>
