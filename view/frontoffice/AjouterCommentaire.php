<?php


include "C:/xampp/htdocs/ProjetWebQH/controller/CommentaireController.php";
   
$id0000 = isset($_POST["id000"])?$_POST["id000"]:'erreur';
$auteur = isset($_POST["name"])?$_POST["name"]:'erreur';
$contenu = isset($_POST["comment"])?$_POST["comment"]:'erreur';
$date = date("Y-m-d H:i:s");

/*function validerAuteur($auteur) {
    return is_numeric($auteur) && $auteur >= 1 && $auteur <= 999;
}*/

/*function validerAuteur($auteur) {
    
    return preg_match('/^[A-Z][a-z]* [A-Z][a-z]*$/', $auteur);
}*/



function validerContenu($contenu) {
    return ctype_upper(substr(trim($contenu), 0, 1)) && strpos($contenu, ' ') !== false;
}



$erreurs = [];
/*if (!validerAuteur($auteur)) {
    $erreurs[] = "L' identifiant doit etre un nombre non nul et entre 1 et 999";
}*/
if (!validerContenu($contenu)) {
    $erreurs[] = "Le contenu doit commencer par une majuscule et contenir au moins un espace.";
}



if (!empty($erreurs)) {
    foreach ($erreurs as $erreur) {
        echo "<script>alert('$erreur'); window.location.href = 'single-blog.php?id0=" . urlencode($id0000) . "';</script>";
        exit(); 
    }
} else {
    
    $commentaire = new Commentaire($id0000, $auteur, $contenu, $date);
    $commentaireC = new CommentaireController();
    $commentaireC->addcommentaire($commentaire);

    
    header('Location: single-blog.php?id0=' . urlencode($id0000));

    exit(); 
}

    
   

    ?>