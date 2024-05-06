<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listes des projects</h1>
    <table align="center">
        <thead>
            <tr>
                <th>IDp</th>
                <th>ProjectName</th>
                <th>Category</th>
                <th>Description</th>
                <th>ProjectCost</th>
                <th>TacheDemande</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($project as $prj): ?>
                <tr>
                    <td><?= $prj['IDp'] ?></td>
                    <td><?= $prj['ProjectName'] ?></td>
                    <td><?= $prj['Category'] ?></td>
                    <td><?= $prj['Description'] ?></td>
                    <td><?= $prj['ProjectCost'] ?></td>
                    <td><?= $prj['TacheDemande'] ?></td>
                </tr>
            <?php endforeach; ?> 
        </tbody>
    </table>
</body>
</html>