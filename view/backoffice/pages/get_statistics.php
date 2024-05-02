<?php

include "C:/xampp/htdocs/ProjetWebQH/config.php";
include "C:/xampp/htdocs/ProjetWebQH/controller/ArticleController.php";


$articleController = new ArticleController();


$statistics = $articleController->getCategoryStatistics();


header('Content-Type: application/json');
echo json_encode($statistics);
?>
