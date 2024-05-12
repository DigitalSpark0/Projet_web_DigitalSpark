<?php
include "C:/xampp/htdocs/projet web integration/controller/ArticleController.php";

$id2 = isset($_POST["id1s"]) ? $_POST["id1s"] : 'erreur';
$titre2 = isset($_POST["titres1"]) ? $_POST["titres1"] : 'erreur';
$contenu2 = isset($_POST["contenus1"]) ? $_POST["contenus1"] : 'erreur';
$auteur2 = isset($_POST["auteurs1"]) ? $_POST["auteurs1"] : 'erreur';
$categorie2 = isset($_POST["categories1"]) ? $_POST["categories1"] : 'erreur';
$video2 = isset($_POST["videos1"]) ? $_POST["videos1"] : 'erreur';
$datep2 = date("Y-m-d H:i:s");


function convertToEmbedLink($youtubeLink) {
    
    $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

    
    if (preg_match($pattern, $youtubeLink, $matches)) {
        $videoId = $matches[1];
        
        $embedLink = "https://www.youtube.com/embed/$videoId";
        return $embedLink;
    } else {
        return false; 
    }
}

$videoEmbedLink1 = convertToEmbedLink($video2);

function validerTitre($titre2) {
    return (strlen($titre2) >= 10 && ctype_upper(substr($titre2, 0, 1)));
}


function validerContenu($contenu) {
    return ctype_upper(substr(trim($contenu), 0, 1)) && strpos($contenu, ' ') !== false && substr(trim($contenu), -1) === '.' && strlen(trim($contenu)) >= 20;
}



function validerAuteur($auteur) {
    return ctype_alpha($auteur) && ctype_upper(substr($auteur, 0, 1));
}

function validerVideo($video) {
    return strpos($video, 'https://') === 0;
}

$imageData1 = null;
$image1 = isset($_FILES["image2"]) ? $_FILES["image2"] : null;

if ($image1 && $image1['error'] === UPLOAD_ERR_OK) {
    $imageData1 = file_get_contents($image1['tmp_name']);
    $imageData1 = base64_encode($imageData1); 
} else {
   
    $imageData1 = null;
}


$erreurs = [];
if (!validerTitre($titre2)) {
    $erreurs[] = "Le titre doit commencer par une majuscule et contenir au moins 10 caractères.";
}
if (!validerContenu($contenu2)) {
    $erreurs[] = "Le contenu doit avoir au minimum 20 caractéres ,commencer par une majuscule, contenir au moins un espace et se terminer par un point.";
}
if (!validerAuteur($auteur2)) {
    $erreurs[] = "L'auteur doit contenir seulement des caractères alphabétiques et commencer par une majuscule.";
}
if (!validerVideo($videoEmbedLink1)) {
    $erreurs[] = "Le lien de la vidéo doit commencer par 'https://'.";
}

if (!empty($erreurs)) {
    foreach ($erreurs as $erreur) {
        echo "<script>alert('$erreur'); window.location.href = 'gestion_des_articles.php';</script>";
        exit(); 
    }
} else {
    $articleC1 = new ArticleController();
    $articleC1->updatearticle($id2, $titre2, $contenu2, $auteur2, $datep2, $imageData1, $categorie2, $videoEmbedLink1);

    
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

