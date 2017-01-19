<?php

include "../../phpBDD/connexionBDD.php";

$req = $bdd->prepare('SELECT * FROM champs');
$req->execute();

$stringHtml= "<button style='margin-bottom: 30px;' type='button' id='searchbutton' class='btn btn-warning btn-lg btn-block'>SEARCH</button>";

while ($resultat = $req->fetch())
{
  $name=$resultat['name'];
  if (strpos($name, 'date') !== false) {
    $stringHtml.= "<p style='color: black; margin-top: 20px; padding-left: 20px; padding-right: 20px;'>$name
    <input type='text' id='$name' class='form-control'placeholder='Enter'>
    </p>";
  }
  else {
    $stringHtml.= "<p style='color: black; margin-top: 20px; padding-left: 20px; padding-right: 20px;'>$name
    <input type='text' id='$name' class='form-control'placeholder='Enter'>
    </p>";
  }

}

echo $stringHtml;

$req->closeCursor();
?>
