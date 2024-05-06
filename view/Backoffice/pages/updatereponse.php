<?php
include "../../../controller/reponsesC.php";
$idrep = isset($_GET['idrep']) ? $_GET['idrep'] : null;


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
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
  <style>
      /* Style pour centrer le titre et mettre en forme la boîte de réponse */
      .reply-container {
        text-align: center; /* Centrage horizontal */
        margin-top: 50px; /* Marge en haut pour décaler vers le bas */
      }
      .reply-box {
        width: 70%; /* Largeur de la boîte de réponse */
        margin: 0 auto; /* Centrage horizontal */
        background-color: pink; /* Fond rose */
        border: 2px solid black; /* Bordure noire */
        border-radius: 10px; /* Bordure arrondie */
        padding: 20px; /* Espacement intérieur */
        font-family: Arial, sans-serif; /* Police de caractères */
        font-size: 16px; /* Taille de la police */
      }
      .reply-box textarea {
        width: 100%; /* Largeur de la zone de texte */
        margin-bottom: 10px; /* Marge en bas pour l'espace entre la zone de texte et le bouton */
      }
      .reply-box button {
        float: right; /* Alignement à droite */
      }
    </style>
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
          <a class="nav-link text-white active bg-gradient-primary" href="../pages/tables.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Tables</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/billing.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
          </a>
        </li>
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
          <a class="nav-link text-white " href="../pages/sign-up.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
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


    <!-- Navbar -->
    <style>
    a.custom-link {
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: black;
        text-decoration: none;
        font-weight: bold;
        padding: 10px 20px;
        border: 2px #FB246A;
        border-radius: 10px;
        background-color: whitesmoke;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        transition: all 0.3s ease;
    }

    /* Style du lien lorsqu'il est survolé */
    a.custom-link:hover {
        background-color: whitesmoke;
        color: #FB246A;
        box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.7);
    }
</style>

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
<div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tables</li>
        </ol>
    </nav>
    <div style="margin-right: 100px;">
        <a class="custom-link" href="http://localhost/GestionDesReclamation/view/Frontoffice/contact.php"> Front office → </a>
    </div>
</div>




    <ul class="navbar-nav justify-content-end">
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

    </ul>
</nav>
    <!-- End Navbar -->
    
    <body class="g-sidenav-show bg-gray-200">

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <!-- Votre barre de navigation ici -->
</nav>
<!-- End Navbar -->

<!-- Contenu de la page -->

    <script>
    function validateForm() {
        var sujet = document.getElementById('sujet2').value;
        var description = document.getElementById('description2').value;

        // Expression régulière pour vérifier si le sujet contient des chiffres ou des gros mots
        var sujetPattern = /^[a-zA-Z\s]*$/;

        // Expression régulière pour vérifier si la description contient des gros mots
        var descriptionPattern = /fuck|bitch|kill/;

        if (!sujet.match(sujetPattern)) {
            alert("Le sujet ne peut pas contenir de chiffres ou de caractères spéciaux !");
            return false;
        }

        if (description.match(descriptionPattern)) {
            alert("La description ne peut pas contenir de gros mots !");
            return false;
        }

        return true;
    }
</script>

<section class="contact-section">
    <div class="row">
        <div class="col-lg-12">
            <div class="reply-container">
                <div class="reply-box" style="background: linear-gradient(180deg, rgba(53, 57, 53, 1) 0%, rgba(0, 0, 0, 1) 100%); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 20px;">
                    <div class="col-12">
                        <h2 style="color: #FFF5EE; font-weight: bold; font-family: 'Muli', sans-serif;" class="contact-title">Modifier la réponse à la réclamation : <span style="font-size: 0.8em; color: white; opacity: 0.7;"><?php echo isset($_GET['idrep']) ? htmlspecialchars($_GET['idrep']) : ''; ?></span></h2>
                    </div>
                    <div class="col-lg-8 mx-auto">
                        <form action="updatereponse1.php" method="POST" id="updatereponse" onsubmit="return validateForm()">
                            <!-- Form Inputs -->
                            <!-- Other Inputs -->
                            <div class="form-group text-center">
                                <textarea name="contenu" id="contenu" rows="8" cols="80" style="border: none; padding: 10px; font-family: Arial, sans-serif; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); border-radius: 10px; background-color: white; width: 100%;"></textarea>
                                <textarea style="display: none;" class="idr3 w-100 form-control" name="idr3" id="idr3" type="text" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"><?php echo isset($_GET['idrep']) ? htmlspecialchars($_GET['idrep']) : ''; ?></textarea>
                                <div style="margin-top: 10px;">
                                    <label for="currentTime" style="color: #FFF5EE; font-weight: bold; font-family: 'Muli', sans-serif;">Current Time:</label>
                                    <input id="dater2" name="dater2" class="dater2 form-control" type="text" value="<?php echo date('Y-m-d H:i:s'); ?>" style="border: none; padding: 5px; font-family: Arial, sans-serif; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); border-radius: 10px; background-color: #FFF5EE;" readonly>
                                </div>
                            </div>
                            <!-- Buttons -->
                            <div class="form-group mt-3 text-center">
                                <button type="submit" style="background-color: #FB246A; color: white; border: none; border-radius: 5px; padding: 10px 20px; font-family: Arial, sans-serif; font-weight: bold; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); transition: all 0.3s ease;">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>








    <!-- ================ contact section end ================= -->
 <!-- Vos scripts JS et autres éléments body ici -->
</body>


</table>
</div>
</div>
</div>
</div>
</div>
<footer class="footer py-4  ">
<div class="container-fluid">
<div class="row align-items-center justify-content-lg-between">
<div class="col-lg-6 mb-lg-0 mb-4">
<div class="copyright text-center text-sm text-muted text-lg-start">



</ul>
</div>
</div>
</div>
</footer>
</div>
</main>
<div class="fixed-plugin">
<a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
<i class="material-icons py-2">settings</i>
</a>
<div class="card shadow-lg">
<div class="card-header pb-0 pt-3">
<div class="float-start">
<h5 class="mt-3 mb-0">Material UI Configurator</h5>
<p>See our dashboard options.</p>
</div>
<div class="float-end mt-4">
<button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
<i class="material-icons">clear</i>
</button>
</div>
<!-- End Toggle Button -->
</div>
<hr class="horizontal dark my-1">
<div class="card-body pt-sm-3 pt-0">
<!-- Sidebar Backgrounds -->
<div>
<h6 class="mb-0">Sidebar Colors</h6>
</div>
<a href="javascript:void(0)" class="switch-trigger background-color">
<div class="badge-colors my-2 text-start">
<span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
<span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
<span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
<span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
<span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
<span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
</div>
</a>
<!-- Sidenav Type -->
<div class="mt-3">
<h6 class="mb-0">Sidenav Type</h6>
<p class="text-sm">Choose between 2 different sidenav types.</p>
</div>
<div class="d-flex">
<button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
<button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
<button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
</div>
<p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
<!-- Navbar Fixed -->
<div class="mt-3 d-flex">
<h6 class="mb-0">Navbar Fixed</h6>
<div class="form-check form-switch ps-0 ms-auto my-auto">
<input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
</div>
</div>
<hr class="horizontal dark my-3">
<div class="mt-2 d-flex">
<h6 class="mb-0">Light / Dark</h6>
<div class="form-check form-switch ps-0 ms-auto my-auto">
<input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
</div>
</div>
<hr class="horizontal dark my-sm-4">
<a class="btn btn-outline-dark w-100" href="">View documentation</a>
<div class="w-100 text-center">
<a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
<h6 class="mt-3">Thank you for sharing!</h6>
<a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
<i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
</a>
<a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
<i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
</a>
</div>
</div>
</div>
</div>
<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
var options = {
damping: '0.5'
}
Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>
