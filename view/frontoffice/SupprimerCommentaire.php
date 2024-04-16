<?php


include "C:/xampp/htdocs/ProjetWebQH/controller/CommentaireController.php";

$id5 = $_GET["id011"];
$commentaireC=new CommentaireController();
$commentaireC ->deletecommentaire($_GET["idcom"]);

header('Location: single-blog.php?id0=' . urlencode($id5));


?>