<?php
// Assurez-vous d'inclure le fichier qui contient la définition de la classe offre et offreController
require_once "C:/xampp/htdocs/projet web(gestion services)/controller/offreController.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Crée une instance de la classe offreController
$offreController = new offreController();

// Vérifie si la méthode de requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie si toutes les données nécessaires sont fournies dans le formulaire
    if (isset($_POST["id_offre"], $_POST["titre"], $_POST["statut"], $_POST["entreprise"], $_POST["date_pub"], $_POST["description"])) {
        // Crée une instance de la classe offre avec les données du formulaire
        $offre = new offre(
            $_POST['id_offre'],
            $_POST['titre'], 
            $_POST['statut'], 
            $_POST['entreprise'],
            $_POST['date_pub'],
            $_POST['description']
        );

        // Appelle la méthode updateoffre avec l'instance de l'offre
        $offreController->updateoffre($offre);
        
        // Redirige vers la page de gestion_des_services après la modification
        header('Location: gestion_des_services.php');
        exit(); // Ajout de l'instruction exit() après la redirection pour éviter tout code exécution ultérieur
    } else {
        $error = "Missing information";
    }
} else {
    $error = "Invalid request.";
}

// Affiche un message d'erreur s'il y a lieu
echo $error;
?>
