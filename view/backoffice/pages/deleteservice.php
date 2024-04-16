<?php
include "C:/xampp/htdocs/projet web (gestion services)/controller/ServiceController.php";

$servc=new ServiceController();
$servc->deleteservice($_GET["id"]);

header('Location:gestion_des_services.php');

?>