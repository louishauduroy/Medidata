<?php
include "../../../phpBDD/connexionBDD.php";

$req = $bdd->prepare('SELECT * FROM champs');
$req->execute();

$stringHtml= "<select class='selectpicker show-tick'>";

while ($resultat = $req->fetch())
{
	$name=$resultat['name'];
	$stringHtml.= "<option>$name</option>";
}

$stringHtml.= "</select>";

echo $stringHtml;

$req->closeCursor();
?>
