<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs email et mot de passe sont définis
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        // Récupérer les valeurs des champs email et mot de passe
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Vous pouvez ici traiter les données (par exemple, enregistrer dans une base de données)
        // Pour l'exemple, affichons simplement les valeurs
        echo "Email: " . $email . "<br>";
        echo "Password: " . $password;
    } else {
        // Afficher un message d'erreur si les champs ne sont pas définis
        echo "Tous les champs sont obligatoires.";
    }
}
?>
