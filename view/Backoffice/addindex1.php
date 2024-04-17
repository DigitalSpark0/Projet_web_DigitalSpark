<?php
include "C:/xampp/htdocs/GestionDesReclamation/controller/recponcesC.php";

// Récupérer les données du formulaire

$sujet = isset($_POST["contenu1"]) ? $_POST["contenu1"] : 'erreur';



// Créer un nouvel objet employer avec les données du formulaire
$reponceC = new reponses($contenu);
$reponseC1 = new reponsesC();
$reponceC1->addreponse($reponse);
// Check if form data is being received

header('Location:listeindex.php'); 