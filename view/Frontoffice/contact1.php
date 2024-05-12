<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
include "C:/xampp/htdocs/projet web integration/controller/reclamationsC.php";

session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['user_id'])) {
    // Récupérer les données du formulaire
    $sujet = isset($_POST["sujet1"]) ? $_POST["sujet1"] : 'erreur';
    $description = isset($_POST["description1"]) ? $_POST["description1"] : 'erreur';
    
    // Créer un nouvel objet de réclamation avec les données du formulaire
    $reclamation = new reclamations($sujet, $description);
    
    // Ajouter la réclamation avec l'`user_id` de l'utilisateur connecté
    $reclamationC1 = new reclamationsC();
    $reclamationC1->addreclamation($reclamation, $_SESSION['user_id']);
    
    // Envoyer l'email
    $mail = new PHPMailer(true);
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bensalem.lina@esprit.tn';
    $mail->Password = 'huve fwvq mijv yvke';
    
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('bensalem.lina@esprit.tn'); // Votre email
    $mail->addAddress($_POST["email"]);
    $mail->isHTML(true);
    $mail->Subject = 'Vous venez denvoyer une reclamation au sujet de : '. $_POST["sujet1"];
    $mail->Body = 'Le contenu de votre reclamation : '. $_POST["description1"];
    
    if($mail->send()) {
        echo "<script>alert('Sent Successfully');document.location.href = 'contact.php';</script>";
    } else {
        echo "<script>alert('Error in sending email');</script>";
    }
} else {
    // Redirection vers la page de connexion ou d'accueil si l'utilisateur n'est pas connecté
    header('Location: contact.php');
}
?>
