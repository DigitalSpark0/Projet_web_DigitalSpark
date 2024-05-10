<?php
include "C:/xampp/htdocs/projet web integration/controller/CommandeController.php";
include "C:/xampp/htdocs/projet web integration/config.php";

$cumm=new CommandeController();
$cumm->deletecommande($_GET["id"]);

header('Location:gestion_des_services.php');

?>