<?php
// Inclure le fichier userController.php et config.php
include "C:/xampp/htdocs/projet web (gestion services)/controller/userController.php";
 
// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
// Assurez-vous d'avoir une méthode pour vérifier l'authentification de l'utilisateur, par exemple via une session

// Récupérer les informations de l'utilisateur à partir de la session ou d'une autre méthode d'authentification
session_start();
if (!isset($_SESSION['id_utilisateur'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("location: updateUser.php");
    exit();
}

// Récupérer l'ID de l'utilisateur à partir de la session
$id_utilisateur = $_SESSION['id_utilisateur'];

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['Email'];
    $role = $_POST['Role'];

    // Appeler la fonction pour mettre à jour les informations de l'utilisateur
    updateUser($id_utilisateur, $prenom, $nom, $email, $role);

    // Rediriger vers la page de profil ou une autre page après la mise à jour réussie
    header("location: profile.php");
    exit();
}

// Récupérer les informations de l'utilisateur à partir de la base de données pour pré-remplir le formulaire
// Vous pouvez utiliser une fonction comme getUserById($id_utilisateur) pour récupérer les informations de l'utilisateur à partir de la base de données
// Assurez-vous d'adapter cette partie en fonction de votre implémentation

// Exemple de code pour récupérer les informations de l'utilisateur à partir de la base de données
$userInfo = getUserById($id_utilisateur);
$prenom = $userInfo['prenom'];
$nom = $userInfo['nom'];
$email = $userInfo['Email']; // Assurez-vous que la clé utilisée correspond à celle dans votre base de données
$role = $userInfo['Role'];
?>

