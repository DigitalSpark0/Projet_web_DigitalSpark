<?php
use Dompdf\Dompdf;
use Dompdf\Options;

include "C:/xampp/htdocs/projet web integration/config.php";
 $sql = 'SELECT * FROM `commande`';
 $db = config::getConnexion();
 $query = $db->query($sql);
 $commandes=$query->fetchAll();

ob_start();
require_once 'C:/xampp/htdocs/projet web integration/view/backoffice/pages/pdfcontent.php';
$html= ob_get_contents();
ob_end_clean();

require_once 'C:/xampp/htdocs/projet web integration/includes/dompdf/autoload.inc.php';

$options = new Options();
$options->set('defaultFont' , 'Courier');

$dompdf = new Dompdf($options);


$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');


$dompdf->render();

$fichier = 'liste des commandes.pdf';

$dompdf->stream($fichier);

?>