<?php
require_once "C:/xampp/htdocs/ProjetWebQH/controller/User/user.php";
$controller = new userCRUD();
$userList = $controller->listUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="C:/xampp/htdocs/projetWeb/view/backoffice/assets/img/imageservice-removebg-preview.png">
    <link rel="icon" type="image/png" href="C:/xampp/htdocs/ProjetWebQH/view/backoffice/assets/img/imageservice-removebg-preview.png">
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
    <style>
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
        </style>
</head>

<body class="g-sidenav-show bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="https://demos.creative-tim.com/material-dashboard/pages/dashboard" target="_blank">
                <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main logo">
                <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/dashboardR.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../pages/tables.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
        <li class="nav-item">
          
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
          <a class="nav-link text-white " href="../pages/profileR.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link text-white " href="../../frontoffice/index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Go to Front Office</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

                <!-- Add more nav items as needed -->
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Users</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Users</h6>
                </nav>
            </div>
        </nav>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Les Utilisateurs</h4>
                </div>
                <div class="search-container">
                        <i class="fas fa-search fa-icons"></i> <input type="text" class="search-input" id="searchInput"
                            placeholder="Search..." oninput="search()">
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
                                            <a href='deleteUserA.php?id_utilisateur=<?= $user['id_utilisateur'] ?>' class='btn btn-outline-danger'><i class="fas fa-trash fa-icons"></i> Delete</a>
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
