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
    
// header("Location: commandes.php");
?>
<html>
    <head>
        <body>
            <div class="custom-alert">

            </div>
        </body>
    </head>
</html>
<style>
        .custom-alert {
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            color: #333;
            padding: 10px 20px;
            border-radius: 5px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>
<script>
     // Créer un élément div pour l'alerte
        var alerte = document.createElement("div");
        alerte.className = "custom-alert";
        alerte.innerText = "La commande a été ajoutée correctement";

        // Ajouter l'alerte à la fin du corps de la page
        document.body.appendChild(alerte);
        setTimeout(function() {
            window.location.href = "commandes.php";
        }, 1500);
    </script>
