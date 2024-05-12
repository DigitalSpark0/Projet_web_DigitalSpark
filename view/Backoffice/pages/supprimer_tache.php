<?php
include "C:/xampp/htdocs/projet web integration/controller/tacheController.php";
include "C:/xampp/htdocs/projet web integration/config.php";

$servc=new tacheController();
$servc->Supprimerproject($_GET["id"]);

header('Location:Gestion_des_projects.php');
?>