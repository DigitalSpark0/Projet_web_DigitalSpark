<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier Offre</title>
  <style>
    /* Styles CSS omis pour des raisons de concision */
  </style>
</head>
<body>
<div class="row">
    <div class="col-md-12 mb-lg-0 mb-4">
        <div class="card mt-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h3 class="mb-0">Modifier offre</h3>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <form id="service" action="modifier.php" method="post">
                    <input type="hidden" name="id_offre" value="123"> <!-- Assurez-vous que cet ID est correct -->
                    <label for="titre">Titre:</label>
                    <input type="text" id="titre" name="titre" value="">
                    <label for="statut">Statut:</label>
                    <input type="text" id="statut" name="statut" value="">
                    <label for="entreprise">Entreprise:</label>
                    <input type="text" id="entreprise" name="entreprise" value="">
                    <label for="date_pub">Date pub:</label>
                    <input type="date" id="date_pub" name="date_pub" value="">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description"></textarea>
                    
                    <!-- Bouton de soumission -->
                    <button class="btn bg-gradient-dark mb-0" type="submit"><i class="material-icons text-sm">edit</i>&nbsp;&nbsp;Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
// Assurez-vous d'inclure le fichier qui contient la définition de la classe offre et offreController
require_once "C:\wamp64\www\Projet_web_DigitalSpark-gestion_des_offres\controller\offreController.php";
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
        $error = "Des informations sont manquantes.";
    }
} else {
    $error = "Requête invalide.";
}

// Affiche un message d'erreur s'il y a lieu
echo $error;
?>
