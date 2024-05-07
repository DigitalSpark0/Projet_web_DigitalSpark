<?php
// Inclure le fichier de connexion à la base de données
require_once "C:/xampp/htdocs/ProjetWebQH/config.php";

// Vérifier si l'e-mail est fourni dans la requête POST
if (isset($_POST['Email'])) {
    // Récupérer l'e-mail saisi
    $email = $_POST['Email'];

    // Préparer la requête SQL pour vérifier si l'e-mail appartient à un administrateur
    $sql = "SELECT * FROM user WHERE Email = :Email AND Role = 1"; // Supposons que le rôle de l'administrateur est 1

    // Préparer la requête
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':Email', $email, PDO::PARAM_STR);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Vérifier s'il y a une ligne correspondante dans la base de données
        if ($stmt->rowCount() > 0) {
            // L'e-mail appartient à un administrateur
            echo "admin";
        } else {
            // L'e-mail n'appartient pas à un administrateur
            echo "not_admin";
        }
    } else {
        // Erreur lors de l'exécution de la requête
        echo "error";
    }
} else {
    // L'e-mail n'a pas été fourni dans la requête POST
    echo "no_email";
}
?>
