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
    public function deletereponses($idr)
    {
        $sql="DELETE  FROM reclamations WHERE idrep = :idrep";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->bindValue(':idrep',$idr);

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
    public function addrreponses($reponse)
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
    }
    ///////////////////////////////////////////////
    public function update($idrep3,$contenu3,$daterep3)
    {
        $sql="UPDATE  reponses SET sujet=:sujet2, contenu=:contenu2, daterep=:daterep2 WHERE idrep=:idrep";
        $db = config::getConnexion();
            $query = $db->prepare($sql);
    
            $query->bindValue(':idrep2',$idrep3);
            $query->bindValue(':contenu2',$contenu3);
            $query->bindValue(':daterep2',$daterep3);
           
            
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