<?php
include "C:/xampp/htdocs/projet web (gestion services)/model/project.php";
include "C:/xampp/htdocs/projet web (gestion services)/config.php";
class projectController
{
    public function Afficherproject($offre)
    {
        ?>
        <!DOCTYPE html>
        <html>
            <body>
                <table border="5">
                    <tr>
                        <th>ID project</th>
                        <th>Projectname</th>
                        <th>Categoryname</th>
                        <th>Description</th>
                        <th>Projectcost</th>
                        <th>Tachedemande</th>
                    </tr>
                    <tr>
                        <td><?php echo $offre->getid_project(); ?></td>
                        <td><?php echo $offre->getProjectName(); ?></td>
                        <td><?php echo $offre->getcategory(); ?></td>
                        <td><?php echo $offre->getdescription(); ?></td>
                        <td><?php echo $offre->getprojectcost(); ?></td>
                        <td><?php echo $offre->gettache(); ?></td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
    }
    

    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function ajouterproject($offre)
    {
        $pdo = config::getConnexion();
        try {
            $query = "INSERT INTO project ( IDp, ProjectName, Category, Description, ProjectCost, TacheDemande) 
                      VALUES ( :IDp, :ProjectName, :Category, :Description, :ProjectCost, :TacheDemande)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                //'id_offre' => $offre->getid_offre(),
                'IDp' => $offre->getid_project(),
                'ProjectName' => $offre->getProjectName(),
                'Category' => $offre->getcategory(),
                'Description' => $offre->getdescription(),
                'ProjectCost' => $offre->getprojectcost(),
                'TacheDemande'=>$offre->gettache(),
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
        $sql = "SELECT  * FROM project";
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

    public function Supprimerproject($IDp)
    {
        $sql = "DELETE FROM project WHERE IDp = :IDp";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':IDp', $IDp);
            $query->execute();
            $rowCount = $query->rowCount();
            if ($rowCount > 0) {
                echo "Suppression réussie. $rowCount lignes affectées.";
            } else {
                echo "Aucune ligne supprimée.";
            }
        } catch(Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////
    function updateproject($offre)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE project SET 
                projectname = :Projectname,
                description = :Description,
                categoryname = :Categoryname,
                projectcost = :Projectcost,
                tache= :Tachedemande,
                WHERE id = :IDp'
            );
            $query->execute([
                'titre' => $offre->gettitre(),
                'description' => $offre->getdescription(),
                'statut' => $offre->getstatut(),
                'entreprise' => $offre->getentreprise(),
                'id' => $offre->getid_project()
            ]);
        } catch (PDOException $e) {
            echo "Error updating offre: " . $e->getMessage();
        }
    }
    
public function getprojectById($idp)
{
    $pdo = config::getConnexion();
    $stmt = $pdo->prepare("SELECT * FROM project WHERE IDp = :idp");
    $stmt->execute(['idp' => $IDp]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


}



?>