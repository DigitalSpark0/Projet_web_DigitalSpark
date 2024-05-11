

<?php
ob_start();
require_once 'C:\xampp\htdocs\projet web integration\controller\candiController.php';
require_once "C:/xampp/htdocs/projet web integration/view/Backoffice/pages/vendor/autoload.php";

$c = new candiController();
$tab = $c->listCand();

if (isset($_POST["type"]) && $_POST["type"] === "pdf") {
    error_reporting(0);
    ob_start();

    // Create new PDF instance
    $pdf = new TCPDF();
    
    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('asma');
    $pdf->SetTitle('candidature Table PDF');
    $pdf->SetSubject('candidature Table');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('dejavusans', '', 12);

    // Output the HTML content with custom design
    $html = '<h1 style="text-align: center;">Liste des candidatures</h1>';
    $html .= '<table border="1" cellpadding="5" style="width: 100%;">';
    $html .= '<thead><tr><th>id candidature</th><th>id offre</th><th>date de candidature</th></tr></thead>';
    $html .= '<tbody>';
    
    foreach ($tab as $c) {
        $html .= '<tr>';
        $html .= '<td>' . $c['id_candidature'] . '</td>';
        $html .= '<td>' . $c['id_offre'] . '</td>';
        $html .= '<td>' . $c['date_candidature'] . '</td>';
        $html .= '<td>' . $c['cv'] . '</td>';
        $html .= '<td>' . $c['disponibilté'] . '</td>';
        $html .= '</tr>';
    }
    
    $html .= '</tbody></table>';

    $pdf->writeHTML($html, true, false, true, false, '');



    // Output the PDF for download
    $pdf->Output('candidature_table.pdf', 'D');
    exit;
  
}
?>
