<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="C:/xampp/htdocs/projet web (gestion services)/view/backoffice/assets/img/imageservice-removebg-preview.png">
    <link rel="icon" type="image/png" href="C:/xampp/htdocs/projet web (gestion services)/view/backoffice/assets/img/imageservice-removebg-preview.png">
    <title>Sign up</title>
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
        <div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="../pages/dashboard.html">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">offres</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Offres</h6>
                </nav>
            </div>
        </nav>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des offres</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id_offre</th>
                                    <th>titre</th>
                                    <th>description</th>
                                    <th>entreprise</th>
                                    <th>date_pub</th>
                                    <th>statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once "C:/xampp/htdocs/projet web(gestion services)/controller/offreController.php";
                                $controller = new offreController();
                                $offre = $controller->listOffres();
                                
                                foreach ($offre as $offre) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($offre['id_offre']) . "</td>";
                                    echo "<td>" . htmlspecialchars($offre['titre']) . "</td>";
                                    echo "<td>" . htmlspecialchars($offre['description']) . "</td>";
                                    echo "<td>" . htmlspecialchars($offre['entreprise']) . "</td>";
                                    echo "<td>" . htmlspecialchars($offre['date_pub']) . "</td>";
                                    echo "<td>" . htmlspecialchars($offre['statut']) . "</td>";
                                    echo "<td><a href='delete_offre.php?id_offre=" . $offre['id_offre'] . "' class='btn'>Delete</a></td>";
                                    echo "<td><a href='Formupdate.php?id_offre=" . $offre['id_offre'] . "' class='btn'>Modifier</a></td>";

                                   
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>