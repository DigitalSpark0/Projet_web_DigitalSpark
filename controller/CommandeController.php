<?php
include "C:/xampp/htdocs/projet web (gestion services)/model/commande.php";

class CommandeController
{
    public function ajouterCommande($commande)
    {
        $pdo = config::getConnexion();
        try {
            $query = "INSERT INTO commande (idservice, date_c, statut_c, montant_c) 
                      VALUES (:idservice, :date_c, :statut_c, :montant_c)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                'idservice' => $commande->getidservice(),
                'date_c' => $commande->getdate_c(),
                'statut_c' => $commande->getstatut_c(),
                'montant_c' => $commande->getmontant_c(),
            ]);
            
        } 
        catch (PDOException $e) 
        {
            // Gérer les erreurs de base de données
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////
    public function listcommande()
    {
        $sql = "SELECT * FROM commande";
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
    //////////////////////////////////////////////////////////////////////////////////////
    public function listcommandechercher($idservice)
    {
        $sql = "SELECT * FROM commande WHERE idservice = :idservice";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->bindValue(':idservice', $idservice);
            $query->execute();
            $liste = $query->fetchAll();
            return $liste;
        }
        catch(Exception $e)
        {
            die('Error: ' . $e->getMessage());
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////
    public function deletecommande($idc)
    {
        $sql="DELETE FROM commande WHERE idc = :idc";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->bindValue(':idc',$idc);

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
    ///////////////////////////////////////////////////////////////////////////////////
    public function updatecommande($idc,$idservice,$date_c,$statut_c,$montant_c)
    {
        $sql="UPDATE  commande SET idc=:idcc, idservice=:idservicee, date_c=:date_cc, statut_c=:statut_cc, montant_c=:montant_cc WHERE idc=:idcc";
        $db = config::getConnexion();
            $query = $db->prepare($sql);
    
            $query->bindValue(':idcc',$idc);
            $query->bindValue(':idservicee',$idservice);
            $query->bindValue(':date_cc',$date_c);
            $query->bindValue(':statut_cc',$statut_c);
            $query->bindValue(':montant_cc',$montant_c);
        try
        {
            $query->execute();
        }
        catch(Exception $e)
        {
            die('Error:' .$e->getMessage());
        }
    }
    ////////////////////////////////////////////////////////////////////////////
    public function rechercherCommandeParIdService($idservice)
    {
        $sql = "SELECT * FROM commande WHERE idservice = :idservice";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':idservice', $idservice);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



}
?>