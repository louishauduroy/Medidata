<?php

		include "../../phpBDD/connexionBDD.php";

			$stringQuery="SELECT * FROM patient1"; //construction de la chaine de requète
			$stringHtml=""; //construction du retour html


			$stringHtml.= "<table class=\"resultats text-center table table-hover table-responsive table-striped\" id=\"datatable\">";

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
			for($i=0;$i<sizeof($tabChamps);$i++){
				$stringHtml.= "<th style='text-align: center; background-color: #00C4E1; color: #ffffff;'>$tabChamps[$i]</th>";
			}

			$stringHtml.= "</tr>";

			//pour chaque case (champ) cochée, on met à jour la requète et l'en-tête du tableau



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

				for($i=0;$i<sizeof($tabChamps);$i++){

					$temp=$donnees[$tabChamps[$i]];
					$stringHtml.= "<td>$temp</td>";
				}

				$stringHtml.= "</tr>";

			}

			$stringHtml.= "</table>";


			echo $stringHtml;

		$reponse->closeCursor(); // Termine le traitement de la requête
?>
