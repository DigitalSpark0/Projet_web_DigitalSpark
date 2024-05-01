<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chatbot</title>
    <style>
        /* Style pour le titre avec animation de rebond */
        .title-container {
            text-align: center;
            animation: bounceAnimation 2s infinite; /* Animation de rebondissement répétée en boucle */
        }

        /* Animation de rebondissement */
        @keyframes bounceAnimation {
            0%, 100% {
                transform: translateY(0); /* Position de départ et d'arrivée - aucun déplacement */
            }
            50% {
                transform: translateY(-20px); /* Rebond à mi-chemin */
            }
        }

        /* Style pour le texte du titre */
        .title-text {
            color: black; /* Couleur de texte blanche */
        }

        /* Style pour le conteneur principal */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(to bottom, #f0f0ff, #ffffff, #e6f2ff); /* Dégradé de couleur */
            background-size: 100% 300%; /* Taille du dégradé de couleur */
            animation: gradientAnimation 10s linear infinite; /* Animation du dégradé répétée en boucle */
        }

        /* Animation du dégradé de couleur */
        @keyframes gradientAnimation {
            0% {
                background-position: 0 0; /* Position de départ du dégradé */
            }
            100% {
                background-position: 0 100%; /* Position de fin du dégradé */
            }
        }

        /* Style pour le formulaire de commande */
        #command-form {
            text-align: center;
            margin-top: 20px;
        }

        /* Style pour l'entrée de commande */
        #command {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style pour le bouton d'envoi */
        #submit-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        /* Style pour les messages du chat */
        .chat-message {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            animation: slideIn 0.5s ease;
        }

        /* Animation de slide */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Style pour les réponses du chatbot */
        .bot-response {
            background-color: black; /* Couleur de fond noire */
            color: white; /* Couleur de texte blanche */
        }

        /* Style pour les réponses de l'utilisateur */
        .user-response {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        /* Style pour les messages de salutation */
        .greeting-message {
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

    </style>
</head>
<body>
<div class="title-container">
        <h1 class="title-text">QuickBot</h1>
    </div>
    <form id="command-form" action="chatbot.php" method="post">
        <label for="command">chattez avec QuickBot :</label>
        <input type="text" id="command" name="command">
        <button id="submit-button" type="submit">Envoyer</button>
    </form>

    <?php
    include "C:/xampp/htdocs/projet web (gestion services)/controller/CommandeController.php";
    include "C:/xampp/htdocs/projet web (gestion services)/config.php";

    // Connexion à la base de données
    $pdo = config::getConnexion();

    // Vérifier si une commande a été envoyée
    if (isset($_POST['command'])) {
        $command = strtolower($_POST['command']); // Convertir la commande en minuscules pour une comparaison insensible à la casse
        
        // Traitement de la commande
        if ($command === '/help') {
            echo '<div class="chat-message bot-response">Voici les commandes disponibles:<br>/help - Affiche l\'aide<br>/rating - Donne une note<br>/quickhire - informations sur le site web<br>"ecrire l\'id d\'un service" - afficher les informations du servicce selon le id<br>';
        } elseif ($command === '/rating') {
           // Requête SQL pour compter le nombre de commandes pour chaque service
            $sql = "SELECT idservice, COUNT(*) AS count FROM commande GROUP BY idservice";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $command_counts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Tableau pour stocker les catégories de notation
            $rating_categories = array();

            // Calcul des catégories de notation
            foreach ($command_counts as $row) {
                $idservice = $row['idservice'];
                $count = $row['count'];
                if ($count <= 5) {
                    $rating_categories[$idservice] = "Médiocre";
                } elseif ($count <= 10) {
                    $rating_categories[$idservice] = "Bon";
                } else {
                    $rating_categories[$idservice] = "Excellent";
                }
            }

            // Affichage des catégories de notation
            echo '<div class="chat-message bot-response">';
            echo '<h2>Catégories de notation pour les services :</h2>';
            foreach ($rating_categories as $idservice => $category) {
                echo "ID du service : $idservice - Catégorie : $category<br>";
            }
            echo '</div>'; // Fermeture du div chat-message
        } elseif (is_numeric($command)) {
            // Vérifier si la commande est un entier
            $idservice = intval($command);

            // Rechercher le service par son ID
            $sql = "SELECT * FROM service WHERE ids = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$idservice]);
            $service = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($service) {
                // Afficher les informations sur le service
                echo '<div class="chat-message bot-response">';
                echo "<h2>Informations sur le service</h2>";
                echo "ID du service: {$service['ids']}<br>";
                echo "Titre: {$service['titre_s']}<br>";
                echo "Description: {$service['desc_s']}<br>";
                echo "Prix: {$service['prix_s']}<br>";
                echo "Durée: {$service['duree_s']}<br>";
                echo "Catégorie: {$service['categorie_s']}<br>";
                echo "Statut: {$service['statut_s']}<br>";

                // Afficher la liste des commandes pour ce service
                $commandeController = new CommandeController();
                $listeCommandes = $commandeController->listcommandechercher($idservice);
                echo "<h3>Liste des commandes pour ce service:</h3>";
                foreach ($listeCommandes as $commande) {
                    echo "ID de la commande: {$commande['idc']}<br>";
                    echo "ID du service: {$commande['idservice']}<br>";
                    echo "date d'ajout: {$commande['date_c']}<br>";
                    echo "---------------------------------------<br>";
                }
                echo '</div>'; // Fermeture du div chat-message
            } else {
                echo '<div class="chat-message bot-response">Aucun service trouvé avec cet ID.</div>';
            }
        } elseif (in_array($command, array('hello', 'hi'))) {
            // Répondre au salut
            echo '<div class="chat-message bot-response">Bonjour ! Comment puis-je vous assister aujourd\'hui ?</div>';
        }elseif ($command === '/quickhire') {
            echo'<div class="chat-message bot-response">“QuickHire.tn” est une plateforme web qui rend la recherche d\'emploi facile pour les étudiants.
            Que ce soit pour des missions à temps partiel, à plein temps ou en freelance, QuickHire simplifie le processus, permettant aux étudiants de trouver rapidement des opportunités.
            Les recruteurs peuvent également découvrir des talents qui correspondent à leurs besoins, que ce soit pour des projets temporaires ou des postes à long terme.</div>';
        }
        elseif (in_array($command, array('au revoir', 'bye'))) {
            echo'<div class="chat-message bot-response">au revoir !!</div> <script>setTimeout(function() {
                window.location.href = "index.php";
            }, 1000);</script>';
        }
         else {
            echo '<div class="chat-message bot-response">Commande non reconnue. Veuillez utiliser /help pour voir les commandes disponibles.</div>';
        }
    }
    ?>
</body>
</html>
