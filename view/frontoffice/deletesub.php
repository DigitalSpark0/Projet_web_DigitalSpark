<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclusion des fichiers PHPMailer et la configuration nécessaire
include "C:/xampp/htdocs/ProjetWebQH/controller/AbonnementController.php";
require 'C:/xampp/htdocs/ProjetWebQH/view/frontoffice/src/PHPMailer.php';
require 'C:/xampp/htdocs/ProjetWebQH/view/frontoffice/src/SMTP.php';
require 'C:/xampp/htdocs/ProjetWebQH/view/frontoffice/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération de l'adresse e-mail saisie dans le formulaire
    $email = isset($_POST["email1"]) ? $_POST["email1"] : '';

    // Vérification si l'adresse e-mail existe dans la base de données
    $pdo = config::getConnexion();
    $query_check = "SELECT COUNT(*) AS count FROM ABONNEMENT WHERE email_ab = :email_ab";
    $stmt_check = $pdo->prepare($query_check);
    $stmt_check->bindParam(':email_ab', $email);
    $stmt_check->execute();
    $result_check = $stmt_check->fetch(PDO::FETCH_ASSOC);

    // Si l'adresse e-mail existe, supprimer l'abonnement associé
    if ($result_check['count'] > 0) {
        // Suppression de l'abonnement de la base de données
        $abonnementC = new AbonnementController();
        $abonnementC->deleteabonnement($email);

        // Envoi de l'e-mail de confirmation du désabonnement
        $mail = new PHPMailer(true); 
        try {
            $mail->isSMTP(); 
            $mail->Host = 'smtp.office365.com'; 
            $mail->SMTPAuth = true; 
            $mail->Username = 'quickhire50@outlook.com'; 
            $mail->Password = '@2$4_6(8=0.Com'; 
            $mail->SMTPSecure = 'tls'; 
            $mail->Port = 587; 

            $mail->setFrom('quickhire50@outlook.com', 'QuickHire');
            $mail->addAddress($email); 

            $mail->isHTML(true); 
            $mail->Subject = 'Confirmation de désabonnement de la newsletter';
            $mail->Body = '
            <div style="background-color: #f4f4f4; padding: 20px;">
                <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 40px; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
                    <h2 style="color: #333333;">Confirmation de désabonnement de la newsletter</h2>
                    <p style="font-size: 16px; color: #666666;">Vous avez été désabonné de notre newsletter avec succès.</p>
                </div>
            </div>
            ';
            $mail->CharSet = 'UTF-8';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();

            // Redirection vers la page d'origine (blog.php) avec un message de confirmation
            header('Location: blog.php?unsubscribe=success');
            exit();
        } catch (Exception $e) {
            // En cas d'erreur lors de l'envoi de l'e-mail
            // Redirection vers la page d'origine (blog.php) avec un message d'erreur
            header('Location: blog.php?unsubscribe=error');
            exit();
        }
    } else {
        // Redirection vers la page d'origine (blog.php) avec un message d'erreur
        header('Location: blog.php?unsubscribe=notfound');
        exit();
    }
}
?>
