<?php
include "C:/xampp/htdocs/projet web integration/controller/ServiceController.php";
include "C:/xampp/htdocs/projet web integration/config.php";

// Récupérer les données du formulaire
$titre = isset($_POST["titres"]) ?$_POST["titres"]:'erreur';
$description = isset($_POST["descriptions"])?$_POST["descriptions"]:'erreur';
$prix = isset($_POST["prixs"])?$_POST["prixs"]:'erreur';
$duree = isset($_POST["durees"])?$_POST["durees"]:'erreur';
$categorie = isset($_POST["categories"])?$_POST["categories"]:'erreur';
$statut = isset($_POST["statuts"])?$_POST["statuts"]:'erreur';

// Créer un nouvel objet employer avec les données du formulaire
$ser=new service($titre,$description,$prix,$duree,$categorie,$statut);
$serviceC = new ServiceController();
$serviceC->ajouterService($ser);

header('Location:index.php'); 
?>