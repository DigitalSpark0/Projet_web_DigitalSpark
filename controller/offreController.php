<?php
include_once 'C:/wamp64/www/Projet_web_DigitalSpark-gestion_des_offres/config.php';
include 'C:/wamp64/www/Projet_web_DigitalSpark-gestion_des_offres/model/user.php';

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

    public function ajouterOffre($offre)
    {
        $pdo = config::getConnexion();
        try {
            $query = "INSERT INTO offre (titre, statut, entreprise, date_pub, description) 
                      VALUES (:titre, :statut, :entreprise, :date_pub, :description)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                'titre' => $offre->gettitre(),
                'statut' => $offre->getstatut(),
                'entreprise' => $offre->getentreprise(),
                'date_pub' => $offre->getdate_pub(),
                'description' => $offre->getdescription(),
            ]);
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    } 

    public function listOffres()
    {
        $sql = "SELECT * FROM offre";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch(Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

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

    public function updateoffre($offre)
    {
        try {
            $db = config::getConnexion();
    
            // Check if $offre is an array or an object
            if (is_array($offre)) {
                // If $offre is an array, check if it contains an "offre" key
                if (array_key_exists('offre', $offre)) {
                    // If the "offre" key is present, extract the offre object from it
                    $offreObject = $offre['offre'];
                } else {
                    // If the "offre" key is not present, throw an exception
                    throw new Exception("offre array is missing the 'offre' key.");
                }
            } else {
                // If $offre is an object, assume it's the offre object
                $offreObject = $offre;
            }
    
            $query = $db->prepare(
                'UPDATE offre SET 
                titre = :titre,
                description = :description,
                statut = :statut,
                entreprise = :entreprise
                WHERE id_offre = :id'
            );
            $query->execute([
                'titre' => $offreObject->gettitre(),
                'description' => $offreObject->getdescription(),
                'statut' => $offreObject->getstatut(),
                'entreprise' => $offreObject->getentreprise(),
                'id' => $offreObject->getid_offre()
            ]);
        } catch (PDOException $e) {
            echo "Error updating offre: " .$e->getMessage();
       } catch (Exception $e) {
            echo "Error updating offre: " .$e->getMessage();
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
    
    public function showoffre($id_offre)
    {
        $sql = "SELECT * FROM offre WHERE id_offre = :id_offre";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_offre', $id_offre, PDO::PARAM_INT);
            $query->execute();
            $offre = $query->fetch();
            return $offre;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function affichertriPanier(){
			
        $sql="SELECT * FROM offre ORDER BY entreprise";
        $db = config::getConnexion();
        try{
            $cinemas = $db->query($sql);
            return $cinemas;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    function afficherRecherchePanier($rech){
                
        $sql = "SELECT * FROM offre WHERE id_offre LIKE '%$rech%'  ";
    
        $db = config::getConnexion();
        try{
            $cinemas = $db->query($sql);
            return $cinemas;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    public function listOffresPaginated($start, $limit)
{
    $sql = "SELECT * FROM offre LIMIT $start, $limit";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch(Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

public function getTotalOffres()
{
    $sql = "SELECT COUNT(*) as total FROM offre";
    $db = config::getConnexion();
    try {
        $stmt = $db->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch(Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

}
?>
