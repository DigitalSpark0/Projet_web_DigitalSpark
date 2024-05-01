<?php
// Inclure le fichier de configuration
include "C:/xampp/htdocs/projet web (gestion services)/config.php";

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
    <style>
        /* Ajoutez vos styles CSS ici */
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
