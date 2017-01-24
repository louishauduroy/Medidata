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

		$pdf->SetTitle("certificat_deces_$id");
		$pdf->SetFont('Arial','B',10);

		$pdf->SetXY(16,14);
        $pdf->Write(5,$row["departement"]);

		$pdf->SetXY(38,31);
		$pdf->Write(5,$row["commune_deces"]);

		$x=65;
		for($i=0;$i<5;$i++){
			$x+=5;
			$pdf->SetXY($x,36);
			$pdf->Write(5,substr($row["code_postal"], $i,1));
		}

        $pdf->SetXY(26,40);
		$pdf->Write(5,$row["nom"]);

		$pdf->SetXY(31,45);
		$pdf->Write(5,$row["prenoms"]);

		$pdf->SetXY(43,50);
		$pdf->Write(5,$row["date_naissance"]);

		$pdf->SetXY(80,50);
		$pdf->Write(5,$row["sexe"]);

		$pdf->SetXY(33,55);
		$pdf->Write(5,$row["domicile"]);


		$pdf->SetXY(113,30);
		$pdf->Write(5,$row["date_deces"]);

		$pdf->SetXY(142,30);
		$pdf->Write(5,$row["commune_deces"]);

		$pdf->SetXY(164,30);
		$pdf->Write(5,$row["heure_deces"]);

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



		$pdf->SetXY(48,153);
		$pdf->Write(5,$row["maladies_a"]);

		$pdf->SetXY(171,153);
		$pdf->Write(5,$row["intervalle_a"]);

		$pdf->SetXY(48,160);
		$pdf->Write(5,$row["maladies_b"]);

		$pdf->SetXY(171,160);
		$pdf->Write(5,$row["intervalle_b"]);

		$pdf->SetXY(48,167);
		$pdf->Write(5,$row["maladies_c"]);

		$pdf->SetXY(171,167);
		$pdf->Write(5,$row["intervalle_c"]);

		$pdf->SetXY(48,174);
		$pdf->Write(5,$row["maladies_d"]);

		$pdf->SetXY(171,174);
		$pdf->Write(5,$row["intervalle_d"]);

		$pdf->SetXY(50,193);
		$pdf->Write(5,$row["autres_contributions"]);

		$pdf->SetXY(173,193);
		$pdf->Write(5,$row["intervalle_autres"]);

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

		if($row["lieu_accident"]=="oui"){
			$pdf->SetXY(137,222);
			$pdf->Write(5,"X");
		}else if($row["lieu_accident"]=="non"){
			$pdf->SetXY(154,222);
			$pdf->Write(5,"X");
		}else{
			$pdf->SetXY(171,222);
			$pdf->Write(5,"X");
		}

		if($row["autopsie"]=="oui, resultat disponible"){
			$pdf->SetXY(42,233);
			$pdf->Write(5,"X");
		}else if($row["autopsie"]=="non"){
			$pdf->SetXY(24,233);
			$pdf->Write(5,"X");
		}else{
			$pdf->SetXY(24,240);
			$pdf->Write(5,"X");
		}

		switch($row["lieu_deces"]){
			case "domicile":
			$pdf->SetXY(95,233);
			$pdf->Write(5,"X");
			break;

			case "hopital":
			$pdf->SetXY(141,233);
			$pdf->Write(5,"X");
			break;

			case "clinique privee":
			$pdf->SetXY(172,233);
			$pdf->Write(5,"X");
			break;

			case "hospice, maison de retraite":
			$pdf->SetXY(95,240);
			$pdf->Write(5,"X");
			break;

			case "voie publique":
			$pdf->SetXY(141,240);
			$pdf->Write(5,"X");
			break;

			case "autre lieu":
			$pdf->SetXY(172,240);
			$pdf->Write(5,"X");
			break;

		}

		$pdf->SetXY(142,258);
		$pdf->Write(5,$sign);

    }
// sortie du fichier
$pdf->Output('monfichier.pdf', 'I');
?>
