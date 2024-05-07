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
        $this->updateCommentCount($Commentaire->getid_ar());
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
        
        /*public function deletecommentaire($id_c)
{
    $sql = "DELETE FROM COMMENTAIRE WHERE id_c = :id_c"; 
    $pdo = config::getConnexion();
    
    $query = $pdo->prepare($sql);
    $query->bindValue(':id_c', $id_c);
    
    try {
        $query->execute();
        $this->updateCommentCount($comment['id_ar']);
    } catch (PDOException $e) {
        echo $e->getMessage(); 
    }
}*/

public function deleteCommentaire($id_c)
    {
        $pdo = config::getConnexion();
        $comment = $this->getComment($id_c);
        if ($comment) {
            $sql = "DELETE FROM COMMENTAIRE WHERE id_c = :id_c";
            $query = $pdo->prepare($sql);
            $query->bindValue(':id_c', $id_c);
            try {
                $query->execute();
                // Mettre à jour le nombre total de commentaires pour l'article
                $this->updateCommentCount($comment['id_ar']);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
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

public function generatePDF() {
    require_once('../tcpdf/tcpdf.php'); 

    $commentaires = $this->listCommentaires1(); 

    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('DigitalSpark-Gestion des articles');
    $pdf->SetTitle('Liste des articles');
    $pdf->SetSubject('Liste des commentaires générée depuis votre site web');
    $pdf->SetKeywords('PDF, commentaires, liste');

    $pdf->SetFont('helvetica', '', 11);
    $pdf->AddPage();

    $content = '<h1>Liste des commentaires</h1><br>';
    $content .= '<table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Article</th>
                        <th>Auteur</th>
                        <th>Contenu</th>
                        <th>Date</th>
                    </tr>';

    foreach ($commentaires as $commentaire) {
        $content .= '<tr>
                        <td>'.$commentaire['id_c'].'</td>
                        <td>'.$commentaire['id_ar'].'</td>
                        <td>'.$commentaire['id_ut'].'</td>
                        <td>'.$commentaire['contenu_c'].'</td>
                        <td>'.$commentaire['date_c'].'</td>
                    </tr>';
    }

    $content .= '</table>';

    $pdf->writeHTML($content, true, false, true, false, '');
    $pdf->Output('liste_commentaires.pdf', 'D');
}

public function listCommentairesSortedByid() {
    $sql = "SELECT * FROM COMMENTAIRE ORDER BY id_ut ASC";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('error:'.$e->getMessage());
    }
}

public function countCommentaires($id_ar)
    {
        $pdo = config::getConnexion();
        $sql = "SELECT COUNT(*) AS total FROM COMMENTAIRE WHERE id_ar = :id_ar";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_ar', $id_ar);
            $stmt->execute();
            $count = $stmt->fetch(PDO::FETCH_ASSOC);
            return $count['total'];
        } catch (PDOException $e) {
            die('error:' . $e->getMessage());
        }
    }

    // Méthode pour mettre à jour le nombre total de commentaires pour un article
    private function updateCommentCount($id_ar)
    {
        $count = $this->countCommentaires($id_ar);
        $pdo = config::getConnexion();
        $sql = "UPDATE ARTICLE SET nombre_commentaires = :count WHERE id_ar = :id_ar";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'count' => $count,
                'id_ar' => $id_ar
            ]);
        } catch (PDOException $e) {
            echo "Erreur de mise à jour du nombre de commentaires : " . $e->getMessage();
        }
    }

    // Méthode pour obtenir un commentaire par son ID
    private function getComment($id_c)
    {
        $pdo = config::getConnexion();
        $sql = "SELECT * FROM COMMENTAIRE WHERE id_c = :id_c";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_c', $id_c);
            $stmt->execute();
            $comment = $stmt->fetch(PDO::FETCH_ASSOC);
            return $comment;
        } catch (PDOException $e) {
            echo "Erreur de récupération du commentaire : " . $e->getMessage();
        }
    }

}



?>