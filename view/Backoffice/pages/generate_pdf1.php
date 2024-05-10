<?php
include "C:/xampp/htdocs/projet web integration/controller/CommentaireController.php";


$commentaireController = new CommentaireController();


$commentaireController->generatePDF();

header('Location:gestion_des_articles.php');
?>