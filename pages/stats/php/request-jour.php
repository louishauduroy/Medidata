<?php
$avecdate=0;

if(isset($_GET['avecdate']))
{
	$avecdate=1;
}
$tabReponse=array();


$tabReponse=array();
//récupération données des 7 derniers jours

for ($i=0;$i<7;$i++){

	$dcdAjd=0;
	$date = date('Ymd', strtotime("-$i day"));
	$stringQuery="SELECT * FROM certificat WHERE date_deces='$date'";

	include "../../../phpBDD/connexionBDD.php";

	$reponse = $bdd->query($stringQuery);

	while ($donnees = $reponse->fetch())
	{
		$dcdAjd++;
	}

	if($avecdate==1)
	{
		$tabReponse[$i][0]=date ("Y-m-d", mktime(0,0,0,date("m"),date("d")-$i,date("Y")));
		$tabReponse[$i][1]=$dcdAjd;
	}else $tabReponse[$i]=$dcdAjd;

}

echo json_encode( $tabReponse );

?>
