<?php
include "C:/xampp/htdocs/projet web (gestion services)/controller/CommandeController.php";
include "C:/xampp/htdocs/projet web (gestion services)/config.php";
 
    $service_id = isset($_POST["idsc"])?$_POST["idsc"]:'erreur';
    $prix = isset($_POST["mont"])?$_POST["mont"]:'erreur';
    $dateactuelle=isset($_POST["onichan"])?$_POST["onichan"]:'erreur';
    $statut_cc=isset($_POST["t3agrib"])?$_POST["t3agrib"]:'erreur';
    $commande = new commande($service_id,$dateactuelle,$statut_cc,$prix);
    $commandeController = new CommandeController();
    $commandeController->ajouterCommande($commande);
    header("Location: commandes.php");
?>
