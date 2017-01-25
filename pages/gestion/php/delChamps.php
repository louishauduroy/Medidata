<?php
if(isset($_POST["champs"])) {
	$champs=$_POST["champs"];
	if($champs == 'id_patient' || $champs == 'departement' || $champs == 'commune_deces' || $champs == 'code_postal' || $champs == 'nom' || $champs == 'prenoms'
 	|| $champs == 'date_naissance' || $champs == 'sexe' || $champs == 'domicile' || $champs == 'date_deces' || $champs == 'heure_deces' || $champs == 'obstacle_medico_legal'
	|| $champs == 'cercueil_hermetique' || $champs == 'recherche_cause' || $champs == 'cercueil_simple' || $champs == 'don_corps' || $champs == 'pile_prothese'
	|| $champs == 'nom_medecin' || $champs == 'prenom_medecin' || $champs == 'maladies_a' || $champs == 'intervalle_a' || $champs == 'maladies_b' || $champs == 'intervalle_b'
	|| $champs == 'maladies_c' || $champs == 'intervalle_c' || $champs == 'maladies_d' || $champs == 'intervalle_d' || $champs == 'autres_contributions'
	|| $champs == 'intervalle_autres' || $champs == 'grossesse' || $champs == 'fin_grossesse_mois' || $champs == 'fin_grossesse_jours' || $champs == 'lieu_accident'
	|| $champs == 'accident_travail' || $champs == 'autopsie' || $champs == 'lieu_deces' || $champs == 'mise_biere'){
		echo 'Impossible de supprimer ce champ';
	}
	else {
		include "../../../phpBDD/connexionBDD.php";

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
	    echo 'Champ supprimé !';
	  }
	  $req->closeCursor();
	}
} else { echo 'entrez les info'; }
?>
