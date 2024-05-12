<?php
require_once 'C:\xampp\htdocs\projet web integration\controller\candiController.php';

// Vérifier si les paramètres GET sont présents
if(isset($_GET['id_candidature']) && isset($_GET['id_offre'])) {
    // Récupérer les ID de la candidature et de l'offre
    $id_candidature = $_GET['id_candidature'];
    $id_offre = $_GET['id_offre'];

    // Instancier le contrôleur
    $controller = new candiController();

    // Appeler la méthode pour supprimer la candidature et l'offre associée
    $controller->supprimercommande($id_candidature);

    // Rediriger l'utilisateur vers une autre page ou afficher un message de confirmation
    header("Location: candidature.php");
    exit();
} else {
    // Gérer le cas où les paramètres GET sont manquants
    echo "Paramètres manquants.";
}
?>
