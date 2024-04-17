<?php
include "C:/xampp/htdocs/projet web (gestion services)/model/service.php";
include "C:/xampp/htdocs/projet web (gestion services)/config.php";
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
        $sql = "SELECT titre_s, prix_s, categorie_s , statut_s FROM SERVICE";
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
}



?>