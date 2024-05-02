<?php
if (!class_exists('config')) {
    include "C:/xampp/htdocs/ProjetWebQH/config.php";
}

include "C:/xampp/htdocs/ProjetWebQH/model/Abonnement.php";

class AbonnementController
{
    public function addabonnement($Abonnement)
    {
        $pdo = config::getConnexion();
        
        try {
            // Vérification si l'e-mail existe déjà dans la base de données
            $query_check = "SELECT COUNT(*) AS count FROM ABONNEMENT WHERE email_ab = :email_ab";
            $stmt_check = $pdo->prepare($query_check);
            $email_abonnement = $Abonnement->getemail_ab();
            $stmt_check->bindParam(':email_ab', $email_abonnement);
            $stmt_check->execute();
            $result_check = $stmt_check->fetch(PDO::FETCH_ASSOC);

            if ($result_check['count'] == 0) {
                // Insertion de l'abonnement dans la base de données
                $query_insert = "INSERT INTO ABONNEMENT (email_ab, date_ab, token) VALUES (:email_ab, :date_ab, :token)";
                $stmt_insert = $pdo->prepare($query_insert);
                $stmt_insert->execute([
                    'email_ab' => $Abonnement->getemail_ab(),
                    'date_ab' => $Abonnement->getdate_ab(),
                    'token' => $Abonnement->gettoken(),
                ]);
                return true; // Abonnement ajouté avec succès
            } else {
                return false; // L'e-mail existe déjà dans la base de données
            }
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
            return false; // Erreur lors de l'insertion
        }
    }

    public function listAbonnements(){
        $sql = "SELECT * FROM ABONNEMENT WHERE token = 1";
        $db = config::getConnexion();
        try{
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $liste;
        } catch (PDOException $e){
            die('error:'.$e->getMessage());
        }
    }

    public function deleteabonnement($email)
    {
        $pdo = config::getConnexion();
        
        try {
            // Suppression de l'abonnement de la base de données
            $query_delete = "DELETE FROM ABONNEMENT WHERE email_ab = :email_ab";
            $stmt_delete = $pdo->prepare($query_delete);
            $stmt_delete->bindParam(':email_ab', $email);
            $stmt_delete->execute();
        } catch (PDOException $e) {
            echo "Erreur de suppression : " . $e->getMessage();
        }
    }

    public function confirmSubscription($email)
{
    $pdo = config::getConnexion();
    
    try {
        
        $query_update = "UPDATE ABONNEMENT SET token = 1 WHERE email_ab = :email_ab";
        $stmt_update = $pdo->prepare($query_update);
        $stmt_update->bindParam(':email_ab', $email);
        $stmt_update->execute();
    } catch (PDOException $e) {
        echo "Erreur de mise à jour : " . $e->getMessage();
    }
}

}
?>
