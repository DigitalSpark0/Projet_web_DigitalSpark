<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la candidature</title>
    <link href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <?php
        require_once 'C:\xampp\htdocs\Projet_web_DigitalSpark-gestion_des_offres\controller\candiController.php';
        $controller = new candiController();

        // Vérifier si l'ID de la candidature est présent dans l'URL
        if (isset($_GET['id_candidature'])) {
            $id_candidature = $_GET['id_candidature'];
            // Vérifier si l'ID de l'offre est présent dans l'URL
            if(isset($_GET['id_offre'])) {
                $id_offre = $_GET['id_offre'];
            } else {
                // Si l'ID de l'offre n'est pas défini dans l'URL, initialiser à NULL
                $id_offre = null;
            }
            // Fournir les quatre arguments attendus
            $candidature = $controller->getCandidatureById($id_candidature, $id_offre, null, null);

            if ($candidature) {
                echo "<h2>Détails de la candidature</h2>";
                echo "<p>Id: " . htmlspecialchars($candidature->getid_cand()) . "</p>";
                echo "<p>ID de l'offre: " . htmlspecialchars($candidature->getid_offre()) . "</p>";
                echo "<p>Date de candidature: " . htmlspecialchars($candidature->getdate_cand()) . "</p>";
                // Ajoutez d'autres détails de la candidature ici si nécessaire
            } else {
                echo "<p>La candidature demandée n'existe pas.</p>";
            }
        } else {
            echo "<p>Aucun identifiant de candidature fourni.</p>";
        }
        ?>
        <a href="../pages/notifications.php">Retour à la liste des candidatures</a>
    </div>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
</body>
</html>
