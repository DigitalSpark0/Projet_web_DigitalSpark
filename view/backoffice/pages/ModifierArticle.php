<?php
include "C:/xampp/htdocs/ProjetWebQH/controller/ArticleController.php";

$id2 = isset($_POST["id1s"]) ? $_POST["id1s"] : 'erreur';
$titre2 = isset($_POST["titres1"]) ? $_POST["titres1"] : 'erreur';
$contenu2 = isset($_POST["contenus1"]) ? $_POST["contenus1"] : 'erreur';
$auteur2 = isset($_POST["auteurs1"]) ? $_POST["auteurs1"] : 'erreur';
$datep2 = date("Y-m-d H:i:s");


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
if (!validerTitre($titre2)) {
    $erreurs[] = "Le titre doit commencer par une majuscule et contenir au moins 10 caractères.";
}
if (!validerContenu($contenu2)) {
    $erreurs[] = "Le contenu doit commencer par une majuscule, contenir au moins un espace et se terminer par un point.";
}
if (!validerAuteur($auteur2)) {
    $erreurs[] = "L'auteur doit contenir seulement des caractères alphabétiques et commencer par une majuscule.";
}


if (!empty($erreurs)) {
    foreach ($erreurs as $erreur) {
        echo "<script>alert('$erreur'); window.location.href = 'gestion_des_articles.php';</script>";
        exit(); 
    }
} else {
    $articleC1 = new ArticleController();
    $articleC1->updatearticle($id2, $titre2, $contenu2, $auteur2, $datep2);

    
    header('Location: gestion_des_articles.php');
    exit(); 
}
?>

<?php/*
include "C:/xampp/htdocs/ProjetWebQH/controller/ArticleController.php";

$id2 = isset($_POST["id1s"]) ? $_POST["id1s"] : 'erreur';
$titre2 = isset($_POST["titres1"]) ? $_POST["titres1"] : 'erreur';
$contenu2 = isset($_POST["contenus1"]) ? $_POST["contenus1"] : 'erreur';
$auteur2 = isset($_POST["auteurs1"]) ? $_POST["auteurs1"] : 'erreur';
$datep2 = date("Y-m-d H:i:s");


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
if (!validerTitre($titre2)) {
    $erreurs[] = "Le titre doit commencer par une majuscule et contenir au moins 10 caractères.";
}
if (!validerContenu($contenu2)) {
    $erreurs[] = "Le contenu doit commencer par une majuscule, contenir au moins un espace et se terminer par un point.";
}
if (!validerAuteur($auteur2)) {
    $erreurs[] = "L'auteur doit contenir seulement des caractères alphabétiques et commencer par une majuscule.";
}


if (!empty($erreurs)) {
    echo "<script>";
    echo "var message = '" . implode("\\n", $erreurs) . "';";
    echo "alert(message);";
    echo "window.history.back();"; // Revenir en arrière pour conserver les données du formulaire
    echo "</script>";
    exit(); 
} else {
    $articleC1 = new ArticleController();
    $articleC1->updatearticle($id2, $titre2, $contenu2, $auteur2, $datep2);

    
    header('Location: gestion_des_articles.php');
    exit(); 
}
*/?>

