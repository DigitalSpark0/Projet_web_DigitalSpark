<?php
if (!class_exists('config')) {
    include "C:/xampp/htdocs/ProjetWebQH/config.php";
 }

include "C:/xampp/htdocs/ProjetWebQH/model/Article.php";

class ArticleController
{
    public function addarticle($Article)
    {
        $pdo =config::getConnexion ();
        try{
            $query = "INSERT INTO ARTICLE (titre_a, contenu_a, auteur_a, date_p, image_a) 
            VALUES (:titre_a, :contenu_a, :auteur_a, :date_p, :image_a)";
  $stmt = $pdo->prepare($query);

  $stmt->execute([

                'titre_a'=>$Article->gettitre_a(),
                'contenu_a'=>$Article->getcontenu_a(),
                'auteur_a'=>$Article->getauteur_a(),
                'date_p'=>$Article->getdate_p(),
                'image_a'=>$Article->getimage_a(),
                
            ]);

        } catch (PDOException $e)
        {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
         }

         public function listArticles(){
            $sql = "SELECT * FROM ARTICLE";
            $db = config::getConnexion();
            try{
                $liste = $db -> query($sql);
                return $liste;
            }catch (Exception $e){
                die('error:'.$e->getMessage());
            }
        }

        public function listArticles1($id_a){
            $sql = "SELECT * FROM ARTICLE WHERE id_a = $id_a";
            $db = config::getConnexion();
            try{
                $liste = $db -> query($sql);
                return $liste;
            }catch (Exception $e){
                die('error:'.$e->getMessage());
            }
        }

        /*public function deletearticle($id_a)
{
    $sql ="DELETE FROM ARTICLE WHERE id_a = :id_a"; 
    $pdo =config::getConnexion ();

    $query =$pdo ->prepare($sql);
    $query ->bindValue (':id_a',$id_a);

    try{
        $query ->execute();
        

    }catch (PDOException $e)
    {
        $e ->getMessage();
    }
}*/

public function deletearticle($id_a)
{
    $sql = "DELETE ARTICLE, COMMENTAIRE 
            FROM ARTICLE 
            LEFT JOIN COMMENTAIRE ON ARTICLE.id_a = COMMENTAIRE.id_ar
            WHERE ARTICLE.id_a = :id_a"; 

    $pdo = config::getConnexion ();

    $query = $pdo->prepare($sql);
    $query->bindValue(':id_a', $id_a);

    try {
        $query->execute();
    } catch (PDOException $e) {
        echo $e->getMessage(); 
    }
}

public function updatearticle ($id1,$titre1,$contenu1,$auteur1,$date1,$image1)
{
    $sql ="UPDATE ARTICLE SET titre_a= :Titre, contenu_a = :Contenu, auteur_a = :Auteur,date_p = :Date1,image_a = :Image1 WHERE id_a = :id1"; 
    $pdo =config::getConnexion ();

    $query =$pdo ->prepare($sql);
    $query ->bindValue (':id1',$id1);
    $query ->bindValue (':Titre',$titre1);
    $query ->bindValue (':Contenu',$contenu1);
    $query ->bindValue (':Auteur',$auteur1);
    $query ->bindValue (':Date1',$date1);
    $query ->bindValue (':Image1',$image1);

    try{
        $query ->execute();
        

    }catch (PDOException $e)
    {
        $e ->getMessage();
    }
}


}



?>