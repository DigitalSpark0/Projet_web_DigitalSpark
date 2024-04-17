<?php
include "../../controller/reponsesC.php";
$reponcesC = new reponsesC();
$list = $reponcesC->listereponses();
?>
<html>

<head></head>

<body>

    <center>
        <h1>List of reponses</h1>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id reponse</th>
            <th>Contenu</th>
            <th>Date d'envoi</th>
            <th>id reclamation</th>
            <th>id utilisateur</th>
        </tr>
        <?php
        foreach ($list as $employe) {
        ?>
            <tr>
                <td><?= $employe['idrep']; ?></td>
                <td><?= $employe['contenu']; ?></td>
                <td><?= $employe['daterep']; ?></td>
                <td><?= $employe['idr']; ?></td>
                <td><?= $employe['idu']; ?></td>
                <td align="center">
                <form method="POST" action="updateindex.php?idr=<?php echo $employe['idrep']; ?>">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $employe['idrep']; ?> name="idrep">
                    </form>
                </td>
                <td>
                    <a href="deleteindex.php?idr=<?php echo $employe['idrep']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>