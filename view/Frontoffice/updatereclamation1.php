<?php 
include "../../controller/reclamationsC.php";
$sujet2 = isset($_POST["sujet2"]) ?$_POST["sujet2"]:'erreur';
$description2 = isset($_POST["description2"])?$_POST["description2"]:'erreur';
$dater2 = isset($_POST["dater2"])?$_POST["dater2"]:'erreur';
$reclamationupdate=new reclamationsC();
$reclamationupdate->update($_POST["idr3"],$sujet2, $description2, $dater2);

header('Location:listereclamation.php');
