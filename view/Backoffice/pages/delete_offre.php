<?php
require_once 'C:\xampp\htdocs\projet web integration\controller\offreController.php';

$offreController = new offreController();

// Vérifier si l'ID de l'offre à supprimer est passé en paramètre GET
if(isset($_GET["id_offre"])) {
    // Supprimer l'offre en utilisant la méthode SupprimerOffre du contrôleur
    $id_offre = $_GET["id_offre"];
    $suppression_reussie = $offreController->SupprimerOffre($id_offre);

    if ($suppression_reussie) {
        // Redirection vers la page gestion_des_services.php si la suppression réussit
        header('Location: rtl.php');
        exit; // Arrêter l'exécution du script après la redirection
    } else {
        // Afficher un message d'erreur si la suppression échoue
        echo "La suppression de l'offre a échoué.";
    }
} else {
    // Si l'ID de l'offre n'est pas défini dans les paramètres GET, afficher un message d'erreur
    echo "ID de l'offre non spécifié.";
}
?>
