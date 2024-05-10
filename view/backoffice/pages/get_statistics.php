<?php

include "C:/xampp/htdocs/projet web integration/config.php";
include "C:/xampp/htdocs/projet web integration/controller/ArticleController.php";


$articleController = new ArticleController();


$statistics = $articleController->getCategoryStatistics();


header('Content-Type: application/json');
echo json_encode($statistics);
?>
