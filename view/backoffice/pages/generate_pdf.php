

<?php
ob_start();
include "../controller/panierC.php";
require 'vendor/autoload.php';

$c = new panierC();
$tab = $c->listpanier();

if (isset($_POST["type"]) && $_POST["type"] === "pdf") {
    error_reporting(0);
    ob_start();

    // Create new PDF instance
    $pdf = new TCPDF();
    
    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('ghassen');
    $pdf->SetTitle('panier Table PDF');
    $pdf->SetSubject('panier Table');

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
        $html .= '<td>' . $c['panier_id'] . '</td>';
        $html .= '<td>' . $c['id_produit'] . '</td>';
        $html .= '<td>' . $c['prix'] . '</td>';
        $html .= '<td>' . $c['prix_t'] . '</td>';
        $html .= '</tr>';
    }
    
    $html .= '</tbody></table>';

    $pdf->writeHTML($html, true, false, true, false, '');



    // Output the PDF for download
    $pdf->Output('panier_table.pdf', 'D');
    exit;
  
}
?>
