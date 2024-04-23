<?php 
include "C:/xampp/htdocs/projet web (gestion services)/controller/CommandeController.php";
include "C:/xampp/htdocs/projet web (gestion services)/config.php";
$idservicee = isset($_POST["idserv"]) ?$_POST["idserv"]:'erreur';
$date_cc = isset($_POST["datee"])?$_POST["datee"]:'erreur';
$statut_cc = isset($_POST["stattt"])?$_POST["stattt"]:'erreur';
$montant_cc = isset($_POST["montantt"])?$_POST["montantt"]:'erreur';

$como=new CommandeController();
$como->updatecommande($_POST["idcc"],$idservicee,$date_cc,$statut_cc,$montant_cc);

header('Location:gestion_des_services.php');
?>