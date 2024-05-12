<?php
    include "C:/xampp/htdocs/projet web integration/controller/projectController.php";

    if(isset($_POST["idp"])){
        $IDp = $_POST["idp"];
        $ProjectName = isset($_POST["projectname"])?$_POST["projectname"]:'erreur';
        $Category = isset($_POST["category"])?$_POST["category"]:'erreur';
        $Description = isset($_POST["description"])?$_POST["description"]:'erreur';
        $ProjectCost = isset($_POST["projectcost"])?$_POST["projectcost"]:'erreur';
        $TacheDemande = isset($_POST["tachedemande"])?$_POST["tachedemande"]:'erreur';

        $ser=new project($IDp,$ProjectName,$Category,$Description,$ProjectCost,$TacheDemande);
        $serviceC = new projectController();
        $serviceC->ajouterproject($ser);

        header('Location: Gestion_des_projects.php');
        exit();
    }
    

    header('Location:gestion_des_projects.php'); 

?>