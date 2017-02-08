<?php
$dcdHier=0;

$stringQuery="SELECT * FROM certificat WHERE date_deces=CURDATE()-1";

include "../../../phpBDD/connexionBDD.php";
// Check connection
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$reponse = $bdd->query($stringQuery);

while ($donnees = $reponse->fetch()){
	$dcdHier++;
}

echo "$dcdHier";
?>
