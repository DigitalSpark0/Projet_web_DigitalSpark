<?php
require_once "C:/wamp64/www/Projet_web_DigitalSpark-gestion_des_offres/controller/offreController.php";
// Initialisation des variables
$id_offre = $_GET["id_offre"] ?? null;
$error = "";

// Création d'une instance du contrôleur
$offreController = new offreController();

// Initialise $offre à un tableau vide
$offre = [];

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérifie si toutes les données nécessaires sont fournies
    if (isset($_POST["id_offre"], $_POST["titre"], $_POST["statut"], $_POST["entreprise"], $_POST["date_pub"], $_POST["description"])) {
        // Vérifie si aucune des données n'est vide
        if (!empty($_POST["id_offre"]) && !empty($_POST["titre"]) && !empty($_POST["statut"]) && !empty($_POST["entreprise"]) && !empty($_POST["date_pub"]) && !empty($_POST["description"])) {
            // Crée un tableau avec les données du formulaire
            $offreData = [
                "id_offre" => $_POST["id_offre"],
                "titre" => $_POST["titre"],
                "statut" => $_POST["statut"],
                "entreprise" => $_POST["entreprise"],
                "date_pub" => $_POST["date_pub"],
                "description" => $_POST["description"]
            ];

            // Met à jour l'offre
            $offreController->updateoffre($offreData);

            // Redirige vers la page de gestion des services
            header('Location: gestion_des_services.php');
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

// Récupère les données de l'offre
$offre = $offreController->showoffre($id_offre);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Offre</title>
</head>

<body>
    <h1>Update Offre</h1>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="id_offre">ID Offre:</label>
        <input type="text" name="id_offre" id="id_offre" value="<?php echo isset($offre['id_offre']) ? $offre['id_offre'] : ''; ?>"><br>
        <label for="titre">Titre:</label>
        <input type="text" name="titre" id="titre" value="<?php echo isset($offre['titre']) ? $offre['titre'] : ''; ?>"><br>
        <label for="statut">Statut:</label>
        <input type="text" name="statut" id="statut" value="<?php echo isset($offre['statut']) ? $offre['statut'] : ''; ?>"><br>
        <label for="entreprise">Entreprise:</label>
        <input type="text" name="entreprise" id="entreprise" value="<?php echo isset($offre['entreprise']) ? $offre['entreprise'] : ''; ?>"><br>
        <label for="date_pub">Date de Publication:</label>
        <input type="text" name="date_pub" id="date_pub" value="<?php echo isset($offre['date_pub']) ? $offre['date_pub'] : ''; ?>"><br>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="<?php echo isset($offre['description']) ? $offre['description'] : ''; ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>

</html>
