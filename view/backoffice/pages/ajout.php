<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Offre</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, h1, h2, h3, h4, h5, h6, p, form, input, button {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            background-color: #212529;
            color: #fff;
            width: 250px;
            padding: 1rem;
        }

        .main-content {
            flex: 1;
            background-color: #f8f9fa;
            padding: 1rem;
        }

        .sidebar a {
            text-decoration: none;
            color: #fff;
            display: block;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease-in-out;
        }

        .sidebar a.active, .sidebar a:hover {
            background-color: #343a40;
        }

        .content-header h3 {
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
        }

        input[type=text], input[type=date], textarea {
            width: 100%;
            padding: 0.375rem 0.75rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            margin-top: 0.5rem;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: #dcdcdc;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
                        border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn:hover {
            background-color: #a8a8a8;
        }
    </style>
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <!-- Sidebar content here -->
        </aside>
        <main class="main-content">
            <div class="row">
                <div class="col-md-12 mb-lg-0 mb-4">
                    <!-- Formulaire d'ajout des offres -->
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h3 class="mb-0">Ajouter offre</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <!-- Formulaire d'ajout d'offre -->
                            <form id="service" action="ajouter_service.php" method="post">
    <!-- Autres champs du formulaire -->
    <label for="titres">Titre:</label>
    <input type="text" id="titres" name="titres" required>
    <br><br>
    <label for="statuts">Statut:</label>
    <input type="text" id="statuts" name="statuts" required>
    <br><br>
    <label for="entreprises">Entreprise:</label>
    <input type="text" id="entreprises" name="entreprises" required>
    <br><br>
    <label for="date_pubs">Date pub:</label>
    <input type="text" id="date_pubs" name="date_pubs" pattern="\d{2}/\d{2}/\d{4}" title="Format de date invalide. Utilisez jj/mm/aaaa" required>
    <br><br>
    <label for="descriptions">Description:</label>
    <input type="text" id="descriptions" name="descriptions" required>
    <br><br>
    <!-- Bouton de soumission -->
    <button class="btn bg-gradient-dark mb-0" type="submit" onclick="return validateDate()">Ajouter</button>
</form>

<script>
    function validateDate() {
        // Récupérer la valeur de la date_pub
        var date_pub = document.getElementById("date_pubs").value;

        // Créer un objet Date pour la date actuelle
        var today = new Date();

        // Extraire le jour, le mois et l'année de la date actuelle
        var currentDay = today.getDate();
        var currentMonth = today.getMonth() + 1; // Les mois sont indexés à partir de 0
        var currentYear = today.getFullYear();

        // Extraire le jour, le mois et l'année de la date de publication saisie par l'utilisateur
        var parts = date_pub.split('/');
        var userDay = parseInt(parts[0], 10);
        var userMonth = parseInt(parts[1], 10);
        var userYear = parseInt(parts[2], 10);

        // Valider le jour, le mois et l'année par rapport à la date actuelle
        if (userYear > currentYear || userYear < currentYear - 100) {
            alert("L'année de publication doit être comprise entre " + (currentYear - 100) + " et " + currentYear);
            return false;
        }
        if (userMonth < 1 || userMonth > 12) {
            alert("Le mois de publication doit être compris entre 01 et 12.");
            return false;
        }
        if (userDay < 1 || userDay > 31) {
            alert("Le jour de publication doit être compris entre 01 et 31.");
            return false;
        }

        return true; // La date est valide, le formulaire peut être soumis
    }
</script>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="script.js"></script>
</body>

</html>
