<?php
include "C:/xampp/htdocs/projet web (gestion services)/controller/ServiceController.php";
include "C:/xampp/htdocs/projet web (gestion services)/config.php";

$servc=new ServiceController();
$servc->deleteservice($_GET["id"]);

header('Location:index.php');

?>