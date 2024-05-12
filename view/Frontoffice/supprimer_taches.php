<?php
include "C:/xampp/htdocs/projet web integration/controller/tacheController.php";
include "C:/xampp/htdocs/projet web integration/config.php";
$tachc=new tacheController();
$tachc->Supprimertache($_GET["id"]);

header('Location:about.php');
?>