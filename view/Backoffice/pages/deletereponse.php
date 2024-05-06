<?php
include "../../../controller/reponsesC.php";

// Vérifier si l'ID de la réponse est passé en paramètre POST
if(isset($_POST["idrep"])) {
    $id_reponse = $_POST["idrep"]; // Récupérer l'ID de la réponse depuis le paramètre POST
} else {
    // Gérer le cas où l'ID de la réponse n'est pas fourni dans le paramètre POST
    echo "ID de réponse non fourni.";
    exit; // Arrêter l'exécution du script
}

$reponseC = new reponsesC();
$reponseC->deletereponse($_POST["idrep"]); // Supprimer la réponse en utilisant la méthode appropriée

// Rediriger vers la page du tableau des réponses après la suppression
header('Location: tables.php');
exit; // Arrêter l'exécution du script après la redirection
?>