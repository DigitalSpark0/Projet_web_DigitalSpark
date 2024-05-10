<?php


include "C:/xampp/htdocs/projet web integration/controller/CommentaireController.php";

$commentaireC=new CommentaireController();
$commentaireC ->deletecommentaire($_GET["idcom1"]);

header('Location: gestion_des_articles.php');


?>