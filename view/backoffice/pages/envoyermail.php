<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "C:/xampp/htdocs/ProjetWebQH/controller/AbonnementController.php";

// Inclusion des fichiers nécessaires pour PHPMailer
require 'C:/xampp/htdocs/ProjetWebQH/view/frontoffice/src/PHPMailer.php';
require 'C:/xampp/htdocs/ProjetWebQH/view/frontoffice/src/SMTP.php';
require 'C:/xampp/htdocs/ProjetWebQH/view/frontoffice/src/Exception.php';

// Récupération des données du formulaire
$sujet = $_POST['titres69'];
$contenu = $_POST['contenus69'];

function validateSujet($sujet) {
    return (strlen($sujet) >= 10 && ucfirst($sujet) === $sujet);
}

// Fonction pour valider le format du contenu
function validateContenu($contenu) {
    return (strlen($contenu) >= 20 && ucfirst($contenu) === $contenu && strpos($contenu, ' ') !== false);
}

if (!validateSujet($sujet)) {
    echo "<script>alert('Le sujet doit commencer par une majuscule et contenir au moins 10 caractères.'); window.location.href = 'gestion_des_articles.php';</script>";
    exit();
}

if (!validateContenu($contenu)) {
    echo "<script>alert('Le contenu doit commencer par une majuscule, contenir au moins un espace et avoir au moins 20 caractères.'); window.location.href = 'gestion_des_articles.php';</script>";
    exit();
}

// Récupération des adresses e-mail des abonnés depuis la base de données
$pdo = config::getConnexion();
$query_select_emails = "SELECT email_ab FROM ABONNEMENT WHERE token = 1";
$stmt_select_emails = $pdo->prepare($query_select_emails);
$stmt_select_emails->execute();
$emails_abonnes = $stmt_select_emails->fetchAll(PDO::FETCH_COLUMN);

// Envoi de l'e-mail à chaque abonné
$mail = new PHPMailer(true); 
try {
    $mail->isSMTP(); 
    $mail->Host = 'smtp.office365.com'; 
    $mail->SMTPAuth = true; 
    $mail->Username = 'quickhire50@outlook.com'; 
    $mail->Password = '@2$4_6(8=0.Com'; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587; 

    foreach ($emails_abonnes as $email_abonne) {
        $mail->clearAddresses(); // Efface les adresses précédentes
        $mail->addAddress($email_abonne); // Ajoute l'adresse de l'abonné
        $mail->setFrom('quickhire50@outlook.com', 'QuickHire');
        $mail->isHTML(true); 
        $mail->Subject = $sujet;
        $mail->Body = $contenu;
        $mail->send();
    }

    echo "E-mails envoyés avec succès à tous les abonnés.";
} catch (Exception $e) {
    echo "Erreur lors de l'envoi des e-mails : {$mail->ErrorInfo}";
}
header('Location: gestion_des_articles.php');
    exit();
?>
