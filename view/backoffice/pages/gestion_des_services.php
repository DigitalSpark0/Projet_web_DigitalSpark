<?php
session_start();
require_once "../../../database/connect.php";

require_once "../../controller/User/user.php";
require_once "../../../model/User/userC.php";

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
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="C:/xampp/htdocs/projet web (gestion services)/view/backoffice/assets/img/imageservice-removebg-preview.png">
  <link rel="icon" type="image/png" href="C:/xampp/htdocs/projet web (gestion services)/view/backoffice/assets/img/imageservice-removebg-preview.png">
   <title>
    Sign up
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/dashboard.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/tables.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
      
   
        <!--------------------------------GESTION DES SERVICES------------------------------------------------------------->
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../pages/gestion_des_services.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Sign up</span>
          </a>
        </li>
        <!----------------------------------GESTION DES SERVICES------------------------------------------>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/virtual-reality.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/rtl.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notifications</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/profile.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/sign-in.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          
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
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sign up</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Sign up</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>  
    <!-- End Navbar -->




    <!----------------------------------------------min hna tebda elpage taik ---------------------------------------------------------------------------------------------------------------->
    <div class="container">
        <section class="main" id="main-section" style="display: block;">
            <div class="users">
                <div class="card">
                    <i class="fas fa-users"></i>
                    <h3>Users list</h3>
                    <div class="search-container">
                        <i class="fa fa-search"></i> <input type="text" class="search-input" id="searchInput"
                            placeholder="Search..." oninput="search()">
                        <div style="float: right; margin-right: 10px;">
                        <div style="float: right; margin-right: 10px;">
                                <button onclick="toggleSortMenu()">
                                    <i class="fa fa-sort"></i> Sort
                                </button>
                                <div id="sortOptions" class="sort-options">
                                    <a onclick="sortByID()">ID</a>
                                    <a onclick="sortByFirstName()">First Name</a>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addUserModal">Ajouter</button>
                        <li><a href="../../controller/User/logout.php" class="logout">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="nav-item">Log out</span>
                            </a></li>
                        <a href="../../view/frontoffice/index.html" class="btn btn-secondary">Go vers
                            frontoffice</a>
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
                                            <a href='deleteUser.php?id_utilisateur=<?= $user['id_utilisateur'] ?>' class='btn btn-outline-danger btn-sm'>Delete</a>
                                            <button class="btn btn-outline-primary btn-sm" onclick="toggleUpdateForm(<?= $user['id_utilisateur'] ?>)">Update</button>
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
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="toggleUpdateForm(<?= $user['id_utilisateur'] ?>)">Cancel</button>
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
        </section>

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
                                    <i class="fas fa-eye" id="togglePassword"></i>
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
                            <button class="btn bg-gradient-dark mb-0" type="submit"><i class="material-icons text-sm"></i>&nbsp;&nbsp;valider</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Formulaire Sign Up -->

    <!-- JS here -->
    <!-- All JS Custom Plugins Link Here here -->
    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/price_rangs.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/animated.headline.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/jquery.magnific-popup.js"></script>

    <!-- Contact js -->
    <script src="assets/js/contact.js"></script>
    <script src="assets/js/jquery.form.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/mail-script.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- Script pour le toggle du mot de passe -->
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
            x = parseInt(rows[i].getElementsByTagName("td")[0].innerHTML); // Convertir en nombre pour tri numérique
            y = parseInt(rows[i + 1].getElementsByTagName("td")[0].innerHTML);

            if (x > y) {
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
            x = rows[i].getElementsByTagName("td")[1].innerHTML.toLowerCase(); // Convertir en minuscules pour tri alphabétique
            y = rows[i + 1].getElementsByTagName("td")[1].innerHTML.toLowerCase();

            if (x > y) {
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

    </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
  <!--------------------7ajat zaydin ya achraf ba3ed hadha (a3mel tala aalihom ba3ed matkaml eli lazmk khater fiha dark mode)---------------------------------------->
</body>

</html>
