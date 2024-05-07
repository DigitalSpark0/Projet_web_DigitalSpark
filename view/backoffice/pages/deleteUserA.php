<?php
include "C:/xampp/htdocs/ProjetWebQH/controller/User/user.php";

$userController = new userCRUD();

// Supprimer l'offre en utilisant la méthode  du contrôleur
$userController->SupprimerUser($_GET["id_utilisateur"]);

// Redirection vers la page listOffres.php
header('Location: tables.php');
?>
