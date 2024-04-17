<?php
include "../../controller/reclamationsC.php";


$employeC=new reclamationsC();
$employeC->deletereclamation($_GET["idr"]);

header('Location:listereclamation.php');
