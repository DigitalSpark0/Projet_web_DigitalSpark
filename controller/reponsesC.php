<?php
include "C:/xampp/htdocs/GestionDesReclamation/model/reponsesM.php";
require_once "C:/xampp/htdocs/GestionDesReclamation/view/config.php";

class reponsesC
{
    public function show($reclamations)
    {
        ?>
        <!DOCTYPE html>
        <html>
            <body>
                <table border="5">
                <tr><th>Nom</th><th>Prénom</th><th>Mot de passe</th><th>Numéro de téléphone</th><th>Email</th><th>Date de naissance</th></tr>
                    <tr>
                        <td><?php echo $reclamations->getcontenu(); ?></td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
    }
    ///////////////////////////////////////////////
    public function listereponses()
    {
        $sql ="SELECT * FROM reponses";
        $db =config::getConnexion();
        try
        {
            $liste =$db->query($sql);
            return $liste;
        }
        catch(Exception $e)
        {
            die('Error:'.$e->getMessage());
        }
    }
    /////////////////////////////////////////////
    public function deletereponse($idrep)
    {
        $db = config::getConnexion();
    
        try {
            // Supprimer la réponse
            $sqlDeleteReponse = "DELETE FROM reponses WHERE idrep = :idrep";
            $queryDeleteReponse = $db->prepare($sqlDeleteReponse);
            $queryDeleteReponse->bindValue(':idrep', $idrep);
            $queryDeleteReponse->execute();
    
            $rowCount = $queryDeleteReponse->rowCount();
    
            if ($rowCount > 0) {
                echo "Delete successful. $rowCount rows affected.";
            } else {
                echo "No rows deleted.";
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    /////////////////////////////////////////////
    /*public function addrreponses($reponse)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare(
                "INSERT INTO reponses (contenu)
                VALUES (:contenu)"
            );
    
            $query->execute([
                'contenu' => $reponse->getcontenu(),
                
            ]);
    
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }*/
    public function addrreponses($id_reclamation, $contenu)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare(
                "INSERT INTO reponses (idr, contenu)
                VALUES (:idr, :contenu)"
            );
    
            $query->execute([
                'idr' => $id_reclamation,
                'contenu' => $contenu,
            ]);
    
            // Retourne true si l'insertion a réussi
            return true;
    
        } catch (PDOException $e) {
            // Affiche l'erreur en cas d'échec de l'insertion
            echo $e->getMessage();
            // Retourne false en cas d'échec
            return false;
        }
    }
    

    ///////////////////////////////////////////////
    public function update($idrep3,$contenu3,$daterep3)
    {
        $sql="UPDATE  reponses SET contenu=:contenu2, daterep=:daterep2 WHERE idrep=:idrep";
        $db = config::getConnexion();
            $query = $db->prepare($sql);
    
            $query->bindValue(':idrep',$idrep3);
            $query->bindValue(':contenu2',$contenu3);
            $query->bindValue(':daterep2',$daterep3);
           
            echo('jsjjsis');
        try
        {
            $query->execute();
        }
        catch(Exception $e)
        {
            die('Error:' .$e->getMessage());
        }
    }  
    public function getReponsesByReclamation($id_reclamation) {
        $sql = "SELECT * FROM reponses WHERE idr = :idr";

        $db = config::getConnexion();
        $query = $db->prepare($sql);

        $query->bindValue(':idr', $id_reclamation);

        try {
            $query->execute();
            // Récupérer les résultats de la requête
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            // Retourner les résultats
            return $result;
        } catch(Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}



?>
