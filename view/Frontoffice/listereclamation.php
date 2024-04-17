<?php
include "../../controller/reclamationsC.php";
$reclamationC = new reclamationsC();
$list = $reclamationC->listereclamation();
?>
<html>

<head></head>

<body>

    <center>
        <h1>List of your reclamations</h1>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id reclamation</th>
            <th>Sujet</th>
            <th>Description</th>
            <th>Date d'envoi</th>
        </tr>
        <?php
        foreach ($list as $employe) {
        ?>
            <tr>
                <td><?= $employe['idr']; ?></td>
                <td><?= $employe['sujet']; ?></td>
                <td><?= $employe['description']; ?></td>
                <td><?= $employe['dater']; ?></td>
                <td align="center">
                <form method="POST" action="updatereclamation.php?idr=<?php echo $employe['idr']; ?>">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $employe['idr']; ?> name="idr">
                    </form>
                </td>
                <td>
                    <a href="deletereclamation.php?idr=<?php echo $employe['idr']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>