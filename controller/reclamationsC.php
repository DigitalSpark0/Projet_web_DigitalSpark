<?php
include "C:/xampp/htdocs/GestionDesReclamation/model/reclamationsM.php";
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
        $sql="DELETE  FROM reclamations WHERE idr = :idr";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->bindValue(':idr',$idr);

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
    /////////////////////////////////////////////
    public function addreclamation($reclamation)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare(
                "INSERT INTO reclamations (sujet, description)
                VALUES (:sujet, :description)"
            );
    
            $query->execute([
                'sujet' => $reclamation->getsujet(),
                'description' => $reclamation->getdescription(),
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
}

?>