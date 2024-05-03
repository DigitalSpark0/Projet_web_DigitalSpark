<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'offre</title>
    <link href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <?php
        require_once "C:\wamp64\www\Projet_web_DigitalSpark-gestion_des_offres\controller\offreController.php";
        $controller = new offreController();

        // Vérifier si l'ID de l'offre est présent dans l'URL
        if (isset($_GET['id_offre'])) {
            $id_offre = $_GET['id_offre'];
            $offre = $controller->getOffreById($id_offre);

            if ($offre) {
                echo "<h2>Détails de l'offre</h2>";
                echo "<p>Id: " . htmlspecialchars($offre['id_offre']) . "</p>";
                echo "<p>Titre: " . htmlspecialchars($offre['titre']) . "</p>";
                echo "<p>Description: " . htmlspecialchars($offre['description']) . "</p>";
                echo "<p>Entreprise: " . htmlspecialchars($offre['entreprise']) . "</p>";
                echo "<p>Date de publication: " . htmlspecialchars($offre['date_pub']) . "</p>";
                echo "<p>Statut: " . htmlspecialchars($offre['statut']) . "</p>";
            } else {
                echo "<p>L'offre demandée n'existe pas.</p>";
            }
        } else {
            echo "<p>Aucun identifiant d'offre fourni.</p>";
        }
        ?>
        <a href="../pages/gestion_des_services.php">Retour à la liste des offres</a>
    </div>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
</body>
</html>
