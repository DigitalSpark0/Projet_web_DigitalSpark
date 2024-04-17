<?php
include "C:/xampp/htdocs/projet web(gestion services)/controller/offreController.php";

$offreController = new offreController();

// Supprimer l'offre en utilisant la méthode SupprimerOffre du contrôleur
$offreController->SupprimerOffre($_GET["id_offre"]);

// Redirection vers la page listOffres.php
header('Location: gestion_des_services.php');
?>
