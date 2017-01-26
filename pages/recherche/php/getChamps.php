<?php

include "../../../phpBDD/connexionBDD.php";

$req = $bdd->prepare('SELECT * FROM champs');
$req->execute();

$stringHtml= "";

while ($resultat = $req->fetch())
{
  $name=$resultat['name'];
  if (strpos($name, "date") !== false) {
    $stringHtml.= "<p style='color: #ffffff; margin-top: 20px; padding-left: 20px; padding-right: 20px;'>$name
    <input type='date' id='$name' class='form-control data' placeholder='JJ-MM-YYYY'>
    </p>";
  }
  else if (strpos($name, "heure") !== false) {
    $stringHtml.= "<p style='color: #ffffff; margin-top: 20px; padding-left: 20px; padding-right: 20px;'>$name
    <input id='$name' type='text' class='basicExample form-control data time' placeholder='Heure'/>
    <script>
        $(function() {
            $('.basicExample').timepicker( {'timeFormat': 'H:i:s'} );
        });
    </script>
    </p>";
  }
  else {
    $stringHtml.= "<p style='color: #ffffff; margin-top: 20px; padding-left: 20px; padding-right: 20px;'>$name
    <input type='text' id='$name' class='form-control data' placeholder='Enter'>
    </p>";
  }

}

echo $stringHtml;

$req->closeCursor();
?>
