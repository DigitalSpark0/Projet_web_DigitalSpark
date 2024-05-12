<?php

include "C:/xampp/htdocs/projet web integration/controller/ArticleController.php";


$articleC=new ArticleController();
$articleC ->deletearticle($_GET["id"]);

header('Location:gestion_des_articles.php');

?>