<?php
// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer le montant total et la date actuelle depuis le formulaire
    $totalMontant = $_POST['totalMontant'];
    $dateActuelle = $_POST['dateActuelle'];

    // Connexion à la base de données
    include "C:/xampp/htdocs/projet web integration/config.php"; // Assurez-vous que ce fichier contient votre classe de connexion PDO

    try {
        // Préparer la requête d'insertion
        $stmt = config::getConnexion()->prepare("INSERT INTO montot (montdate, dateactuellemont) VALUES (:montdate, :dateactuellemont)");

        // Liaison des valeurs avec les paramètres de la requête
        $stmt->bindParam(':montdate', $totalMontant);
        $stmt->bindParam(':dateactuellemont', $dateActuelle);

        // Exécution de la requête
        $stmt->execute();

        // Redirection vers la page de gestion des services
        header("Location: gestion_des_services.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    } catch (PDOException $e) {
        // Gestion des erreurs de la base de données
        echo "Erreur : " . $e->getMessage();
    }
}
?>