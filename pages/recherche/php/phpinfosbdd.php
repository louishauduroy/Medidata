<?php

include "../../../phpBDD/connexionBDD.php";

$stringQuery="SELECT * FROM certificat"; //construction de la chaine de requète
$requete = "SELECT COUNT(*) FROM certificat";

$stringHtml=""; //construction du retour html
$stringHtml.= "<div class='wrap-login'><table class=\"resultats text-center table table-hover table-responsive table-striped\" id=\"datatable\">";
$stringHtml.= "<tr>";

//récupération des noms des champs
$champs = $bdd->query("SELECT * FROM `champs`");

$i=0;//itérateur du tableau de champs
while ($row = $champs->fetch())
{
	$nom=$row['name'];
	$tabChamps[$i]=$nom;
	$i++;
}

//construction de l'en-tête du tableau avec le nom des champs
$stringHtml.= "<th style='text-align: center; background-color: #00C4E1; color: #ffffff; font-size: 15px;'>Certificat</th>";
for($i=0;$i<sizeof($tabChamps);$i++){
	$stringHtml.= "<th style='text-align: center; background-color: #00C4E1; color: #ffffff; font-size: 15px;'>$tabChamps[$i]</th>";
}
$stringHtml.= "</tr>";


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
$stringQuery.=$where;

//on lance la requête
$reponse = $bdd->query($stringQuery);

//on parcours les lignes de la bdd et on affiche les champs
while ($donnees = $reponse->fetch())
{
	$stringHtml.= "<tr>";

	$id=$donnees['id_patient'];
	$stringHtml.= "<td>
										<button style='margin: 0; padding: 0;' type='button' class='btn btn-success btn-lg btn-block'>
											<a href='certificat/setChamps.php?id_patient=$id' target='_blank' id='certif' style='font-size: 15px;'>Certif</a>
										</button>
								</td>";

	for($i=0;$i<sizeof($tabChamps);$i++){
		$temp=$donnees[$tabChamps[$i]];
		$stringHtml.= "<td style='font-size: 15px;'>$temp</td>";
	}
	$stringHtml.= "</tr>";

}

$stringHtml.= "</table></div>";
$reponse->closeCursor(); // Termine le traitement de la requête

echo $stringHtml;

?>
