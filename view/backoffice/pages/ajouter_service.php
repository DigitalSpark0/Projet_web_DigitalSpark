<?php
require_once "C:/wamp64/www/Projet_web_DigitalSpark-gestion_des_offres/controller/offreController.php";

// Récupérer les données du formulaire
$titre = isset($_POST["titres"]) ? $_POST["titres"] : 'erreur';
$statut = isset($_POST["statuts"]) ? $_POST["statuts"] : 'erreur';
$entreprise = isset($_POST["entreprises"]) ? $_POST["entreprises"] : 'erreur';
$date_pub = isset($_POST["date_pubs"]) ? $_POST["date_pubs"] : 'erreur';
$description = isset($_POST["descriptions"]) ? $_POST["descriptions"] : 'erreur';

// Vérifier le format de la date_pub
if (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $date_pub)) {
    // Format de date invalide
    echo "Le format de la date est invalide. Utilisez jj/mm/aaaa.";
    // Vous pouvez également rediriger l'utilisateur vers une page d'erreur ou afficher un message d'erreur dans le formulaire.
} else {
    // Le format de la date est valide, vous pouvez procéder à l'insertion dans la base de données.
    // Créez et enregistrez l'offre dans la base de données, par exemple.
    $Offre = new offre($titre, $statut, $entreprise, $date_pub, $description);
    $offreC = new offreController();
    $offreC->ajouterOffre($Offre);
    
    header('Location:gestion_des_services.php');
}
?>
