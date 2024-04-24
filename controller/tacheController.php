<?php
    include "C:/xampp/htdocs/projet web (gestion services)/model/tache.php";
    include "C:/xampp/htdocs/projet web (gestion services)/config.php";
    class tacheController
    {
        public function Affichertache($offre)
    {
        ?>
        <!DOCTYPE html>
        <html>
            <body>
                <table border="5">
                    <tr>
                        <th>ID tache</th>
                        <th>ID project</th>
                        <th>Tachename</th>
                        <th>Description</th>
                        <th>Deadline</th>
                        <th>Priority</th>
                        <th>Notes</th>
                    </tr>
                    <tr>
                        <td><?php echo $offre->getid_tache(); ?></td>
                        <td><?php echo $offre->getid_project(); ?></td>
                        <td><?php echo $offre->getNomTache(); ?></td>
                        <td><?php echo $offre->getdescription(); ?></td>
                        <td><?php echo $offre->getdeadline(); ?></td>
                        <td><?php echo $offre->getpriority(); ?></td>
                        <td><?php echo $offre->getnotes(); ?></td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
    }
    

    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function ajoutertache($offre)
    {
        $pdo = config::getConnexion();
        try {
            $query = "INSERT INTO tache ( IDt, IDp, NomTache, Description, Deadline, Priority, Notes) 
                      VALUES ( :IDt, :IDp, :NomTache, :Description, :Deadline, :Priority, :Notes)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                //'id_offre' => $offre->getid_offre(),
                'IDt' => $offre->getid_tache(),
                'IDp'=> $offre->getid_project(),
                'NomTache' => $offre->getNomTache(),
                'Description' => $offre->getdescription(),
                'Deadline' => $offre->getdeadline(),
                'Priority' => $offre->getpriority(),
                'Notes'=>$offre->getnotes(),
            ]);
            
        } 
        catch (PDOException $e) 
        {
            // Gérer les erreurs de base de données
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    } 


    
    ///////////////////////////////////////////////////////////////////////////////////////////
    public function listproject()
    {
        $sql = "SELECT  * FROM tache";
        $db = config::getConnexion();
        try
        {
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e)
        {
            die('Error: ' . $e->getMessage());
        }
    }
    }
?>