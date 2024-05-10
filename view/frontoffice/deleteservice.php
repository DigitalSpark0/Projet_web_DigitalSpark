<?php
include "C:/xampp/htdocs/projet web integration/controller/ServiceController.php";
include "C:/xampp/htdocs/projet web integration/config.php";

$servc=new ServiceController();
$servc->deleteservice($_GET["id"]);

header('Location:index.php');

?>