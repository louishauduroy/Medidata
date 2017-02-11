<?php

include "../../../phpBDD/connexionBDD.php";

$requete = "SELECT COUNT(*) FROM certificat";

//récupération des noms des champs
$champs = $bdd->query("SELECT * FROM `champs`");

$i=0;//itérateur du tableau de champs
while ($row = $champs->fetch())
{
	$nom=$row['name'];
	$tabChamps[$i]=$nom;
	$i++;
}

$champs->closeCursor();

$where=""; //si on a intégré des critères de recherche (ici des dates)
for($i=0;$i<sizeof($tabChamps);$i++){
	if (isset($_GET[$tabChamps[$i]]))
	{
		if (strlen($where)>0){
			$where.=" AND ";
		}  else $where.=" WHERE ";
		$critere=$_GET[$tabChamps[$i]];
		$where.="$tabChamps[$i]='$critere'";
	}
}
$requete.=$where;

//on lance la requête
$reponse = $bdd->query($requete);

//on parcours les lignes de la bdd et on affiche les champs
while ($donnees = $reponse->fetch())
{
  $retour = "$donnees[0]";
}

$reponse->closeCursor(); // Termine le traitement de la requête

echo $retour;

?>
