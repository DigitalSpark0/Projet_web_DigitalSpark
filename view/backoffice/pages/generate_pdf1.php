<?php
include "C:/xampp/htdocs/ProjetWebQH/controller/CommentaireController.php";


$commentaireController = new CommentaireController();


$commentaireController->generatePDF();

header('Location:gestion_des_articles.php');
?>