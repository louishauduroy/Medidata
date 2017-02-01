<?php
if(isset($_POST["champs"]) && isset($_POST["type"]) && $_POST["champs"]!="") {
	include "../../../phpBDD/connexionBDD.php";

	$champs=$_POST["champs"];
	$type = $_POST["type"];

  $req = $bdd->prepare("SELECT * FROM champs WHERE name = '$champs'");
  $req->execute();
  $resultat = $req->fetch();

  if(!$resultat){
		if( $type == 'DATE' ){
			if (stripos($champs, 'date') !== FALSE){
				if (stripos($champs, 'heure') !== FALSE) { echo 'Votre champ ne peut contenir le mot "heure"!'; }
				else {
					$req2 = $bdd->prepare("INSERT INTO champs (id, name) VALUES (NULL, '$champs')");
			    $req2->execute();
			    $req2->closeCursor();

					$requete = "ALTER TABLE certificat ADD $champs $type NOT NULL DEFAULT '1900-01-01'";

			    $req3 = $bdd->prepare($requete);
			    $req3->execute();
			    $req3->closeCursor();
					echo 'Champ ajouté !';
				}
			} else { echo 'Votre champ doit comporter le mot "date"!'; }
		}
		else if ( $type == 'TIME' ){
			if (stripos($champs, 'heure') !== FALSE){
				if (stripos($champs, 'date') !== FALSE) { echo 'Votre champ ne peut contenir le mot "date"!'; }
				else {
					$req2 = $bdd->prepare("INSERT INTO champs (id, name) VALUES (NULL, '$champs')");
			    $req2->execute();
			    $req2->closeCursor();

					$requete = "ALTER TABLE certificat ADD $champs $type NOT NULL DEFAULT '00:00:00'";

			    $req3 = $bdd->prepare($requete);
			    $req3->execute();
			    $req3->closeCursor();
					echo 'Champ ajouté !';
				}
			} else { echo 'Votre champ doit comporter le mot "heure"!'; }
		}
    else {
			if (stripos($champs, 'date') !== FALSE){ echo 'Votre champ ne peut comporter le mot "date"!'; }
			else if ( stripos($champs, 'heure') !== FALSE) { echo 'Votre champ ne peut comporter le mot "heure"!'; }
			else {
				$req2 = $bdd->prepare("INSERT INTO champs (id, name) VALUES (NULL, '$champs')");
		    $req2->execute();
		    $req2->closeCursor();

				if(stripos($type, 'INT') !== FALSE){
					$requete = "ALTER TABLE certificat ADD $champs $type NOT NULL DEFAULT 0";
				}
				else {
				//ALTER TABLE `certificat` ADD COLUMN `hello` varchar(36) NOT NULL DEFAULT 'coucou'
					$requete = "ALTER TABLE certificat ADD COLUMN $champs $type NOT NULL DEFAULT ''";
				}
		    $req3 = $bdd->prepare($requete);
		    $req3->execute();
		    $req3->closeCursor();
		    echo 'Champ ajouté !';
			}
		}
  } else { echo 'Ce champ existe déja!'; }
  $req->closeCursor();
} else { echo 'Entrez les info'; }

?>
