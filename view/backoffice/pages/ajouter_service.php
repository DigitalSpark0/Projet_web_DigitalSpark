<?php
include "C:/xampp/htdocs/projet web(gestion services)/controller/offreController.php";

// Récupérer les données du formulaire
 //$id_offre = isset($_POST["id_offres"]) ?$_POST["id_offres"]:'erreur';
$titre = isset($_POST["titres"])?$_POST["titres"]:'erreur';
$statut = isset($_POST["statuts"])?$_POST["statuts"]:'erreur';
$entreprise = isset($_POST["entreprises"])?$_POST["entreprises"]:'erreur';
$date_pub = isset($_POST["date_pubs"])?$_POST["date_pubs"]:'erreur';
$description = isset($_POST["descriptions"])?$_POST["descriptions"]:'erreur';

// Créer un nouvel objet offre avec les données du formulaire
$Offre=new offre($titre,$statut,$entreprise,$date_pub,$description);
$offreC = new offreController();
$offreC->ajouterOffre($Offre);

header('Location:gestion_des_services.php'); 
?>