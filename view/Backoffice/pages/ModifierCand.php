<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Candidature</title>
    <!-- Liens vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajout de styles personnalisés */
        .container {
            margin-top: 50px;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Modifier Candidature</h1>
        <?php
        require_once "C:/xampp/htdocs/projet web integration/controller/candiController.php";
        
        // Initialisation des variables
        $id_candidature = $_GET["id_candidature"] ?? null;
        $id_offre = $_GET["id_offre"] ?? null;
        $error = "";
        
        // Création d'une instance du contrôleur
        $candiController = new candiController();
        
        // Initialise $candidature à un tableau vide
        $candidature = [];
        
        // Récupère les données de la candidature à modifier
        $candidature = $candiController->getCandidatureById($id_candidature, $id_offre, null, null);
        
        // Vérifie si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Vérifie si toutes les données nécessaires sont fournies
            if (isset($_POST["id_candidature"], $_POST["id_offre"], $_POST["date_candidature"])) {
                // Vérifie si aucune des données n'est vide
                if (!empty($_POST["id_candidature"]) && !empty($_POST["id_offre"]) && !empty($_POST["date_candidature"])) {
                    // Crée un tableau avec les données du formulaire
                    $candidatureData = [
                        "id_candidature" => $_POST["id_candidature"],
                        "id_offre" => $_POST["id_offre"],
                        "date_candidature" => $_POST["date_candidature"]
                    ];
                    
                    // Met à jour la candidature
                    $candiController->updateCandidature($candidatureData);
                    
                    // Redirige vers la page de gestion des candidatures
                    header('Location: gestion_des_candidatures.php');
                    exit(); // Arrête l'exécution du script après la redirection
                } else {
                    // Affiche un message d'erreur si des informations sont manquantes
                    $error = "Des informations sont manquantes.";
                }
            } else {
                // Affiche un message d'erreur si le formulaire est mal formé
                $error = "Le formulaire est mal formé.";
            }
        }
        ?>
        <?php if (!empty($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="id_candidature" class="form-label">ID Candidature:</label>
                <input type="text" name="id_candidature" id="id_candidature" class="form-control" value="<?php echo null !== $candidature->getid_cand() ? $candidature->getid_cand() : ''; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="id_offre" class="form-label">ID Offre:</label>
                <input type="text" name="id_offre" id="id_offre" class="form-control" value="<?php echo null !== $candidature->getid_offre() ? $candidature->getid_offre() : ''; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="date_candidature" class="form-label">Date de Candidature:</label>
                <input type="text" name="date_candidature" id="date_candidature" class="form-control" value="<?php echo null !== $candidature->getdate_cand() ? $candidature->getdate_cand() : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
