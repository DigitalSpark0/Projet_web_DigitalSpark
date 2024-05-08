<?php
include "C:/xampp/htdocs/GestionDesReclamation/model/reclamationsM.php";
include "C:/xampp/htdocs/GestionDesReclamation/model/userC.PHP";

require_once "C:/xampp/htdocs/GestionDesReclamation/view/config.php";

class reclamationsC
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
                        <td><?php echo $reclamations->getsujet(); ?></td>
                        <td><?php echo $reclamations->getdescription(); ?></td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
    }
    ///////////////////////////////////////////////
    public function listereclamation()
    {
        $sql ="SELECT * FROM reclamations";
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
    public function deletereclamation($idr)
    {
        $db = config::getConnexion();
    
        try {
            // Supprimer les réponses liées à la réclamation
            $sqlDeleteReponses = "DELETE FROM reponses WHERE idr = :idr";
            $queryDeleteReponses = $db->prepare($sqlDeleteReponses);
            $queryDeleteReponses->bindValue(':idr', $idr);
            $queryDeleteReponses->execute();
    
            // Supprimer la réclamation
            $sqlDeleteReclamation = "DELETE FROM reclamations WHERE idr = :idr";
            $queryDeleteReclamation = $db->prepare($sqlDeleteReclamation);
            $queryDeleteReclamation->bindValue(':idr', $idr);
            $queryDeleteReclamation->execute();
    
            $rowCount = $queryDeleteReclamation->rowCount();
    
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
    public function addreclamation($reclamation)
{
    $pdo = config::getConnexion();
    try {
        $query = $pdo->prepare(
            "INSERT INTO reclamations (sujet, description, idu)
            VALUES (:sujet, :description, :idu)"
        );

        // Récupérer l'ID de l'utilisateur manuellement ajouté
        $idu = 1; // Remplacez 1 par l'ID de l'utilisateur que vous avez ajouté manuellement

        $query->execute([
            'sujet' => $reclamation->getsujet(),
            'description' => $reclamation->getdescription(),
            'idu' => $idu,
        ]);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
    ///////////////////////////////////////////////
    public function update($idr3,$sujet3,$description3,$dater3)
    {
        $sql="UPDATE  reclamations SET sujet=:sujet2, description=:description2, dater=:dater2 WHERE idr=:idr2";
        $db = config::getConnexion();
            $query = $db->prepare($sql);
    
            $query->bindValue(':idr2',$idr3);
            $query->bindValue(':sujet2',$sujet3);
            $query->bindValue(':description2',$description3);
            $query->bindValue(':dater2',$dater3);
            
            
        try
        {
            $query->execute();
        }
        catch(Exception $e)
        {
            die('Error:' .$e->getMessage());
        }
    }
    //////////////////////////////////////////////////////////////////////////////////
    public function getNotifications() {
        $sql = "SELECT idu, idr, TIMESTAMPDIFF(HOUR, dater, NOW()) AS time_elapsed FROM reclamations ORDER BY dater DESC LIMIT 5";
        $db = config::getConnexion(); 
    
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $notifications = array();
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $notification = array(
                    'id_utilisateur' => $row['idu'],
                    'id_reclamation' => $row['idr'],
                    'time_elapsed' => $this->formatElapsedTime($row['time_elapsed'])
                );
                $notifications[] = $notification;
            }
    
            return $notifications;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
    // Méthode pour formater le temps écoulé
    private function formatElapsedTime($hours) {
        if ($hours < 1) {
            return "Envoyé il y a moins d'une heure";
        } elseif ($hours < 24) {
            return "Envoyé il y a " . $hours . " heures";
        } else {
            return "Envoyé il y a plus d'un jour";
        }
    }

    public function getReclamationStatsBySubjectAndDay() {
        // Requête SQL pour récupérer les statistiques par sujet et par jour
        $sql = "SELECT DATE(dater) AS day, sujet, COUNT(*) AS count FROM reclamations GROUP BY day, sujet ORDER BY day";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
    
        try {
            $query->execute();
            $stats = array(); // Tableau pour stocker les statistiques
    
            // Parcours des résultats
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $date = $row['day'];
                $sujet = $row['subject'];
                $count = $row['count'];
    
                // Ajout des statistiques au tableau
                if (!isset($stats[$date])) {
                    $stats[$date] = array();
                }
                $stats[$date][$sujet] = $count;
            }
            
            return $stats;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
    
}

?>