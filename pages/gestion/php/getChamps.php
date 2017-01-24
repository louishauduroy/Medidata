<?php

	include "../../../phpBDD/connexionBDD.php";

  $req = $bdd->prepare('SELECT * FROM champs');
  $req->execute();

	$stringHtml= "<p>";

	while ($resultat = $req->fetch())
	{
		$name=$resultat['name'];
		$stringHtml.= "<ul style='color: #00C4E1; margin-right: 40px;'>$name</ul>";
	}

	$stringHtml.= "</p>";

	echo $stringHtml;

	$req->closeCursor();
?>
