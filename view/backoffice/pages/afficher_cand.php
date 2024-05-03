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
    <h1>Liste Des Candidatures</h1>
    <table>
        <thead>
            <tr>
                <th>ID candidature</th>
                <th>ID Offre</th>
                <th>Date de candidature</th>

            </tr>
        </thead>
        <tbody>
        <?php if (!empty($listCand)): ?>
    <?php foreach ($listCand as $candidatures): ?>
        <tr>
            <td><?= $offre['id_candidature']; ?></td>
            <td><?= $offre['id_offre']; ?></td>
            <td><?= $offre['date_candidature']; ?></td>

        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr><td colspan="7">Aucune offre disponible.</td></tr>
<?php endif; ?>

        </tbody>
    </table>
</body>
</html>
