<?php
include "C:/xampp/htdocs/projet web integration/controller/projectController.php";

$servc=new projectController();
$servc->Supprimerproject($_GET["id"]);

header('Location:about.php');
?>