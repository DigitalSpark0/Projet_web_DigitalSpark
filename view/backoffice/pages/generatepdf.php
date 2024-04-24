

<?php
ob_start();
require_once "C:/wamp64/www/Projet_web_DigitalSpark-gestion_des_offres/controller/offreController.php";
require_once "C:/wamp64/www/Projet_web_DigitalSpark-gestion_des_offres/view/backoffice/pages/vendor/autoload.php";

$c = new offreController();
$tab = $c->listOffres();

if (isset($_POST["type"]) && $_POST["type"] === "pdf") {
    error_reporting(0);
    ob_start();

    // Create new PDF instance
    $pdf = new TCPDF();
    
    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('asma');
    $pdf->SetTitle('offre Table PDF');
    $pdf->SetSubject('offre Table');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('dejavusans', '', 12);

    // Output the HTML content with custom design
    $html = '<h1 style="text-align: center;">panier Table</h1>';
    $html .= '<table border="1" cellpadding="5" style="width: 100%;">';
    $html .= '<thead><tr><th>ID</th><th>idProduit</th><th>prix</th><th>prixTotal</th></tr></thead>';
    $html .= '<tbody>';
    
    foreach ($tab as $c) {
        $html .= '<tr>';
        $html .= '<td>' . $c['id_offre'] . '</td>';
        $html .= '<td>' . $c['titre'] . '</td>';
        $html .= '<td>' . $c['entreprise'] . '</td>';
        $html .= '<td>' . $c['date_pub'] . '</td>';
        $html .= '<td>' . $c['description'] . '</td>';
        $html .= '<td>' . $c['statut'] . '</td>';
        $html .= '</tr>';
    }
    
    $html .= '</tbody></table>';

    $pdf->writeHTML($html, true, false, true, false, '');



    // Output the PDF for download
    $pdf->Output('offre_table.pdf', 'D');
    exit;
  
}
?>
