<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
include "C:/xampp/htdocs/GestionDesReclamation/controller/reclamationsC.php";


// Récupérer les données du formulaire

$sujet = isset($_POST["sujet1"]) ? $_POST["sujet1"] : 'erreur';
$description = isset($_POST["description1"]) ? $_POST["description1"] : 'erreur';


// Créer un nouvel objet employer avec les données du formulaire
$reclamation = new reclamations($sujet, $description);
$reclamationC1 = new reclamationsC();
$reclamationC1->addreclamation($reclamation);
// Check if form data is being received


    $mail = new PHPMailer (true);
    
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bensalem.lina@esprit.tn';
    $mail->Password = 'huve fwvq mijv yvke';
    
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('bensalem.lina@esprit.tn'); // Your gmail
    $mail->addAddress($_POST["email"]);
    $mail->isHTML(true);
    $mail->Subject = 'Vous venez denvoyer une reclamation au sujet de : '. $_POST["sujet1"];
    $mail->Body = 'Le contenu de votre reclamation : '. $_POST["description1"];
    $mail->send();
    
    echo
    "
    <script>
    alert('Sent Successfully');
    document.location.href = 'index.php';
    </script>
    ";


header('Location:contact.php'); 