<?php
require('/assets/pdf/fpdf.php');

// Crée une nouvelle classe en étendant la classe FPDF
class MonPDF extends FPDF {
    // En-tête du document
    function Header() {
        // Sélectionne la police de caractères
        $this->SetFont('Arial', 'B', 16);
        // Titre du document
        $this->Cell(0, 10, utf8_decode('Votre régime'), 0, 1, 'C');
        // Saut de ligne
        $this->Ln(10);
    }

    // Pied de page du document
    function Footer() {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Sélectionne la police de caractères
        $this->SetFont('Arial', 'I', 8);
        // Numéro de page
        $this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }

    // Ajoute une liste de plats au PDF
    function AjouterListePlats($detail) {
        // Définit la police et la taille du texte
        $this->SetFont('Arial', 'B', 12);
        // Titre de la liste de plats
        $this->Cell(0, 10, 'Liste des plats proposes ', 0, 1);
        // Saut de ligne
        $this->Ln(5);
        // Définit la police et la taille du texte pour les détails des plats
        $this->SetFont('Arial', '', 12);
        for($i = 0; $i < count($detail); $i++) {
            if($detail[$i]["nature"] == "plat") {
                $this->Cell(0, 10, utf8_decode('Nom du plat : '.$detail[$i]["nom"]), 0, 1);
                $this->SetFont('Arial', 'I', 12);
                $this->Cell(0, 10, utf8_decode('Apport calorique : '.$detail[$i]["apportcalorie"]), 0, 1);
                $this->Ln(5);
            }
        }
    }

    // Ajoute une liste d'activités sportives au PDF
    function AjouterListeActivites($detail) {
        // Définit la police et la taille du texte
        $this->SetFont('Arial', 'B', 12);
        // Titre de la liste d'activités
        $this->Cell(0, 10, utf8_decode('Liste d\'activités sportives proposes'), 0, 1);
        // Saut de ligne
        $this->Ln(5);
        // Définit la police et la taille du texte pour les détails des activités
        $this->SetFont('Arial', '', 12);
        for($i = 0; $i < count($detail); $i++) {

            if($detail[$i]["nature"] == "sport") {
                $this->Cell(0, 10, utf8_decode('Activité sportive : '.$detail[$i]["nom"]), 0, 1);
                $this->SetFont('Arial', 'I', 12);
                $this->Cell(0, 10, utf8_decode('Déficit calorique : '.$detail[$i]["deficitcalorie"]), 0, 1);
                $this->Ln(5);
            }
        }

    }
}

// Crée une nouvelle instance de la classe MonPDF
$pdf = new MonPDF();

// Ajoute une page au document PDF
$pdf->AddPage();

// Définit la police et la taille du texte
$pdf->SetFont('Arial', '', 12);

// Ajoute la liste de plats au PDF
$pdf->AjouterListePlats($detail);

// Ajoute la liste d'activités sportives au PDF
$pdf->AjouterListeActivites($detail);

// Enregistre le PDF dans un fichier
$pdf->Output('uploadfile.pdf', 'D');
?>
