<?php
include "C:/xampp/htdocs/projet web integration/controller/ArticleController.php";


$articleController = new ArticleController();


$articleController->generatePDF();

header('Location:gestion_des_articles.php');
?>