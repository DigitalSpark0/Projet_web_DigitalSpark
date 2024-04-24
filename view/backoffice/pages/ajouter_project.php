<?php
    include "C:/xampp/htdocs/projet web (gestion services)/controller/projectController.php";

    $IDp = isset($_POST["idp"]) ?$_POST["idp"]:'erreur';
    $ProjectName = isset($_POST["projectname"])?$_POST["projectname"]:'erreur';
    $Category = isset($_POST["category"])?$_POST["category"]:'erreur';
    $Description = isset($_POST["description"])?$_POST["description"]:'erreur';
    $ProjectCost = isset($_POST["projectcost"])?$_POST["projectcost"]:'erreur';
    $TacheDemande = isset($_POST["tachedemande"])?$_POST["tachedemande"]:'erreur';

    $ser=new project($IDp,$ProjectName,$Category,$Description,$ProjectCost,$TacheDemande);
    $serviceC = new projectController();
    $serviceC->ajouterproject($ser);

    header('Location:gestion_des_projects.php'); 

?>