<?php
// la classe de fonctions
require('fpdf/fpdf.php');
// connexion base de données
include "../../../phpBDD/connexionBDD.php";

// classe étendue pour créer en-tête et pied de page
class PDF extends FPDF
{
/*/ en-tête
function Header()
{
    //Police Arial gras 15
    $this->SetFont('Arial','B',14);
    //Décalage à droite
    $this->Cell(80);
    //Titre
    $this->Cell(30,10,'Mon joli fichier PDF',0,0,'C');
    //Saut de ligne
    $this->Ln(20);
}

// pied de page
function Footer()
{
    //Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    //Police Arial italique 8
    $this->SetFont('Arial','I',8);
    //Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}*/
}

function yesOrNo ($answer,$y,$pdf,$xYes,$xNo){
	if($answer=="oui"){
		$pdf->SetXY($xYes,$y);

	}else {
		$pdf->SetXY($xNo,$y);
	}
	$pdf->Write(5,"X");
}



// création du pdf
$pdf=new PDF();
$pdf->SetAuthor('MediData');

$pdf->SetCreator('MediData');
$pdf->AliasNBPages();
$pdf->AddPage();
$pdf->Image('cerfa.jpg',5,0,200);
$id =$_GET['id_patient'];
// requête
//$sql = mysql_query("SELECT * FROM patient1 ORDER BY id_patient",$connexion);
$reponse = $bdd->query("SELECT * FROM certificat WHERE id_patient=$id");
// on boucle
    while ($row = $reponse->fetch()) {

		////////////////////////////////////////////////////////////////////////////
		//////EN TETE: par medecin//////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////

		$pdf->SetTitle("certificat_deces_$id");
		$pdf->SetFont('Arial','',10);

		$pdf->SetXY(16,14);
		$pdf->Write(5,$row["departement"]);

		$pdf->SetXY(20,31);
		$pdf->Write(5,$row["commune_deces"]);

		$x=66;
		for($i=0;$i<5;$i++){
			$x+=4.8;
			$pdf->SetXY($x,35.8);
			$pdf->Write(5,substr($row["code_postal_deces"], $i,1));
		}

    $pdf->SetXY(30,41);
		$pdf->Write(5,$row["nom"]);

		$pdf->SetXY(34,45.5);
		$pdf->Write(5,$row["prenoms"]);

		$pdf->SetXY(45,50);
		$pdf->Write(5,$row["date_naissance"]);

		$pdf->SetXY(80,50);
		$pdf->Write(5,$row["sexe"]);

		$pdf->SetXY(33,55);
		$pdf->Write(5,$row["domicile"]);

		$pdf->SetXY(20,64.5);
		$pdf->Write(5,$row["code_postal_domicile"]);

		$pdf->SetXY(40,64.5);
		$pdf->Write(5,$row["commune_domicile"]);

		$pdf->SetXY(113,31);
		$pdf->Write(5,$row["date_deces"]);

		$pdf->SetXY(149,31);
		$pdf->Write(5,substr($row["heure_deces"], 0,2));

		$pdf->SetXY(162,31);
		$pdf->Write(5,substr($row["heure_deces"], 3,2));

		//$pdf->SetXY(142,31);
		//$pdf->Write(5,$row["commune_deces"]);

		//$pdf->SetXY(164,31);
		//$pdf->Write(5,$row["heure_deces"]);

		$xYes=168;
		$xNo=181;
		$y=34;

		$y+=4;
		yesOrNo($row["obstacle_medico_legal"],$y,$pdf,$xYes,$xNo);

		$y+=4;
		yesOrNo($row["mise_biere"],$y,$pdf,$xYes,$xNo);

		$y+=4;
		yesOrNo($row["cercueil_hermetique"],$y,$pdf,$xYes,$xNo);

		$y+=4;
		yesOrNo($row["cercueil_simple"],$y,$pdf,$xYes,$xNo);

		$y+=4;
		yesOrNo($row["don_corps"],$y,$pdf,$xYes,$xNo);

		$y+=4;
		yesOrNo($row["recherche_cause"],$y,$pdf,$xYes,$xNo);

		$y+=4;
		yesOrNo($row["pile_prothese"],$y,$pdf,$xYes,$xNo);

		$pdf->SetXY(103,69);
		$pdf->Write(5,$row["commune_deces"]);

		$pdf->SetXY(163,69);
		$pdf->Write(5,$row["date_deces"]);

		$sign="Dr ".$row["prenom_medecin"]." ".$row["nom_medecin"];
		$pdf->SetXY(110,80);
		$pdf->Write(5,$sign);


		////////////////////////////////////////////////////////////////////////////
		//////CODE POSTAL / LIEU / DATE/////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////

		$x=15.5;
		for($i=0;$i<5;$i++){
			$x+=4.8;
			$pdf->SetXY($x,122);
			$pdf->Write(5,substr($row["code_postal_deces"], $i,1));
		}

		$x=42;
		for($i=0;$i<13;$i++){
			$x+=4.8;
			$pdf->SetXY($x,122);
			$pdf->Write(5,substr($row["commune_deces"], $i,1));
		}

		$x=137;
		for($i=0;$i<4;$i++){
			$x+=4.8;
			$pdf->SetXY($x,122);
			$pdf->Write(5,substr($row["date_deces"], $i,1));
		}
		$x=124.5;
		for($i=5;$i<7;$i++){
			$x+=4.8;
			$pdf->SetXY($x,122);
			$pdf->Write(5,substr($row["date_deces"], $i,1));
		}
		$x=112;
		for($i=8;$i<10;$i++){
			$x+=4.8;
			$pdf->SetXY($x,122);
			$pdf->Write(5,substr($row["date_deces"], $i,1));
		}

		$x=15.5;
		for($i=0;$i<5;$i++){
			$x+=4.8;
			$pdf->SetXY($x,133);
			$pdf->Write(5,substr($row["code_postal_domicile"], $i,1));
		}

		$x=42;
		for($i=0;$i<13;$i++){
			$x+=4.8;
			$pdf->SetXY($x,133);
			$pdf->Write(5,substr($row["commune_domicile"], $i,1));
		}

		$x=137;
		for($i=0;$i<4;$i++){
			$x+=4.8;
			$pdf->SetXY($x,133);
			$pdf->Write(5,substr($row["date_naissance"], $i,1));
		}
		$x=124.5;
		for($i=5;$i<7;$i++){
			$x+=4.8;
			$pdf->SetXY($x,133);
			$pdf->Write(5,substr($row["date_naissance"], $i,1));
		}
		$x=112;
		for($i=8;$i<10;$i++){
			$x+=4.8;
			$pdf->SetXY($x,133);
			$pdf->Write(5,substr($row["date_naissance"], $i,1));
		}

		if($row["sexe"]=='M'){
			$pdf->SetXY(171,120);
			$pdf->Write(5,"X");
		}
		else if ($row["sexe"]=='F'){
			$pdf->SetXY(171,133);
			$pdf->Write(5,"X");
		}


		////////////////////////////////////////////////////////////////////////////
		//////CAUSE DECES///////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////

		$pdf->SetXY(48,153);
		$pdf->Write(5,$row["maladies_a"]);

		//$pdf->SetXY(161,153);
		if($row["intervalle_a"]=='NULL') $pdf->SetXY(171,153);
		else $pdf->SetXY(161,153);
		$pdf->Write(5,$row["intervalle_a"]);

		$pdf->SetXY(48,161);
		$pdf->Write(5,$row["maladies_b"]);

		//$pdf->SetXY(161,160);
		if($row["intervalle_b"]=='NULL') $pdf->SetXY(171,161);
		else $pdf->SetXY(161,161);
		$pdf->Write(5,$row["intervalle_b"]);

		$pdf->SetXY(48,168);
		$pdf->Write(5,$row["maladies_c"]);

		//$pdf->SetXY(161,167);
		if($row["intervalle_c"]=='NULL') $pdf->SetXY(171,168);
		else $pdf->SetXY(161,168);
		$pdf->Write(5,$row["intervalle_c"]);

		$pdf->SetXY(48,176);
		$pdf->Write(5,$row["maladies_d"]);

		//$pdf->SetXY(161,174);
		if($row["intervalle_d"]=='NULL') $pdf->SetXY(171,176);
		else $pdf->SetXY(161,176);
		$pdf->Write(5,$row["intervalle_d"]);

		$pdf->SetXY(48,188);
		$pdf->Write(5,$row["autres_contributions"]);

		//$pdf->SetXY(161,193);
		if($row["intervalle_autres"]=='NULL') $pdf->SetXY(171,188);
		else $pdf->SetXY(161,188);
		$pdf->Write(5,$row["intervalle_autres"]);

		////////////////////////////////////////////////////////////////////////////
		//////INFO COMPLEMENTAIRES//////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////

		$y=204;
		$xYes=166;
		$xNo=183;
		yesOrNo($row["grossesse"],$y,$pdf,$xYes,$xNo);

		if(strlen($row["fin_grossesse_mois"])>1){
			$pdf->SetXY(98,210);
			$pdf->Write(5,substr($row["fin_grossesse_mois"], 0,1));
			$pdf->SetXY(103,210);
			$pdf->Write(5,substr($row["fin_grossesse_mois"], 1,1));
		}else{
			$pdf->SetXY(98,210);
			$pdf->Write(5,"0");
			$pdf->SetXY(103,210);
			$pdf->Write(5,$row["fin_grossesse_mois"]);
		}

		if(strlen($row["fin_grossesse_jours"])>1){
			$pdf->SetXY(122,210);
			$pdf->Write(5,substr($row["fin_grossesse_jours"], 0,1));
			$pdf->SetXY(127,210);
			$pdf->Write(5,substr($row["fin_grossesse_jours"], 1,1));
		}else{
			$pdf->SetXY(122,210);
			$pdf->Write(5,"0");
			$pdf->SetXY(127,210);
			$pdf->Write(5,$row["fin_grossesse_jours"]);
		}

		$pdf->SetXY(21,222);
		$pdf->Write(5,$row["lieu_accident"]);

		if($row["accident_travail"]=="oui"){
			$pdf->SetXY(137,222);
			$pdf->Write(5,"X");
		}else if($row["accident_travail"]=="non"){
			$pdf->SetXY(154,222);
			$pdf->Write(5,"X");
		}else if($row["accident_travail"]=="sans precision"){
			$pdf->SetXY(171,222);
			$pdf->Write(5,"X");
		}

		if($row["autopsie"]=="oui, resultat disponible"){
			$pdf->SetXY(41,234);
			$pdf->Write(5,"X");
		}else if($row["autopsie"]=="non"){
			$pdf->SetXY(24,234);
			$pdf->Write(5,"X");
		}else{
			$pdf->SetXY(24,240);
			$pdf->Write(5,"X");
		}

		switch($row["lieu_deces"]){
			case "domicile":
			$pdf->SetXY(97,234);
			$pdf->Write(5,"X");
			break;

			case "hopital":
			$pdf->SetXY(141,234);
			$pdf->Write(5,"X");
			break;

			case "clinique privee":
			$pdf->SetXY(170,234);
			$pdf->Write(5,"X");
			break;

			case "hospice":
			$pdf->SetXY(97,240);
			$pdf->Write(5,"X");
			break;

			case "voie publique":
			$pdf->SetXY(141,240);
			$pdf->Write(5,"X");
			break;

			case "autre lieu":
			$pdf->SetXY(170,240);
			$pdf->Write(5,"X");
			break;

		}

		$pdf->SetXY(142,258);
		$pdf->Write(5,$sign);

    }
// sortie du fichier
$pdf->Output('monfichier.pdf', 'I');
?>
