<?php

require_once "C:/wamp64/www/Projet_web_DigitalSpark-gestion_des_offres/controller/offreController.php";

$offreController = new offreController();
$listeOffres = $offreController->listOffres(); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Offres</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Liste des Offres</h1>
    <table>
        <thead>
            <tr>
                <th>ID Offre</th>
                <th>Titre</th>
                <th>Statut</th>
                <th>Entreprise</th>
                <th>Date de Publication</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($listOffres)): ?>
    <?php foreach ($listOffres as $offre): ?>
        <tr>
            <td><?= $offre['id_offre']; ?></td>
            <td><?= $offre['titre']; ?></td>
            <td><?= $offre['statut']; ?></td>
            <td><?= $offre['entreprise']; ?></td>
            <td><?= $offre['date_pub']; ?></td>
            <td><?= $offre['description']; ?></td>
            <td><a href="delete_offre.php?id_offre=<?= $offre['id_offre']; ?>" class="btn">Delete</a></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr><td colspan="7">Aucune offre disponible.</td></tr>
<?php endif; ?>

        </tbody>
    </table>
</body>
</html>
