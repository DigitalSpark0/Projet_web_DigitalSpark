<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclusion des classes PHPMailer
include "C:/xampp/htdocs/ProjetWebQH/controller/AbonnementController.php";
require 'C:/xampp/htdocs/ProjetWebQH/view/frontoffice/src/PHPMailer.php';
require 'C:/xampp/htdocs/ProjetWebQH/view/frontoffice/src/SMTP.php';
require 'C:/xampp/htdocs/ProjetWebQH/view/frontoffice/src/Exception.php';

// Création d'une nouvelle instance de PHPMailer
$mail = new PHPMailer(true); 

try {
    // Configuration du serveur SMTP
    $mail->isSMTP(); 
    $mail->Host = 'smtp.office365.com'; 
    $mail->SMTPAuth = true; 
    $mail->Username = 'quickhire50@outlook.com'; 
    $mail->Password = '@2$4_6(8=0.Com'; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587; 

    // Récupération de l'adresse e-mail à partir des paramètres GET
    $to = $_GET['email'];

    


$abonnementC = new AbonnementController();
$abonnementC->confirmSubscription($to);
    
    // Configuration de l'expéditeur et du destinataire
    $mail->setFrom('quickhire50@outlook.com', 'QuickHire');
    $mail->addAddress($to); 

    // Définition du format HTML pour le contenu du message
    $mail->isHTML(true); 
    $mail->Subject = 'Confirmation de votre abonnement confirmée';
    
    // Contenu du message avec une mise en page améliorée
    $mail->Body = '
        <html>
        <head>
            <title>Confirmation d\'abonnement</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f9f9f9;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }

                .container {
                    max-width: 500px;
                    background-color: #fff;
                    border-radius: 10px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                    padding: 40px;
                    text-align: center;
                }

                h2 {
                    color: #333;
                    font-size: 24px;
                    margin-bottom: 20px;
                }

                p {
                    font-size: 16px;
                    color: #666;
                    margin-bottom: 20px;
                }

                .success-message {
                    color: #4CAF50;
                    font-weight: bold;
                }

                .icon {
                    width: 80px;
                    height: 80px;
                    background-color: #4CAF50;
                    color: #fff;
                    font-size: 40px;
                    line-height: 80px;
                    border-radius: 50%;
                    margin: 0 auto 20px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="icon">✔️</div>
                <h2>Confirmation d\'abonnement à la newsletter</h2>
                <p>Merci ! Votre abonnement à notre newsletter a été confirmé avec succès.</p>
                <p class="success-message">Votre abonnement a été confirmé avec succès pour l\'adresse e-mail : '.$to.'</p>
            </div>
        </body>
        </html>
    ';
    $mail->CharSet = 'UTF-8';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Envoi du message
    $mail->send();
    echo '
    <html>
    <head>
        <title>Confirmation d\'abonnement</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .container {
                max-width: 500px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                padding: 40px;
                text-align: center;
            }

            h2 {
                color: #333;
                font-size: 24px;
                margin-bottom: 20px;
            }

            p {
                font-size: 16px;
                color: #666;
                margin-bottom: 20px;
            }

            .success-message {
                color: #4CAF50;
                font-weight: bold;
            }

            .icon {
                width: 80px;
                height: 80px;
                background-color: #4CAF50;
                color: #fff;
                font-size: 40px;
                line-height: 80px;
                border-radius: 50%;
                margin: 0 auto 20px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
        </style>
        <meta http-equiv="refresh" content="5;url=blog.php">
    </head>
    <body>
        <div class="container">
            <div class="icon">✔️</div>
            <h2>Confirmation d\'abonnement à la newsletter</h2>
            <p>Merci ! Votre abonnement à notre newsletter a été confirmé avec succès.</p>
            <p class="success-message">Votre abonnement a été confirmé avec succès pour l\'adresse e-mail : '.$to.'</p>
        </div>
    </body>
    </html>
';


header("refresh:5;url=blog.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>
