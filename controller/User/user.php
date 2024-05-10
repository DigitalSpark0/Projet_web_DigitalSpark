<?php
include "C:/xampp/htdocs/projet web integration/config.php"; 
include "C:/xampp/htdocs/projet web integration/model/userC.php";


class UserCRUD {
    public function create_user($user) {
        $cnx = Config::getConnexion();
        $insert = $cnx->prepare("INSERT INTO user (prenom, nom, Email, Password, Role) VALUES (?, ?, ?, ?, ?)");
        $insert->execute([
            $user->getFirst_Name(),
            $user->getLast_Name(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getRole()
        ]);
        return $cnx->lastInsertId();
    }

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
///////////////////////////////////////////////////////////////////

    public function getUserByEmail($email) {
        $cnx = Config::getConnexion();
        $select = $cnx->prepare("SELECT * FROM user WHERE Email = ?");
        $select->execute([$email]);
        $user = $select->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function getUserById($id) {
        $cnx = Config::getConnexion();
        $select = $cnx->prepare("SELECT * FROM user WHERE id_utilisateur = ?");
        $select->execute([$id]);
        $user = $select->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function emailExists($email) {
        $cnx = Config::getConnexion();
        $select = $cnx->prepare("SELECT * FROM user WHERE Email = ?");
        $select->execute([$email]);
        $user = $select->fetch(PDO::FETCH_ASSOC);
        if($user) {
            return true;
        }
        return false;
    }
    public function banUser($id) {
        $cnx = Config::getConnexion();
        $update = $cnx->prepare("UPDATE user SET Banned='1' WHERE id_utilisateur = ?");
        $update->execute([$id]);
        if($update->rowCount() > 0) {
            return true;
        }
        return false;
    }
    public function unbanUser($id) {
        $cnx = Config::getConnexion();
        $update = $cnx->prepare("UPDATE user SET Banned='0' WHERE id_utilisateur = ?");
        $update->execute([$id]);
        if($update->rowCount() > 0) {
            return true;
        }
        return false;
    }
    public function verifyUser($id) {
        $cnx = Config::getConnexion();
        $update = $cnx->prepare("UPDATE user SET Status='1' WHERE id_utilisateur = ?");
        $update->execute([$id]);
        if($update->rowCount() > 0) {
            return true;
        }
        return false;
    }
}
