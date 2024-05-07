<?php
session_start();

require_once 'C:/xampp/htdocs/ProjetWebQH/config.php';
require_once '../../controller/User/user.php';
require_once '../../model/userC.php';
require_once '../../controller/User/verifyEmail.php';

// Crée une instance de la classe UserCRUD
$user = new UserCRUD();

// Vérifie si les données du formulaire ont été soumises via la méthode POST
if (isset($_POST["prenom"], $_POST["nom"], $_POST["Email"], $_POST["Password"], $_POST["Role"])) {
    // Récupère les valeurs des champs du formulaire
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"]; // Récupère le mot de passe depuis le formulaire
    $Role = $_POST["Role"];

    // Vérifie si l'adresse e-mail existe déjà dans la base de données
    if ($user->emailExists($Email)) {
        echo "<script>alert('A user with this email already exists.'); window.location.href='../../view/User/user.html#signup';</script>";
        exit; // Arrête l'exécution du script si l'e-mail existe déjà
    }

    // Crée un nouvel objet utilisateur avec les données du formulaire
    $userObject = new user($prenom, $nom, $Email, $Password, $Role);

    // Appelle la méthode pour créer un nouvel utilisateur dans la base de données
    $id_utilisateur = $user->create_user($userObject);

    // Stocke les informations de l'utilisateur dans la session
    $_SESSION['id_utilisateur'] = $id_utilisateur;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['nom'] = $nom;
    $_SESSION['username'] = $Email;
    $_SESSION['Role'] = $Role;

    // Appelle la fonction pour envoyer l'e-mail de vérification
    sendVerificationEmail($Email);

    // Redirige vers la page de création d'utilisateur avec un message de vérification
    header('Location: ../../view/User/user.html?showVerifyMessage=true#signup');
    exit; // Arrête l'exécution du script après la redirection
} else {
    // Si les données du formulaire ne sont pas complètes, affiche un message d'erreur
    echo "Invalid data received.";
}
?>
