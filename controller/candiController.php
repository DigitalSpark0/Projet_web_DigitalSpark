<?php
include_once "C:/xampp/htdocs/projet web integration/config.php";
include 'C:/xampp/htdocs/projet web integration/model/candidature.php';

class candiController
{
    public function AfficherCand($candidatures)
    {
        ?>
        <!DOCTYPE html>
        <html>
            <body>
                <table border="5">
                    <tr>
                        <th>ID Offre</th>
                        <th>ID Candidature</th>
                        <th>Date de Candidature</th>
                        <th>cv</th>
                        <th>Disponibilité</th>
                    </tr>
                    <tr>
                        <td><?php echo $candidatures->getid_offre(); ?></td>
                        <td><?php echo $candidatures->getid_cand(); ?></td>
                        <td><?php echo $candidatures->getdate_cand(); ?></td>
                        <td><?php echo $candidatures->getcv(); ?></td>
                        <td><?php echo $candidatures->getdisponibilité(); ?></td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
    }

    public function ajouterCand($candidatures)
{
    $pdo = config::getConnexion();
    try {
        $pdo->beginTransaction();

        // Vérifier d'abord si l'offre existe
        $offre_id = $candidatures->getid_offre();
        $offre_query = "SELECT id_offre FROM offre WHERE id_offre = :id_offre";
        $offre_stmt = $pdo->prepare($offre_query);
        $offre_stmt->execute(['id_offre' => $offre_id]);
        $offre_exists = $offre_stmt->fetchColumn();

        if (!$offre_exists) {
            echo "L'offre avec l'id $offre_id n'existe pas.";
            $pdo->rollBack(); // Annuler la transaction
            return;
        }

        // Maintenant, insérer la candidature
        $query = "INSERT INTO candidatures (id_offre, date_candidature, cv, disponibilité) 
                  VALUES (:id_offre, :date_candidature, :cv, :disponibilite)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'id_offre' => $offre_id,
            'date_candidature' => $candidatures->getdate_cand(),
            'cv' => $candidatures->getcv(),
            'disponibilite' => $candidatures->getdisponibilite() // Correction ici
        ]);

        $pdo->commit(); // Valider la transaction
        echo "La candidature a été ajoutée avec succès.";
    } catch (PDOException $e) {
        echo "Erreur d'insertion : " . $e->getMessage();
        $pdo->rollBack(); // Annuler la transaction en cas d'erreur
    }
}




    

    public function listCand()
    {
        $sql = "SELECT * FROM candidatures";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch(Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function supprimercommande($id_candidature)
    {
        $sql=" DELETE FROM candidatures WHERE id_candidature=:id_candidature";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_candidature' , $id_candidature);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    

    public function updateCand($candidatures)
{
    try {
        $db = config::getConnexion();

        // Check if $candidatures is an array or an object
        if (is_array($candidatures)) {
            // If $candidatures is an array, check if it contains a "candidatures" key
            if (array_key_exists('candidatures', $candidatures)) {
                // If the "candidatures" key is present, extract the candidatures object from it
                $candidaturesObject = $candidatures['candidatures'];
            } else {
                // If the "candidatures" key is not present, throw an exception
                throw new Exception("candidatures array is missing the 'candidatures' key.");
            }
        } else {
            // If $candidatures is an object, assume it's the candidatures object
            $candidaturesObject = $candidatures;
        }

        $query = $db->prepare(
            'UPDATE candidatures SET 
            id_offre = :id_offre,
            date_candidature = :date_candidature,
            cv = :cv,
            disponibilité = :disponibilité
            WHERE id_candidature = :id'
        );
        $query->execute([
            'id_offre' => $candidaturesObject->getid_offre(),
            'date_candidature' => $candidaturesObject->getdate_cand(),
            'cv' => $candidaturesObject->getcv(),
            'disponibilité' => $candidaturesObject->getDisponibilite(), // Assumant qu'il y a une méthode getDisponibilite()
            'id' => $candidaturesObject->getid_cand()
        ]);
    } catch (PDOException $e) {
        // Renvoyer l'exception pour qu'elle puisse être traitée à un niveau supérieur
        throw $e;
   } catch (Exception $e) {
        // Renvoyer l'exception pour qu'elle puisse être traitée à un niveau supérieur
        throw $e;
    }
}

    
    public function getCandidatureById($id_candidature, $id_offre, $cv, $disponibilité)
{
    $pdo = config::getConnexion();
    // Construire la requête en fonction des paramètres fournis
    $sql = "SELECT * FROM candidatures WHERE id_candidature = :id_candidature";
    if ($id_offre !== null) {
        $sql .= " AND id_offre = :id_offre";
    }
    if ($cv !== null) {
        $sql .= " AND cv = :cv";
    }
    if ($disponibilité !== null) {
        $sql .= " AND disponibilité = :disponibilité";
    }
    
    // Préparation de la requête
    $stmt = $pdo->prepare($sql);

    // Bind des paramètres
    $stmt->bindParam(':id_candidature', $id_candidature);
    if ($id_offre !== null) {
        $stmt->bindParam(':id_offre', $id_offre);
    }
    if ($cv !== null) {
        $stmt->bindParam(':cv', $cv);
    }
    if ($disponibilité !== null) {
        $stmt->bindParam(':disponibilité', $disponibilité);
    }

    // Exécution de la requête
    $stmt->execute();

    $candidature = $stmt->fetch(PDO::FETCH_ASSOC);

    // Créer un objet candidature seulement si une candidature est trouvée
    if ($candidature) {
        // Utiliser les valeurs de $candidature pour créer un nouvel objet candidatures
        $candidature_obj = new candidatures($candidature['id_offre'], $candidature['date_candidature'], $candidature['cv'], $candidature['disponibilité']);
        // Ajouter l'id de la candidature à l'objet
        $candidature_obj->setid_cand($candidature['id_candidature']);
        return $candidature_obj;
    } else {
        return false;
    }
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
function recupereroffre($id_candidature, $id_offre)
        {
            try {
                $sql = "SELECT * FROM candidatures INNER JOIN offre ON candidature.id_offre = panier.panier_id WHERE panier.panier_id = :panier_id AND id_commande = :id_commande";
                $db = config::getConnexion();
                $query = $db->prepare($sql);
                $query->bindParam(':id_offre', $id_offre, PDO::PARAM_INT);
                $query->bindParam(':id_candidature', $id_candidature, PDO::PARAM_INT);
                $query->execute();
                $candidatures = $query->fetch(PDO::FETCH_ASSOC);
                return $candidatures;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        function afficherRechercheCand($rech){
                
            $sql = "SELECT * FROM candidatures WHERE id_candidature LIKE '%$rech%'  ";
        
            $db = config::getConnexion();
            try{
                $cinemas = $db->query($sql);
                return $cinemas;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }
        
        
    function joinoffre($id_offre){
        $sql=("SELECT * FROM candidatures INNER JOIN offre on candidatures.id_offre = offre.id_offre WHERE offre.id_offre = $id_offre");
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    function joinpanier($id_offre)
    {
        $sql=("SELECT * FROM candidatures INNER JOIN offre on candidatures.id_offre = offre.id_offre WHERE offre.id_offre = $id_offre");
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    
    }
}
?>