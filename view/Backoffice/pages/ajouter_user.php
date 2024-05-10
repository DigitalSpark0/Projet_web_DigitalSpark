<?php

include "C:/xampp/htdocs/ProjetWebQH/controller/User/user.php";

// Récupérer les données du formulaire
$prenom = isset($_POST["prenoms"]) ? $_POST["prenoms"] : 'erreur';
$nom = isset($_POST["noms"]) ? $_POST["noms"] : 'erreur';
$Email = isset($_POST["Emails"]) ? $_POST["Emails"] : 'erreur';
$Password = isset($_POST["Passwords"]) ? $_POST["Passwords"] : 'erreur';
$Role = isset($_POST["Role"]) ? $_POST["Role"] : 'erreur';

// Créer un nouvel objet User avec les données du formulaire
$user = new user($prenom, $nom, $Email, $Password, $Role);
$userC = new UserCRUD();
$userC->create_user($user);

header('Location: tables.php'); 
?>
