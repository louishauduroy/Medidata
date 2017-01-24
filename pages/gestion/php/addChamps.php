<?php
if(isset($_POST["champs"]) && isset($_POST["type"]) && $_POST["champs"]!="") {
	include "../../../phpBDD/connexionBDD.php";

	$champs=$_POST["champs"];
	$type = $_POST["type"];

  $req = $bdd->prepare("SELECT * FROM champs WHERE name = '$champs'");
  $req->execute();
  $resultat = $req->fetch();

  if(!$resultat){
    $req2 = $bdd->prepare("INSERT INTO champs (id, name) VALUES ('$type', '$champs')");
    $req2->execute();
    $req2->closeCursor();

		if(stripos($type, 'INT') !== FALSE){
			$requete = "ALTER TABLE certificat ADD $champs $type";
		}
		else {
			$requete = "ALTER TABLE certificat ADD $champs $type NOT NULL";
		}
    $req3 = $bdd->prepare($requete);
    $req3->execute();
    $req3->closeCursor();
    echo 'Champs ajouté !';
  } else { echo 'Ce champs existe déja!'; }

  $req->closeCursor();
}
else { echo 'Entrez les info'; }


?>
