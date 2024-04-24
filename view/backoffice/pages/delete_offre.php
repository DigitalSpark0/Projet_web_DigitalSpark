<?php
require_once "C:/wamp64/www/Projet_web_DigitalSpark-gestion_des_offres/controller/offreController.php";

$offreController = new offreController();

// Supprimer l'offre en utilisant la méthode SupprimerOffre du contrôleur
$offreController->SupprimerOffre($_GET["id_offre"]);

// Redirection vers la page listOffres.php
header('Location: gestion_des_services.php');
?>
