<?php
include '../../../phpBDD/connexionBDD.php';

$req = $bdd->prepare('SELECT name, email, date_inscription, type FROM utilisateurs');
$req->execute();

while($resultat = $req->fetch()){
  echo "<tr style='color:#A4A3A3;'>
          <td>$resultat[email]</td>
          <td class='hidden-xs'>$resultat[name]</td>
          <td class='hidden-xs'>$resultat[date_inscription]</td>
          <td>$resultat[type]</td>
        </tr>";
}

$req->closeCursor();

?>
