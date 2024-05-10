<?php
if (!class_exists('config')) {
    include "C:/xampp/htdocs/projet web integration/config.php";
 }

include "C:/xampp/htdocs/projet web integration/model/Article.php";

class ArticleController
{
    public function addarticle($Article)
    {
        $pdo =config::getConnexion ();
        try{
            $query = "INSERT INTO ARTICLE (titre_a, contenu_a, auteur_a, date_p, image_a, categorie_a, video_a) 
            VALUES (:titre_a, :contenu_a, :auteur_a, :date_p, :image_a, :categorie_a, :video_a)";
  $stmt = $pdo->prepare($query);

  $stmt->execute([

                'titre_a'=>$Article->gettitre_a(),
                'contenu_a'=>$Article->getcontenu_a(),
                'auteur_a'=>$Article->getauteur_a(),
                'date_p'=>$Article->getdate_p(),
                'image_a'=>$Article->getimage_a(),
                'categorie_a'=>$Article->getcategorie_a(),
                'video_a'=>$Article->getvideo_a(),
                
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

public function updatearticle ($id1,$titre1,$contenu1,$auteur1,$date1,$image1,$categorie1,$video1)
{
    $sql ="UPDATE ARTICLE SET titre_a= :Titre, contenu_a = :Contenu, auteur_a = :Auteur,date_p = :Date1,image_a = :Image1,categorie_a = :cat1,video_a = :vid1 WHERE id_a = :id1"; 
    $pdo =config::getConnexion ();

    $query =$pdo ->prepare($sql);
    $query ->bindValue (':id1',$id1);
    $query ->bindValue (':Titre',$titre1);
    $query ->bindValue (':Contenu',$contenu1);
    $query ->bindValue (':Auteur',$auteur1);
    $query ->bindValue (':Date1',$date1);
    $query ->bindValue (':Image1',$image1);
    $query ->bindValue (':cat1',$categorie1);
    $query ->bindValue (':vid1',$video1);
    try{
        $query ->execute();
        

    }catch (PDOException $e)
    {
        $e ->getMessage();
    }
}

public function generatePDF() {
    require_once('../tcpdf/tcpdf.php'); 

    $articles = $this->listArticles(); 

    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('DigitalSpark-Gestion des articles');
    $pdf->SetTitle('Liste des articles');
    $pdf->SetSubject('Liste des articles générée depuis votre site web');
    $pdf->SetKeywords('PDF, articles, liste');

    $pdf->SetFont('helvetica', '', 11);
    $pdf->AddPage();

    $content = '<h1>Liste des articles</h1><br>';
    $content .= '<table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Contenu</th>
                        <th>Auteur</th>
                        <th>Date de publication</th>
                        <th>Catégorie</th>
                    </tr>';

    foreach ($articles as $article) {
        $content .= '<tr>
                        <td>'.$article['id_a'].'</td>
                        <td>'.$article['titre_a'].'</td>
                        <td>'.$article['contenu_a'].'</td>
                        <td>'.$article['auteur_a'].'</td>
                        <td>'.$article['date_p'].'</td>
                        <td>'.$article['categorie_a'].'</td>
                    </tr>';
    }

    $content .= '</table>';

    $pdf->writeHTML($content, true, false, true, false, '');
    $pdf->Output('liste_articles.pdf', 'D');
}

public function listArticlesSortedByTitle() {
    $sql = "SELECT * FROM ARTICLE ORDER BY titre_a ASC";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('error:'.$e->getMessage());
    }
}

public function listRecentArticles() {
    $sql = "SELECT * FROM ARTICLE ORDER BY date_p DESC LIMIT 5";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('error:'.$e->getMessage());
    }
}

public function getCategoryStatistics() {
    $pdo = config::getConnexion();
    $sql = "SELECT categorie_a, COUNT(*) AS count FROM ARTICLE GROUP BY categorie_a";
    try {
        $stmt = $pdo->query($sql);
        $statistics = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $statistics;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

public function getPreviousArticleId($currentArticleId) {
    $sql = "SELECT id_a FROM ARTICLE WHERE id_a < :currentArticleId ORDER BY id_a DESC LIMIT 1";
    $pdo = config::getConnexion();
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':currentArticleId', $currentArticleId);
    $stmt->execute();
    $previousArticleId = $stmt->fetchColumn();
    return $previousArticleId;
}

public function getNextArticleId($currentArticleId) {
    $sql = "SELECT id_a FROM ARTICLE WHERE id_a > :currentArticleId ORDER BY id_a ASC LIMIT 1";
    $pdo = config::getConnexion();
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':currentArticleId', $currentArticleId);
    $stmt->execute();
    $nextArticleId = $stmt->fetchColumn();
    return $nextArticleId;
}

}



?>