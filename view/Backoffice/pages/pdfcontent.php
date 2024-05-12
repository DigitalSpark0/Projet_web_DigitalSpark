<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>
<body>
    <h1>liste des commandes</h1>
    <table align="center">
        <thead>
            <tr>
                <th>idc</th>
                <th>idservice</th>
                <th>date</th>
                <th>statut</th>
                <th>montant</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($commandes as $commande):?>
                <tr>
                    <td><?= $commande['idc'] ?></td>
                    <td><?= $commande['idservice'] ?></td>
                    <td><?= $commande['date_c'] ?></td>
                    <td><?= $commande['statut_c'] ?></td>
                    <td><?= $commande['montant_c'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
<style>
    body {
    font-family: Arial, sans-serif;
}

h1 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

tbody tr:hover {
    background-color: #ddd;
}

    </style>
</html>