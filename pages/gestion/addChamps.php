<?php
if(isset($_POST["champs"])) {
	include "../../phpBDD/connexionBDD.php";

	$champs=$_POST["champs"];

  $req = $bdd->prepare("SELECT * FROM champs WHERE name = '$champs'");
  $req->execute();
  $resultat = $req->fetch();

  if(!$resultat){
    $req2 = $bdd->prepare("INSERT INTO champs (id, name) VALUES (NULL, '$champs')");
    $req2->execute();
    $req2->closeCursor();

    $req3 = $bdd->prepare("ALTER TABLE patient1 ADD $champs TEXT NOT NULL");
    $req3->execute();
    $req3->closeCursor();
    echo 'Champs ajouté !';
  } else { echo 'Ce champs existe déja!'; }

  $req->closeCursor();
}
else { echo 'entrez les info'; }


?>
