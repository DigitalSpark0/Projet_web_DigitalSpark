<?php
    include "C:/xampp/htdocs/project web (gestion services)/controller/tacheController.php";
    include "C:/xampp/htdocs/project web (gestion services)/config.php";
    //$IDt = isset($_POST["idt"]) ?$_POST["idt"]:'erreur';
    $IDp = isset($_POST["idp"])?$_POST["idp"]:'erreur';
    $Nomtache = isset($_POST["tachename"])?$_POST["tachename"]:'erreur';
    $DescriptionT = isset($_POST["description"])?$_POST["description"]:'erreur';
    $Deadline = isset($_POST["deadline"])?$_POST["deadline"]:'erreur';
    $Priority = isset($_POST["priority"])?$_POST["priority"]:'erreur';
    $Notes = isset($_POST["notes"])?$_POST["notes"]:'erreur';

    $ver=new tache($IDp,$Nomtache,$DescriptionT,$Deadline,$Priority,$Notes);
    $tacheC = new tacheController();
    $tacheC->ajoutertache($ver);

    header('Location:about.php'); 

?>