<?php
include "C:/xampp/htdocs/ProjetWebQH/controller/ArticleController.php";


$titre = isset($_POST["titres"]) ? $_POST["titres"] : 'erreur';
$contenu = isset($_POST["contenus"]) ? $_POST["contenus"] : 'erreur';
$auteur = isset($_POST["auteurs"]) ? $_POST["auteurs"] : 'erreur';
$date = date("Y-m-d H:i:s"); 


function validerTitre($titre) {
    return (strlen($titre) >= 10 && ctype_upper(substr($titre, 0, 1)));
}

function validerContenu($contenu) {
    return ctype_upper(substr(trim($contenu), 0, 1)) && strpos($contenu, ' ') !== false && substr(trim($contenu), -1) === '.';
}


function validerAuteur($auteur) {
    return ctype_alpha($auteur) && ctype_upper(substr($auteur, 0, 1));
}


$erreurs = [];
if (!validerTitre($titre)) {
    $erreurs[] = "Le titre doit commencer par une majuscule et contenir au moins 10 caractères.";
}
if (!validerContenu($contenu)) {
    $erreurs[] = "Le contenu doit commencer par une majuscule, contenir au moins un espace et se terminer par un point.";
}
if (!validerAuteur($auteur)) {
    $erreurs[] = "L'auteur doit contenir seulement des caractères alphabétiques et commencer par une majuscule.";
}


if (!empty($erreurs)) {
    foreach ($erreurs as $erreur) {
        echo "<script>alert('$erreur'); window.location.href = 'gestion_des_articles.php';</script>";
        exit(); 
    }
} else {
    
    $article = new Article($titre, $contenu, $auteur, $date);
    $articleC = new ArticleController();
    $articleC->addarticle($article);

    
    header('Location: gestion_des_articles.php');
    exit(); 
}
?>
