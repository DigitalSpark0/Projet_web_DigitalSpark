<?php
include "C:/xampp/htdocs/projet web (gestion services)/model/service.php";

class ServiceController
{
    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function ajouterService($service)
    {
        $pdo = config::getConnexion();
        try {
            $query = "INSERT INTO SERVICE (titre_s, desc_s, prix_s, duree_s, categorie_s, statut_s) 
                      VALUES (:titre_s, :desc_s, :prix_s, :duree_s, :categorie_s, :statut_s)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                'titre_s' => $service->gettitre_s(),
                'desc_s' => $service->getdesc_s(),
                'prix_s' => $service->getprix_s(),
                'duree_s' => $service->getduree_s(),
                'categorie_s' => $service->getcategorie_s(),
                'statut_s' => $service->getstatut_s(),
            ]);
            
        } 
        catch (PDOException $e) 
        {
            // Gérer les erreurs de base de données
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    } 
    ///////////////////////////////////////////////////////////////////////////////////////////
    public function listServices()
    {
        $sql = "SELECT * FROM SERVICE";
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
    public function deleteservice($TITRE_S)
    {
        $sql="DELETE FROM SERVICE WHERE TITRE_S = :TITRE_S";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->bindValue(':TITRE_S',$TITRE_S);

            $query->execute();
            $rowCount = $query->rowCount();

            if($rowCount > 0)
            {
                echo "delete successful. $rowCount rows affected.";
            }
            else
            {
                echo "No rows deleted.";
            }
        }
        catch(Exception $e)
        {
            die('Error:' .$e->getMessage());
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////
    public function update($IDS,$titre_s,$desc_s,$prix_s,$duree_s,$categorie_s,$statut_s)
    {
        $sql="UPDATE  SERVICE SET ids=:IDSS, titre_s=:titre_ss, desc_s=:desc_ss, prix_s=:prix_ss, duree_s=:duree_ss, categorie_s=:categorie_ss, statut_s=:statut_ss WHERE ids=:IDSS";
        $db = config::getConnexion();
            $query = $db->prepare($sql);
            $query->bindValue(':IDSS',$IDS);
            $query->bindValue(':titre_ss',$titre_s);
            $query->bindValue(':desc_ss',$desc_s);
            $query->bindValue(':prix_ss',$prix_s);
            $query->bindValue(':duree_ss',$duree_s);
            $query->bindValue(':categorie_ss',$categorie_s);
            $query->bindValue(':statut_ss',$statut_s);
        try
        {
            $query->execute();
        }
        catch(Exception $e)
        {
            die('Error:' .$e->getMessage());
        }
    }
}



?>