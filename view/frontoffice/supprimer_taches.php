<?php
include "C:/xampp/htdocs/project web (gestion services)/controller/tacheController.php";
include "C:/xampp/htdocs/project web (gestion services)/config.php";
$tachc=new tacheController();
$tachc->Supprimertache($_GET["id"]);

header('Location:about.php');
?>