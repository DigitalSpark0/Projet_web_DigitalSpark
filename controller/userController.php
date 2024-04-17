<?php
include "C:/xampp/htdocs/projet web (gestion services)/model/user.php";
include "C:/xampp/htdocs/projet web (gestion services)/config.php";
class userController
{
    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function ajouterUser($user)
    {
        $pdo = config::getConnexion();
        try {
            $query = "INSERT INTO user (prenom, nom, Email, Password, Role) 
                      VALUES (:prenom, :nom, :Email, :Password, :Role)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                'prenom' => $user->getFirst_Name(),
                'nom' => $user->getLast_Name(),
                'Email' => $user->getEmail(),
                'Password' => $user->getPassword(),
                'Role' => $user->getRole(),
            ]);
            
        } 
        catch (PDOException $e) 
        {
            // Gérer les erreurs de base de données
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    } 
    ///////////////////////////////////////////////////////////////////////////////////////////
    public function listUsers()
    {
        $sql = "SELECT id_utilisateur, prenom, nom, Email, Role FROM user";
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
    public function SupprimerUser($id)
    {
        $sql = "DELETE FROM user WHERE id_utilisateur = :id";
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
    /////////////////////////////////////////////////////////////////////////////////////////////
    public function updateUser($id_utilisateur, $prenom, $nom, $Email, $Role)
{
    $sql = "UPDATE user SET prenom = :prenom, nom = :nom, Email = :Email, Role = :Role WHERE id_utilisateur = :id_utilisateur";
    $db = config::getConnexion();
    try
    {
        $query = $db->prepare($sql);
        $query->bindValue(':id_utilisateur', $id_utilisateur);
        $query->bindValue(':prenom', $prenom);
        $query->bindValue(':nom', $nom);
        $query->bindValue(':Email', $Email);
        $query->bindValue(':Role', $Role);
        $query->execute();
    }
    catch(Exception $e)
    {
        die('Error:' . $e->getMessage());
    }
}
/////////////////////////////////////////////////////////////
}

/*public function getAllUsers($page = 1, $records_per_page = 6) {
    $cnx = Config::getConnexion();
    $offset = ($page - 1) * $records_per_page;

    $stmt = $cnx->prepare("SELECT COUNT(*) FROM user");
    $stmt->execute();
    $total_records = $stmt->fetchColumn();
    $total_pages = ceil($total_records / $records_per_page);

    $stmt = $cnx->prepare("SELECT * FROM user ORDER BY id_utilisateur LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ['users' => $users, 'total_pages' => $total_pages];
}
*/
?>