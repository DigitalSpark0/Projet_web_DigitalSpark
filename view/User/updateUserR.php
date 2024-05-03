<!-- Dans votre fichier updateUser.php -->

<?php
// Assurez-vous que le fichier est inclus et que la session est démarrée
session_start();
require_once "../../database/connect.php";
require_once "../../controller/User/user.php";
require_once "../../model/User/userC.php";

// Vérifiez si les données du formulaire sont soumises via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les valeurs du formulaire
    $id_utilisateur = $_POST['id_utilisateur'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['Email'];
    $role = $_POST['Role'];

    // Instanciez votre contrôleur utilisateur
    $controller = new userCRUD();

    // Appelez la méthode de mise à jour de l'utilisateur avec les données récupérées du formulaire
    $controller->updateUser($id_utilisateur, $prenom, $nom, $email, $role);

    // Redirigez l'utilisateur vers la page appropriée après la mise à jour
    header("Location: dashboard_recruteur.php");
    exit;
} else {
    // Si les données ne sont pas soumises via POST, redirigez l'utilisateur vers une page d'erreur ou une autre page appropriée
    header("Location: error.php");
    exit;
}
?>
