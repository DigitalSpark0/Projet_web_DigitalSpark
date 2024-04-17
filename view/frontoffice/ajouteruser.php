<?php

include "C:/xampp/htdocs/projet web (gestion services)/controller/userController.php";

// Récupérer les données du formulaire
$prenom = isset($_POST["prenoms"]) ? $_POST["prenoms"] : 'erreur';
$nom = isset($_POST["noms"]) ? $_POST["noms"] : 'erreur';
$Email = isset($_POST["Emails"]) ? $_POST["Emails"] : 'erreur';
$Password = isset($_POST["Passwords"]) ? $_POST["Passwords"] : 'erreur';
$Role = isset($_POST["Role"]) ? $_POST["Role"] : 'erreur';

// Créer un nouvel objet user avec les données du formulaire
$User = new user($prenom, $nom, $Email, $Password, $Role);
$userC = new userController();
$userC->ajouterUser($User);

header('Location:index.html'); 
?>
