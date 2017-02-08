<?php
$mois_demande=$_GET['mois'];

$avecdate=0;

if(isset($_GET['avecdate']))
{
	$avecdate=1;
}

//récupération données
for($i=0;$i<$mois_demande+1;$i++){

	$dcdMois=0;

	$date=date_parse(date("Y-m-d"));

	$mois=$date['month']-$i;
	$annee=$date['year'];
	if($mois<=0)
	{
		$mois=$mois+12;
		$annee--;
	}

	$stringQuery="SELECT * FROM certificat WHERE EXTRACT(month from date_deces)=$mois AND EXTRACT(year from date_deces)=$annee";

	include "../../../phpBDD/connexionBDD.php";

	$reponse = $bdd->query($stringQuery);

	while ($donnees = $reponse->fetch())
	{
		$dcdMois++;
	}

	if($avecdate==1)
	{
	$tabReponse[$i][0]=$mois.'-'.$annee;
	$tabReponse[$i][1]=$dcdMois;
	}else $tabReponse[$i]=$dcdMois;
}	

echo json_encode( $tabReponse );
?>
