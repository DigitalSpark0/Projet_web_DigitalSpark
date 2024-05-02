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
            background-color: #4CAF50; /* Couleur de fond verte */
            color: white; /* Texte en blanc */
            padding: 20px; /* Espace de remplissage */
            position: fixed;
            top: 40%;
            left: 35%;
            transform: translate(-50%, -50%);
            border-radius: 10px; /* Coins arrondis */
            font-size: 24px; /* Taille de police augmentée */
            animation: pulse 1s infinite alternate; /* Animation pulsée */
            z-index: 9999;
        }

        /* Animation pulsée */
        @keyframes pulse {
            from {
                transform: scale(1);
            }
            to {
                transform: scale(1.1);
            }
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
