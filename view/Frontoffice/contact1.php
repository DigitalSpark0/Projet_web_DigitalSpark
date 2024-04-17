<?php
include "C:/xampp/htdocs/GestionDesReclamation/controller/reclamationsC.php";

// Récupérer les données du formulaire

$sujet = isset($_POST["sujet1"]) ? $_POST["sujet1"] : 'erreur';
$description = isset($_POST["description1"]) ? $_POST["description1"] : 'erreur';


// Créer un nouvel objet employer avec les données du formulaire
$reclamation = new reclamations($sujet, $description);
$reclamationC1 = new reclamationsC();
$reclamationC1->addreclamation($reclamation);
// Check if form data is being received

header('Location:listereclamation.php'); 