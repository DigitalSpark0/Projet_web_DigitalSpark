<?php

include "../../../controller/reponsesC.php";

// Vérifier si les données du formulaire ont été soumises via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérifier si l'ID de réclamation est présent dans les données POST
    if(isset($_POST['id_reclamation'])) {
        // Récupérer l'ID de la réclamation depuis les données POST
        $id_reclamation = $_POST['id_reclamation'];

        // Vérifier si le contenu de la réponse est présent dans les données POST
        if(isset($_POST["contenu"]) && !empty($_POST["contenu"])) {
            // Récupérer le contenu de la réponse depuis les données POST
            $contenu = $_POST["contenu"];

            // Créer un nouvel objet de contrôleur de réponses
            $reponseController = new reponsesC();

            // Appeler la méthode pour ajouter la réponse en passant les deux paramètres requis
            $reponseController->addrreponses($id_reclamation, $contenu);

            // Rediriger l'utilisateur vers une page de confirmation ou toute autre page appropriée
            header("Location: http://localhost/GestionDesReclamation/view/Backoffice/pages/tables1.php?idr=$id_reclamation");
            exit;
        } else {
            // Rediriger l'utilisateur vers une page d'erreur si le contenu de la réponse est manquant
            header("Location: error1.php");
            exit;
        }
    } else {
        // Rediriger l'utilisateur vers une autre page s'il n'y a pas d'ID de réclamation
        header("Location: error.php");
        exit;
    }
} else {
    // Rediriger l'utilisateur vers une page d'erreur si les données du formulaire n'ont pas été soumises via POST
    header("Location: tables.php");
    exit;
}
?>
