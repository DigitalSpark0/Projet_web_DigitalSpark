<?php
    use Dompdf\Dompdf;
    include 'C:/xampp/htdocs/project web (gestion services)/config.php';
    include 'C:/ampp/htdocs/project web (gestion services)/dompdf/autoload.inc.php';    
    $sql = 'SELECT * from `project`';
    $query = $db->query($sql);
    $project = $query->fetchAll();

    ob_start();
    require_once 'export.php';
    $html=ob_get_contents();
    ob_end_clean();

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->render();
    $fichier ='Export.pdf';
    $dompdf->stream($fichier);
?>