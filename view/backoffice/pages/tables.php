<?php
require_once "C:/xampp/htdocs/projet web (gestion services)/controller/userController.php";
$controller = new userController();
$userList = $controller->listUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="C:/xampp/htdocs/projet web (gestion services)/view/backoffice/assets/img/imageservice-removebg-preview.png">
    <link rel="icon" type="image/png" href="C:/xampp/htdocs/projet web (gestion services)/view/backoffice/assets/img/imageservice-removebg-preview.png">
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
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
          <a class="nav-link text-white " href="../pages/dashboard.html">
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
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/virtual-reality.html">
            
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/gestion_des_services.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
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
                                <?php foreach ($userList as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['prenom']) ?></td>
                                        <td><?= htmlspecialchars($user['nom']) ?></td>
                                        <td><?= htmlspecialchars($user['Email']) ?></td>
                                        <td><?= htmlspecialchars($user['Role']) ?></td>
                                        <td>
                                            <!-- Bouton Update pour chaque utilisateur -->
                                            <a href='deleteUser.php?id_utilisateur=<?= $user['id_utilisateur'] ?>' class='btn btn-outline-danger btn-sm'>Delete</a>
                                            <button class="btn btn-outline-primary btn-sm" onclick="toggleUpdateForm(<?= $user['id_utilisateur'] ?>)">Update</button>
                                        </td>
                                    </tr>
                                    <tr id="updateFormRow_<?= $user['id_utilisateur'] ?>" style="display: none;">
                                        <td colspan="5">
                                            <!-- Formulaire de mise à jour de l'utilisateur -->
                                            <form action="updateUser.php" method="POST">
                                                <input type="hidden" name="id_utilisateur" value="<?= $user['id_utilisateur'] ?>">
                                                <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>">
                                                <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']) ?>">
                                                <input type="email" name="Email" value="<?= htmlspecialchars($user['Email']) ?>">
                                                <input type="text" name="Role" value="<?= htmlspecialchars($user['Role']) ?>">
                                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="toggleUpdateForm(<?= $user['id_utilisateur'] ?>)">Cancel</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function toggleUpdateForm(userId) {
            var formRow = document.getElementById('updateFormRow_' + userId);
            if (formRow) {
                formRow.style.display = (formRow.style.display === 'none' || formRow.style.display === '') ? 'table-row' : 'none';
            }
        }
    </script>
</body>

</html>
