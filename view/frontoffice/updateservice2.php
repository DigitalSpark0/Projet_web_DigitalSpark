<?php 
include "C:/xampp/htdocs/projet web (gestion services)/controller/ServiceController.php";
include "C:/xampp/htdocs/projet web (gestion services)/config.php";
$titre_s2 = isset($_POST["titres2"]) ?$_POST["titres2"]:'erreur';
$desc_s2 = isset($_POST["descriptions2"])?$_POST["descriptions2"]:'erreur';
$prix_s2 = isset($_POST["prixs2"])?$_POST["prixs2"]:'erreur';
$duree_s2 = isset($_POST["durees2"])?$_POST["durees2"]:'erreur';
$categorie_s2 = isset($_POST["categories2"])?$_POST["categories2"]:'erreur';
$statut_s2 = isset($_POST["statuts2"])?$_POST["statuts2"]:'erreur';

$serrr=new ServiceController();
$serrr->update($titre_s2, $desc_s2, $prix_s2, $duree_s2, $categorie_s2, $statut_s2);

header('Location:gestion_des_services.php');
?>