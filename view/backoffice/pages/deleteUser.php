<?php
include "C:/xampp/htdocs/projet web (gestion services)/controller/userController.php";

$userController = new userController();

// Supprimer l'offre en utilisant la méthode  du contrôleur
$userController->SupprimerUser($_GET["id_utilisateur"]);

// Redirection vers la page listOffres.php
header('Location: tables.php');
?>
