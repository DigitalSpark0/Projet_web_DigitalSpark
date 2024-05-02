<?php
    use Dompdf\Dompdf;
    include 'C:/xampp/htdocs/project web (gestion services)/config.php';
    require_once 'includes/dompdf/autoload.inc.php';
    
    $sql = 'SELECT * from `project`';
    $query = $db->query($sql);
    $project = $query->fetchAll();

    $dompdf = new Dompdf();
    $dompdf->loadHtml('Brouette');
    $dompdf->render();
    $fichier ='Export.pdf'
    $dompdf->stream($fichier);
?>