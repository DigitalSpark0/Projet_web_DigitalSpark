<?php
    include "C:/xampp/htdocs/project web (gestion services)/controller/projectController.php";
    include"C:/xampp/htdocs/project web (gestion services)/config.php";
    $IDp = isset($_POST["idp"]) ?$_POST["idp"]:'erreur';
    $ProjectName = isset($_POST["projectname"])?$_POST["projectname"]:'erreur';
    $Category = isset($_POST["category"])?$_POST["category"]:'erreur';
    $Description = isset($_POST["description"])?$_POST["description"]:'erreur';
    $ProjectCost = isset($_POST["projectcost"])?$_POST["projectcost"]:'erreur';
    $TacheDemande = isset($_POST["tachedemande"])?$_POST["tachedemande"]:'erreur';

    $ver=new project($IDp,$ProjectName,$Category,$Description,$ProjectCost,$TacheDemande);
    $projectC = new projectController();
    $projectC->ajouterproject($ver);

    header('Location:about.php'); 

?>