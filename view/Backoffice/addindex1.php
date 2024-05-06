<?php
/*include "C:/xampp/htdocs/GestionDesReclamation/controller/recponcesC.php";

// Récupérer les données du formulaire

$sujet = isset($_POST["contenu1"]) ? $_POST["contenu1"] : 'erreur';



// Créer un nouvel objet employer avec les données du formulaire
$reponceC = new reponses($contenu);
$reponseC1 = new reponsesC();
$reponceC1->addreponse($reponse);
// Check if form data is being received

header('Location:listeindex.php'); */

// Vérifier si l'ID de la réclamation est bien passé en tant que POST
include "C:/xampp/htdocs/GestionDesReclamation/controller/recponcesC.php";

if (isset($_POST['idr'])) {
    // Récupérer l'ID de la réclamation depuis le formulaire
    $id_reclamation = $_POST['idr'];

    // Rediriger l'utilisateur vers la page de rédaction de la réponse
    header("Location: page_reponse.php?id_reclamation=$id_reclamation");
    exit(); // Assurez-vous de terminer le script après la redirection
} else {
    // Gérer le cas où l'ID de la réclamation n'est pas défini
    echo "ID de la réclamation non spécifié.";
}
?>
