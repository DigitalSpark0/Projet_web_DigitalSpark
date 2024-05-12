<?php
    include "C:/xampp/htdocs/projet web integration/controller/tacheController.php";
    include "C:/xampp/htdocs/projet web integration/config.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifiez si l'ID du projet a été transmis
        if(isset($_POST["idp"])) {
            // Récupérez l'ID du projet à partir des données postées
            $IDp = $_POST["idp"];
            $Nomtache = isset($_POST["tachename"])?$_POST["tachename"]:'erreur';
            $DescriptionT = isset($_POST["description"])?$_POST["description"]:'erreur';
            $Deadline = isset($_POST["deadline"])?$_POST["deadline"]:'erreur';
            $Priority = isset($_POST["priority"])?$_POST["priority"]:'erreur';
            $Notes = isset($_POST["notes"])?$_POST["notes"]:'erreur';
            $ver=new tache($IDp,$Nomtache,$DescriptionT,$Deadline,$Priority,$Notes);
            $tacheC = new tacheController();
            $tacheC->ajoutertache($ver);
            header('Location:about.php'); 
        }
    }    
    //$IDt = isset($_POST["idt"]) ?$_POST["idt"]:'erreur';
    

    

    

?>