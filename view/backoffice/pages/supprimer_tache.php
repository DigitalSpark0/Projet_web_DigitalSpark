<?php
include "C:/xampp/htdocs/project web (gestion services)/controller/tacheController.php";
include "C:/xampp/htdocs/project web (gestion services)/config.php";

$servc=new tacheController();
$servc->Supprimerproject($_GET["id"]);

header('Location:Gestion_des_projects.php');
?>