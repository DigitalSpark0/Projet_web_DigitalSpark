<?php
    use Dompdf\Dompdf;
    use Dompdf\Options;
    include "C:/xampp/htdocs/project web (gestion services)/config.php";
        
    $sql = 'SELECT * from `project`';
    $db = config::getConnexion();
    $query = $db->query($sql);
    $project =$query->fetchAll();

    ob_start();
    require_once 'C:/xampp/htdocs/project web (gestion services)/view/backoffice/pages/export.php';
    $html= ob_get_contents();
    ob_end_clean();

    require_once 'C:/xampp/htdocs/project web (gestion services)/dompdf/autoload.inc.php';
    $options = new Options();
    $options->set('defaultFont' , 'courier');
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->set_Paper('A4','portrait');
    $dompdf->render();
    $fichier ='Export.pdf';
    $dompdf->stream($fichier);
?>