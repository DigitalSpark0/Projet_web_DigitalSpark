<?php
require_once 'C:\xampp\htdocs\projet web integration\controller\candiController.php';
require_once 'C:\xampp\htdocs\projet web integration\model\candidature.php';

// Vérifier si tous les champs sont remplis
if(empty($_POST["id_offre"]) || empty($_POST["date_candidature"]) || empty($_FILES["cv"]["name"]) || empty($_POST["disponibilite"])) {
    echo "Tous les champs doivent être remplis.";
    exit; // Arrêter l'exécution du script si des champs sont vides
}

// Récupérer les données du formulaire
$id_offre = $_POST["id_offre"];
$date_candidature = $_POST["date_candidature"];
$disponibilite = $_POST["disponibilite"];

// Récupérer le nom du fichier CV et son emplacement temporaire
$cv = $_FILES["cv"]["name"];
$cv_temp = $_FILES["cv"]["tmp_name"];

// Vérifier si la date de candidature est au format ../../....
if(!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $date_candidature)) {
    echo "Le format de la date de candidature n'est pas valide. Utilisez le format jj/mm/aaaa.";
    exit; // Arrêter l'exécution du script si le format de la date n'est pas valide
}

// Extraire les composants de la date (jour, mois, année)
list($day, $month, $year) = explode('/', $date_candidature);

// Vérifier si le mois est inférieur ou égal à 12
if($month < 1 || $month > 12) {
    echo "Le mois de la date de candidature doit être compris entre 1 et 12.";
    exit;
}

// Vérifier si le jour est inférieur ou égal à 31
if($day < 1 || $day > 31) {
    echo "Le jour de la date de candidature doit être compris entre 1 et 31.";
    exit;
}

// Vérifier si l'année est inférieure ou égale à 2024
if($year > 2024) {
    echo "L'année de la date de candidature ne peut pas être supérieure à 2024.";
    exit;
}

// Vérifier si la date de candidature est inférieure ou égale à la date actuelle
if(strtotime($date_candidature) > strtotime(date("d/m/Y"))) {
    echo "La date de candidature ne peut pas être supérieure à la date d'aujourd'hui.";
    exit; // Arrêter l'exécution du script si la date de candidature est future
}

// Définir le chemin où enregistrer le fichier CV
$upload_dir = "C:\\Users\\21652\\Desktop\\"; // Chemin absolu vers le dossier de destination, par exemple, le bureau

// Déplacer le fichier CV vers un emplacement permanent
if(move_uploaded_file($cv_temp, $upload_dir . $cv)) {
    // Créer un nouvel objet candidature avec les données du formulaire
    $candidatures = new candidatures($id_offre, $date_candidature, $cv, $disponibilite);

    // Instancier le contrôleur de candidatures et appeler la méthode pour ajouter une candidature
    $candiC = new candiController();
    $candiC->ajouterCand($candidatures);

    // Redirection vers la page contact.php après l'ajout de la candidature
    header('Location: offre.php');
} else {
    echo "Une erreur s'est produite lors de l'enregistrement du CV.";
}
?>
