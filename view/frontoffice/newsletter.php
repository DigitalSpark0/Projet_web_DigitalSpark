<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "C:/xampp/htdocs/ProjetWebQH/controller/AbonnementController.php";
require 'C:/xampp/htdocs/ProjetWebQH/view/frontoffice/src/PHPMailer.php';
require 'C:/xampp/htdocs/ProjetWebQH/view/frontoffice/src/SMTP.php';
require 'C:/xampp/htdocs/ProjetWebQH/view/frontoffice/src/Exception.php';

$email1 = isset($_POST["email"]) ? $_POST["email"] : 'erreur';
$date1 = date("Y-m-d H:i:s");

$abonnement = new Abonnement($email1, $date1);
$abonnementC = new AbonnementController();

$abonnementAdded = $abonnementC->addabonnement($abonnement);
$confirmationLink = "http://localhost/ProjetWebQH/view/frontoffice/confirm_subscription.php?email=" . urlencode($email1);
$confirmationMessage = '';
if ($abonnementAdded) {
    $confirmationMessage = 'Merci ! Votre abonnement à notre newsletter est en attente de vérification.';
    
    $mail = new PHPMailer(true); 
    try {
        $mail->isSMTP(); 
        $mail->Host = 'smtp.office365.com'; 
        $mail->SMTPAuth = true; 
        $mail->Username = 'quickhire50@outlook.com'; 
        $mail->Password = '@2$4_6(8=0.Com'; 
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587; 

        $to = $_POST['email'];
        $mail->setFrom('quickhire50@outlook.com', 'QuickHire');
        $mail->addAddress($to); 

        $mail->isHTML(true); 
        $mail->Subject = 'Confirmation de votre abonnement à la newsletter';
        $mail->Body = '
        <div style="background-color: #f4f4f4; padding: 20px;">
            <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 40px; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
                <h2 style="color: #333333;">Confirmation d\'abonnement à la newsletter</h2>
                <p style="font-size: 16px; color: #666666;">Merci de vous être abonné à notre newsletter !</p>
                <p style="font-size: 16px; color: #666666;">Cliquez sur le bouton ci-dessous pour confirmer votre abonnement :</p>
                <p style="text-align: center;">
                    <a href="localhost/ProjetWebQH/view/frontoffice/confirm_subscription.php?email='.$to.'" style="display: inline-block; background-color: #007bff; color: #ffffff; font-size: 18px; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Confirmer l\'abonnement</a>
                </p>
            </div>
        </div>
        ';
        $mail->CharSet = 'UTF-8';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();

        $confirmationMessage = 'Un e-mail de confirmation a été envoyé à '.$to;
    } catch (Exception $e) {
        $confirmationMessage = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    $confirmationMessage = 'Vous êtes déjà abonné.';
}

echo '
<script>
    window.onload = function() {
        var modalContent = `
            <div style="background-color: #f9f9f9; padding: 20px;">
                <div style="max-width: 500px; margin: 0 auto; background-color: #fff; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); padding: 40px; text-align: center;">
                    <div style="width: 80px; height: 80px; background-color: #4CAF50; color: #fff; font-size: 40px; line-height: 80px; border-radius: 50%; margin: 0 auto 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">✔️</div>
                    <h2 style="color: #333;">Confirmation d\'abonnement à la newsletter</h2>
                    <p style="font-size: 16px; color: #666; margin-bottom: 20px;">'.$confirmationMessage.'</p>
                </div>
            </div>
        `;

        var modal = document.createElement(\'div\');
        modal.style.position = \'fixed\';
        modal.style.top = \'0\';
        modal.style.left = \'0\';
        modal.style.width = \'100%\';
        modal.style.height = \'100%\';
        modal.style.backgroundColor = \'rgba(0, 0, 0, 0.5)\';
        modal.style.display = \'flex\';
        modal.style.justifyContent = \'center\';
        modal.style.alignItems = \'center\';

        modal.innerHTML = modalContent;

        document.body.appendChild(modal);

        setTimeout(function() {
            window.location.href = "blog.php";
        }, 6000);
    };
</script>
';
?>
