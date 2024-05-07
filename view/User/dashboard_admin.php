<?php
session_start();
require_once "C:/xampp/htdocs/ProjetWebQH/config.php";
require_once "../../controller/User/user.php";
require_once "../../model/userC.php";

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_utilisateur'])) {
    // Rediriger vers la page de connexion ou afficher un message d'erreur
    header("Location: ../../view/User/user.html#signin");
    exit;
}

// Obtenir la liste des utilisateurs
$controller = new userCRUD();
$userList = $controller->listUsers();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="../../assets/images/logo.png" type="image/x-icon">

    <style>
        /* Ajoutez vos styles de design personnalisés ici */
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            position: relative; /* Ajout de position relative pour positionner le popup */
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .users {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .user-bar {
            background-color: #e83474;
            padding: 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
        }

        .search-input {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #4caf50;
        }

        .btn-secondary {
            background-color: #f44336;
        }



        
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            text-align: left;

            color: #fff;
            font-size: 18px;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .fa-icons {
            font-size: 20px;
            margin-right: 10px;
        }

        .fa-icons:hover {
            color: #4caf50;
        }

        .logout {
            color: #f44336;
            text-decoration: none;
            margin-left: 20px;
        }

        .logout:hover {
            color: #4caf50;
        }

        .go-frontoffice {
            background-color: #2196f3;
        }

        .go-frontoffice:hover {
            background-color: #4caf50;
        }

        .sort-options {
            background-color: #333;
            border-radius: 5px;
            padding: 10px;
            position: absolute;
            top: 60px;
            right: 10px;
            display: none;
            z-index: 1;
        }

        .sort-options a {
            display: block;
            padding: 5px 10px;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }

        .sort-options a:hover {
            background-color: #4caf50;
        }

        /* Nouveaux styles pour donner plus de vie à la page */
        .dashboard-btn {
            background-color: #ff9800;
            margin-right: 10px;
        }

        .dashboard-btn:hover {
            background-color: #ffcc80;
        }
        
        /* Style pour le popup "Autres fonctionnalités" */
        .popup {
            position: absolute;
            top: 0;
            right: -220px; /* Positionné en dehors de l'écran par défaut */
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            transition: right 0.3s ease-in-out; /* Animation de transition pour une expérience utilisateur fluide */
        }

        .popup.show {
            right: 0; /* Faire apparaître le popup */
        }

        .popup-content {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .popup-btn {
            background-color: #4caf50;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease-in-out; /* Animation de transition pour une expérience utilisateur fluide */
        }

        .popup-btn:hover {
            background-color: #388e3c; /* Changement de couleur au survol */
        }
    </style>
</head>

<body>
  
    <div class="container">
        <section class="main" id="main-section" style="display: block;">
            <div class="users">
                <div class="card">
                    <i class="fas fa-users fa-icons"></i>
                    <h3>Users list</h3>
                    <div class="search-container">
                        <i class="fas fa-search fa-icons"></i> <input type="text" class="search-input" id="searchInput"
                            placeholder="Search..." oninput="search()">
                        <div style="float: right; margin-right: 10px;">
                            <button onclick="toggleSortMenu()" class="btn btn-secondary"><i class="fas fa-sort fa-icons"></i> Sort</button>
                            <div id="sortOptions" class="sort-options">
                                <a onclick="sortByID()">ID</a>
                                <a onclick="sortByFirstName()">First Name</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addUserModal"><i class="fas fa-plus fa-icons"></i> Add User</button>
                        <a href="../../controller/User/logout.php" class="logout">
                            <i class="fas fa-sign-out-alt fa-icons"></i> Log out
                        </a>
                        <a href="../../view/frontoffice/index.php" class="btn btn-secondary go-frontoffice"><i class="fas fa-arrow-left fa-icons"></i> Go to Front Office</a>
                        <!-- Bouton pour renvoyer vers la page dashboard.html -->
                        <a href="../../view/backoffice/pages/dashboard.html" class="btn btn-warning dashboard-btn"><i class="fas fa-tachometer-alt fa-icons"></i> Dashboard</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>prenom</th>
                                    <th>nom</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($userList as $user) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['prenom']) ?></td>
                                        <td><?= htmlspecialchars($user['nom']) ?></td>
                                        <td><?= htmlspecialchars($user['Email']) ?></td>
                                        <td>
                                            <?php
                                            switch ($user['Role']) {
                                                case 1:
                                                    echo "Admin";
                                                    break;
                                                case 2:
                                                    echo "Recruteur";
                                                    break;
                                                case 3:
                                                    echo "Etudiant";
                                                    break;
                                                case 4:
                                                    echo "Freelance";
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href='deleteUser.php?id_utilisateur=<?= $user['id_utilisateur'] ?>' class='btn btn-outline-danger'><i class="fas fa-trash fa-icons"></i> Delete</a>
                                            <button class="btn btn-outline-primary" onclick="toggleUpdateForm(<?= $user['id_utilisateur'] ?>)"><i class="fas fa-edit fa-icons"></i> Update</button>
                                        </td>
                                    </tr>
                                    <tr id="updateFormRow_<?= $user['id_utilisateur'] ?>" style="display: none;">
                                        <td colspan="5">
                                            <!-- Formulaire de mise à jour de l'utilisateur -->
                                            <form action="updateUserA.php" method="POST">
                                                <input type="hidden" name="id_utilisateur" value="<?= $user['id_utilisateur'] ?>">
                                                <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" readonly>
                                                <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" readonly>
                                                <input type="email" name="Email" value="<?= htmlspecialchars($user['Email']) ?>" readonly>
                                                <div style="display: flex; justify-content: space-between;">
                                                    <select name="Role">
                                                        <option value="1" <?= $user['Role'] == 1 ? 'selected' : '' ?>>Admin</option>
                                                        <option value="2" <?= $user['Role'] == 2 ? 'selected' : '' ?>>Recruteur</option>
                                                        <option value="3" <?= $user['Role'] == 3 ? 'selected' : '' ?>>Etudiant</option>
                                                        <option value="4" <?= $user['Role'] == 4 ? 'selected' : '' ?>>Freelance</option>
                                                    </select>
                                                    <div>
                                                        <button type="submit" class="btn btn-success"><i class="fas fa-save fa-icons"></i> Save</button>
                                                        <button type="button" class="btn btn-danger" onclick="toggleUpdateForm(<?= $user['id_utilisateur'] ?>)"><i class="fas fa-times fa-icons"></i> Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style="float: right; margin-right: 10px;">
    <!-- Bouton pour générer le PDF -->
<form method="POST" action="generatepdf.php" style="display: inline-block; margin-right: 10px;">
    <input type="hidden" name="type" value="pdf">
    <button type="submit" class="btn btn-primary"><i class="fas fa-file-pdf fa-icons"></i> Generate PDF</button>
</form>
<!-- Lien vers la page de statistiques -->
<a href="./statistique.php" class="btn btn-info" style="background-color: #007bff;"><i class="fas fa-chart-bar fa-icons"></i> Statistique</a>

        </section>
       
        

        <!-- Modal pour ajouter un utilisateur -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="user" action="ajouter_user.php" method="post" class="text-center" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="prenom">Prenom:</label>
                                <input type="text" id="prenom" name="prenoms" required>
                                <span class="error-message" id="prenom-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom:</label>
                                <input type="text" id="nom" name="noms" required>
                                <span class="error-message" id="nom-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="Email">Email:</label>
                                <input type="text" id="Email" name="Emails" required>
                                <span class="error-message" id="email-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="Password">Password:</label>
                                <input type="password" id="Password" name="Passwords" required>
                                <span class="error-message" id="password-error"></span>
                                <span class="password-toggle" onclick="togglePasswordVisibility()">
                                    <i class="fas fa-eye fa-icons" id="togglePassword"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Role">Role:</label>
                                <select class="signup-form-elements" name="Role" id="Role" required>
                                    <option value="" selected disabled>Choose role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Recruteur</option>
                                    <option value="3">Etudiant</option>
                                    <option value="4">Freelance</option>
                                </select>
                                <span class="error-message" id="role-error"></span>
                            </div>
                            <button class="btn btn-success" type="submit"><i class="fas fa-check fa-icons"></i> valider</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times fa-icons"></i> Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript pour la validation du formulaire et la bascule de la visibilité du mot de passe -->
    
    <script>
        function toggleUpdateForm(userId) {
            var formRow = document.getElementById('updateFormRow_' + userId);
            if (formRow) {
                formRow.style.display = (formRow.style.display === 'none' || formRow.style.display === '') ? 'table-row' : 'none';
            }
        }

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("Password");
            var toggleIcon = document.getElementById("togglePassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }

        function validateForm() {
            // Ajoutez votre logique de validation ici
            return true; // Retourne true si le formulaire est valide, sinon retourne false
        }

        function toggleSearchInput() {
            var input = document.querySelector('.search-input');
            input.classList.toggle('show-input');

            if (input.classList.contains('show-input')) {
                input.focus();
            } else {
                input.value = '';
                search();
            }
        }

        function search() {
            var searchBar = document.querySelector('.search-input');
            var filter = searchBar.value.toUpperCase();
            var table = document.querySelector('.table');
            var tr = table.getElementsByTagName("tr");

            for (var i = 1; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName("td");

                var rowText = "";
                for (var j = 1; j < td.length; j++) {
                    rowText += td[j].textContent || td[j].innerText;
                }

                if (rowText.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        function toggleSortMenu() {
            var sortOptions = document.getElementById('sortOptions');
            if (sortOptions.style.display === 'block') {
                sortOptions.style.display = 'none';
            } else {
                sortOptions.style.display = 'block';
            }
        }

        function sortByID() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.querySelector('.table');
            switching = true;

            while (switching) {
                switching = false;
                rows = table.rows;

                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[0];
                    y = rows[i + 1].getElementsByTagName("td")[0];

                    if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {
                        shouldSwitch = true;
                        break;
                    }
                }

                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }

        function sortByFirstName() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.querySelector('.table');
            switching = true;

            while (switching) {
                switching = false;
                rows = table.rows;

                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[1];
                    y = rows[i + 1].getElementsByTagName("td")[1];

                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }

                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }

        function togglePopup() {
            var popup = document.getElementById('popup');
            popup.classList.toggle('show');
        }

        
    </script>
</body>

</html>
