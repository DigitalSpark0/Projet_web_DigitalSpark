<?php
// Inclure le fichier de configuration et le contrôleur utilisateur
 require_once "C:/xampp/htdocs/projet web (gestion services)/controller/userController.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id_utilisateur = $_POST["id_utilisateur"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $Email = $_POST["Email"];
    $Role = $_POST["Role"];

    // Créer une instance du contrôleur utilisateur
    $controller = new userController();

    // Appeler la méthode updateUser pour mettre à jour l'utilisateur dans la base de données
    $controller->updateUser($id_utilisateur, $prenom, $nom, $Email, $Role);

    // Rediriger vers la page d'origine avec un message de succès
    header("Location: tables.php?success=1");
    exit();
} else {
    // Si le formulaire n'a pas été soumis, rediriger vers la page d'origine avec un message d'erreur
    header("Location: tables.php?error=1");
    exit();
}
?>
