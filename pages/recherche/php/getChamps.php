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
    <select id='$name' style='margin-bottom: 20px;' class='form-control selectpicker data show-tick col-xs-12'><option></option>";


    $req2 = $bdd->prepare("SELECT DISTINCT `$name` FROM certificat");
    $req2->execute();

    while ($resultat2 = $req2->fetch()){
      if(($resultat2[$name] != "") && ($resultat2[$name] != "NULL") && ($resultat2[$name] != "0")){
        $stringHtml.= "<option>$resultat2[$name]</option>";
      }
    }

    $req2->closeCursor();

    $stringHtml.= "</select></p>";
  }

}

echo $stringHtml;

$req->closeCursor();
?>
