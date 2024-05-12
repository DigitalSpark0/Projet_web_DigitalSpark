<?php
include "C:/xampp/htdocs/projet web integration/model/project.php";

class projectController
{
    public function Afficherproject($project)
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
                        <td><?php echo $project->getid_project(); ?></td>
                        <td><?php echo $project->getProjectName(); ?></td>
                        <td><?php echo $project->getcategory(); ?></td>
                        <td><?php echo $project->getdescription(); ?></td>
                        <td><?php echo $project->getprojectcost(); ?></td>
                        <td><?php echo $project->gettache(); ?></td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
    }
    

    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function ajouterproject($project)
    {
        $pdo = config::getConnexion();
        try {
            
            $query = "INSERT INTO project ( IDp, ProjectName, Category, Description, ProjectCost, TacheDemande) 
                      VALUES ( :IDp, :ProjectName, :Category, :Description, :ProjectCost, :TacheDemande)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                //'id_offre' => $offre->getid_offre(),
                'IDp' => $project->getid_project(),
                'ProjectName' => $project->getProjectName(),
                'Category' => $project->getcategory(),
                'Description' => $project->getdescription(),
                'ProjectCost' => $project->getprojectcost(),
                'TacheDemande'=>$project->gettache(),
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
    $db = config::getConnexion();
    try {
        // Delete the record from the 'project' table
        $sql_delete_project = "DELETE FROM project WHERE IDp = :IDp";
        $query_delete_project = $db->prepare($sql_delete_project);
        $query_delete_project->bindValue(':IDp', $IDp);
        $query_delete_project->execute();

        $rowCount = $query_delete_project->rowCount();
        if ($rowCount > 0) {
            echo "Suppression réussie. $rowCount lignes affectées.";
        } else {
            echo "Aucune ligne supprimée.";
        }
    } catch(PDOException $e) {
        if ($e->getCode() == '23000') {
            echo "Impossible de supprimer le projet car il existe des tâches associées.";
        } else {
            die('Erreur: ' . $e->getMessage());
        }
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
//////////////////////////////////////////////////////////////////////////////////////
public function listcommandechercher($IDp)
{
    $sql = "SELECT * FROM project WHERE IDp = :IDp";
    $db = config::getConnexion();
    try
    {
        $query = $db->prepare($sql);
        $query->bindValue(':IDp', $IDp);
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