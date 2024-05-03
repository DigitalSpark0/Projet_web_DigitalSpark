<?php
include '../controller/candiController.php';

$id_offre = $_GET["id_offre"];
$candisController = new candisController();
$id_candidature = $_GET["id_candidature"];

$candisController->supprimercommande($id_candidature);
header("Location: contact.php?id_offre=$id_offre");
?>