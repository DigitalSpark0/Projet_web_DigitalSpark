<?php
include "C:/xampp/htdocs/projet web integration/controller/reclamationsC.php";


$employeC=new reclamationsC();
$employeC->deletereclamation($_GET["idr"]);

header('Location:listereclamation.php');
