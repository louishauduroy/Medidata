<?php 
							$jour_demande=$_GET['jour'];
							
							$tabReponse=array();
							
							//initialisation du tableau
							for ($i=0;$i<6;$i++)
							{
								$tabReponse[$i]=0;
							}
			
							
							
								
							$stringQuery="SELECT date_naissance FROM certificat WHERE date_deces=CURDATE()-$jour_demande";
						

							include "../../../phpBDD/connexionBDD.php";

								
								
								$reponse = $bdd->query($stringQuery);
								
								while ($donnees = $reponse->fetch())
								{
									$date_naissance=$donnees['date_naissance'];
									 
									if($date_naissance>date ("Y-m-d", mktime(0,0,0,date("m"),date("d"),date("Y")-15))){
										$tabReponse[0]++;
									}else if($date_naissance>date ("Y-m-d", mktime(0,0,0,date("m"),date("d"),date("Y")-30))){
										$tabReponse[1]++;
									}else if($date_naissance>date ("Y-m-d", mktime(0,0,0,date("m"),date("d"),date("Y")-45))){
										$tabReponse[2]++;
									}else if($date_naissance>date ("Y-m-d", mktime(0,0,0,date("m"),date("d"),date("Y")-60))){
										$tabReponse[3]++;
									}else if($date_naissance>date ("Y-m-d", mktime(0,0,0,date("m"),date("d"),date("Y")-75))){
										$tabReponse[4]++;
									}else if($date_naissance>date ("Y-m-d", mktime(0,0,0,date("m"),date("d"),date("Y")-150))){
										$tabReponse[5]++;
									}
								}
								
							echo json_encode( $tabReponse );
								
								
					
								
				

					
							
					?>