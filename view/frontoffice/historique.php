<?php
// Inclure le fichier de configuration
include "C:/xampp/htdocs/projet web integration/config.php";

// Récupérer la connexion à la base de données
$pdo = config::getConnexion();

// Récupérer les données de la table commande avec le comptage des commandes
$sql = "SELECT idc, idservice, date_c, COUNT(*) AS nombre_commandes FROM commande GROUP BY idservice, date_c";
$result = $pdo->query($sql);

// Créer un tableau pour stocker les données
$historique = array();

// Parcourir les résultats et les ajouter au tableau
if ($result->rowCount() > 0) {
    while($row = $result->fetch()) {
        $historique[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique des achats</title>
    <meta name="description" content="">
        
            <!------------------------------------->


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .hero-cap {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .historique {
            margin: 20px auto;
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .historique p {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f9f9f9;
            border-left: 5px solid #4CAF50; /* Couleur de bordure pour indiquer le succès */
            border-radius: 5px;
        }

        .historique p:last-child {
            margin-bottom: 0;
        }

        h2 {
            margin-top: 0;
            font-size: 28px;
        }
    </style>
</head>
<body>
    
    <div class="hero-cap text-center">
        <h2>Historique des achats</h2>
    </div>
    <div class="historique">
        <?php
        // Afficher les données récupérées
        foreach ($historique as $commande) {
            echo "<p>Tu as commandé le service " . $commande['idservice'] . " " . $commande['nombre_commandes'] . " fois le " . $commande['date_c'] . ". L'id de votre commande est : " . $commande['idc'] . "</p>";
        }
        ?>
    </div>
</body>
</html>
