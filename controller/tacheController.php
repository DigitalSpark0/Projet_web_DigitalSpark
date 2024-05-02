<?php
    include "C:/xampp/htdocs/project web (gestion services)/model/tache.php";
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
                        <td><?php echo $tache->getid_tache(); ?></td>
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
    public function ajoutertache($tache)
    {
        $pdo = config::getConnexion();
        try {
            $query = "INSERT INTO tache (IDp, Nomtache, DescriptionT, Deadline, Priority, Notes) 
                      VALUES (:IDp, :Nomtache, :DescriptionT, :Deadline, :Priority, :Notes)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                //'id_offre' => $offre->getid_offre(),
                //'IDt' => $tache->getid_tache(),
                'IDp'=> $tache->getid_project(),
                'Nomtache' => $tache->getNomTache(),
                'DescriptionT' => $tache->getdescription(),
                'Deadline' => $tache->getdeadline(),
                'Priority' => $tache->getpriority(),
                'Notes'=>$tache->getnotes(),
            ]);
            
        } 
        catch (PDOException $e) 
        {
            // Gérer les erreurs de base de données
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    } 


    
    ///////////////////////////////////////////////////////////////////////////////////////////
    public function listtache()
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
        ////////////////////////////////////////////////////////////////////////////////////////////

        public function Supprimertache($IDt)
        {
            $sql_delete_tache = "DELETE FROM tache WHERE IDt = :IDt";
            $db = config::getConnexion();
            try {
                // Delete the record from the 'tache' table
                $query_delete_tache = $db->prepare($sql_delete_tache);
                $query_delete_tache->bindValue(':IDt', $IDt);
                $query_delete_tache->execute();
        
                $rowCount = $query_delete_tache->rowCount();
                if ($rowCount > 0) {
                    echo "Suppression réussie. $rowCount lignes affectées.";
                } else {
                    echo "Aucune ligne supprimée.";
                }
            } catch(Exception $e) {
                if ($e->getCode() == '23000') {
                    echo "Impossible de supprimer le projet car il existe des tâches associées.";
                } else {
                    die('Erreur: ' . $e->getMessage());
                }
            }
        }
        //////////////////////////////////////////////////////////////////////////////////////
public function listcommandechercher($Priority)
{
    $sql = "SELECT * FROM tache WHERE Priority = :Priority";
    $db = config::getConnexion();
    try
    {
        $query = $db->prepare($sql);
        $query->bindValue(':Priority', $Priority);
        $query->execute();
        $liste = $query->fetchAll();
        return $liste;
    }
    catch(Exception $e)
    {
        die('Error: ' . $e->getMessage());
    }
}
    }
?>