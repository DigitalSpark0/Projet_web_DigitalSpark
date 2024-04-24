<?php
    include "C:/xampp/htdocs/projet web (gestion services)/controller/tacheController.php";

    $IDt = isset($_POST["idt"]) ?$_POST["idt"]:'erreur';
    $IDp = isset($_POST["idp"]) ?$_POST["idp"]:'erreur';
    $NomTache = isset($_POST["tachename"])?$_POST["tachename"]:'erreur';
    $Description = isset($_POST["description"])?$_POST["description"]:'erreur';
    $Deadline = isset($_POST["deadline"])?$_POST["deadline"]:'erreur';
    $Priority = isset($_POST["priority"])?$_POST["priority"]:'erreur';
    $Notes = isset($_POST["notes"])?$_POST["notes"]:'erreur';

    $ser=new tache($IDt,$IDp,$NomTache,$Description,$Deadline,$Priority,$Notes);
    $serviceC = new tacheController();
    $serviceC->ajoutertache($ser);

    header('Location:gestion_des_projects.php'); 

?>