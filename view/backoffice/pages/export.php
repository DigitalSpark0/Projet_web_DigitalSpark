<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listes des projects</h1>
    <table>
        <thead>
            <th>IDp</th>
            <th>ProjectName</th>
            <th>Category</th>
            <th>Description</th>
            <th>ProjectCost</th>
            <th>TacheDemande</th>
        </thead>
        <tbody>
            <?php foreach($project as $prj): ?>
                <tr>
                    <td><?= $prj['idp'] ?></td>
                    <td><?= $prj['projectname'] ?></td>
                    <td><?= $prj['category'] ?></td>
                    <td><?= $prj['description'] ?></td>
                    <td><?= $prj['projectcost'] ?></td>
                    <td><?= $prj['tache'] ?></td>
                </tr>
            <?php endforeach; ?> 
        </tbody>
    </table>
</body>
</html>