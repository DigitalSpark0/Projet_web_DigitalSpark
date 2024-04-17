<?php
include "C:/xampp/htdocs/projet web(gestion services)/model/user.php";
include "C:/xampp/htdocs/projet web(gestion services)/config.php";
class offreController
{
    public function AfficherOffre($offre)
    {
        ?>
        <!DOCTYPE html>
        <html>
            <body>
                <table border="5">
                    <tr>
                        <th>ID Offre</th>
                        <th>Titre</th>
                        <th>Statut</th>
                        <th>Entreprise</th>
                        <th>Date de Publication</th>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td><?php echo $offre->getid_offre(); ?></td>
                        <td><?php echo $offre->gettitre(); ?></td>
                        <td><?php echo $offre->getstatut(); ?></td>
                        <td><?php echo $offre->getentreprise(); ?></td>
                        <td><?php echo $offre->getdate_pub(); ?></td>
                        <td><?php echo $offre->getdescription(); ?></td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
    }
    

    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function ajouterOffre($offre)
    {
        $pdo = config::getConnexion();
        try {
            $query = "INSERT INTO offre ( titre, statut, entreprise, date_pub, description) 
                      VALUES ( :titre, :statut, :entreprise, :date_pub, :description)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                //'id_offre' => $offre->getid_offre(),
                'titre' => $offre->gettitre(),
                'statut' => $offre->getstatut(),
                'entreprise' => $offre->getentreprise(),
                'date_pub' => $offre->getdate_pub(),
                'description' => $offre->getdescription(),
            ]);
            
        } 
        catch (PDOException $e) 
        {
            // Gérer les erreurs de base de données
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    } 


    ///////////////////////////////////////////////////////////////////////////////////////////
    public function listOffres()
    {
        $sql = "SELECT  * FROM offre";
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

    public function SupprimerOffre($id)
    {
        $sql = "DELETE FROM offre WHERE id_offre = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
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
    function updateoffre($offre)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE offre SET 
                titre = :titre,
                description = :description,
                statut = :statut,
                entreprise = :entreprise
                WHERE id = :id'
            );
            $query->execute([
                'titre' => $offre->gettitre(),
                'description' => $offre->getdescription(),
                'statut' => $offre->getstatut(),
                'entreprise' => $offre->getentreprise(),
                'id' => $offre->getid_offre()
            ]);
        } catch (PDOException $e) {
            echo "Error updating offre: " . $e->getMessage();
        }
    }
    
public function getOffreById($id_offre)
{
    $pdo = config::getConnexion();
    $stmt = $pdo->prepare("SELECT * FROM offre WHERE id_offre = :id_offre");
    $stmt->execute(['id_offre' => $id_offre]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


}



?>