<?php

if (!class_exists('config')) {
    include "C:/xampp/htdocs/ProjetWebQH/config.php";
 }

include "C:/xampp/htdocs/ProjetWebQH/model/Commentaire.php";
class CommentaireController
{
    public function addCommentaire($Commentaire)
{
    $pdo = config::getConnexion();
    try {
        $query = "INSERT INTO COMMENTAIRE (id_ar, id_ut, contenu_c, date_c) 
                  VALUES (:id_ar, :id_ut, :contenu_c, :date_c)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'id_ar' => $Commentaire->getid_ar(),
            'id_ut' => $Commentaire->getid_ut(),
            'contenu_c' => $Commentaire->getcontenu_c(),
            'date_c' => $Commentaire->getdate_c()
        ]);
    } catch (PDOException $e) {
        echo "Erreur d'insertion : " . $e->getMessage();
    }
}


        public function listCommentaires($id_ar){
            $sql = "SELECT * FROM COMMENTAIRE WHERE id_ar = :id_ar";
            $db = config::getConnexion();
            try{
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id_ar', $id_ar);
                $stmt->execute();
                $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $liste;
            } catch (PDOException $e){
                die('error:'.$e->getMessage());
            }
        }

        public function listCommentaires1(){
            $sql = "SELECT * FROM COMMENTAIRE";
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
        
        public function deletecommentaire($id_c)
{
    $sql = "DELETE FROM COMMENTAIRE WHERE id_c = :id_c"; 
    $pdo = config::getConnexion();
    
    $query = $pdo->prepare($sql);
    $query->bindValue(':id_c', $id_c);
    
    try {
        $query->execute();
    } catch (PDOException $e) {
        echo $e->getMessage(); 
    }
}

public function updatecommentaire ($id4,$contenu4,$date4)
{
    $sql ="UPDATE COMMENTAIRE SET contenu_c = :Contenu, date_c = :Date1 WHERE id_c = :id4"; 
    $pdo =config::getConnexion ();

    $query =$pdo ->prepare($sql);
    $query ->bindValue (':id4',$id4);
    $query ->bindValue (':Contenu',$contenu4);
    $query ->bindValue (':Date1',$date4);
    

    try{
        $query ->execute();
        

    }catch (PDOException $e)
    {
        $e ->getMessage();
    }
}

}



?>