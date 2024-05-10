<?php
include "C:/xampp/htdocs/projet web integration/controller/CommentaireController.php";

$id4 = isset($_POST["id010"])?$_POST["id010"]:'erreur';
$id3 = isset($_POST["idh"])?$_POST["idh"]:'erreur';
$contenu3 = isset($_POST["comment1"])?$_POST["comment1"]:'erreur';
$datep3 = date("Y-m-d H:i:s");





function validerAuteur($auteur) {
    return is_numeric($auteur) && $auteur >= 1 && $auteur <= 999;
}


function validerContenu($contenu) {
    return ctype_upper(substr(trim($contenu), 0, 1)) && strpos($contenu, ' ') !== false;
}



$erreurs = [];
if (!validerAuteur($id3)) {
    $erreurs[] = "L' identifiant doit etre un nombre non nul et entre 1 et 999";
}
if (!validerContenu($contenu3)) {
    $erreurs[] = "Le contenu doit commencer par une majuscule et contenir au moins un espace.";
}



if (!empty($erreurs)) {
    foreach ($erreurs as $erreur) {
        echo "<script>alert('$erreur'); window.location.href = 'single-blog.php?id0=" . urlencode($id4) . "';</script>";
        exit(); 
    }
} else {
    
    $commentaireC1=new CommentaireController();
$commentaireC1 ->updatecommentaire($id3,$contenu3,$datep3); 

header('Location: single-blog.php?id0=' . urlencode($id4));

    exit(); 
}

?> 