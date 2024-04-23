<?php
include "C:/xampp/htdocs/projet web (gestion services)/controller/CommandeController.php";
include "C:/xampp/htdocs/projet web (gestion services)/config.php";

$cumm=new CommandeController();
$cumm->deletecommande($_GET["id"]);

header('Location:gestion_des_services.php');

?>