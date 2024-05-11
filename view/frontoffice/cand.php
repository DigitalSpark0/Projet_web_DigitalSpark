<?php
session_start();
$showUpdateAccountButton = isset($_SESSION['user_id']);
$showGoToBackofficeButton = $showUpdateAccountButton; // Le bouton "Go to backoffice" s'affichera également si l'utilisateur est connecté

// Vérifier si l'utilisateur est admin ou recruteur
$role_id = 0; // Remplacez cela par le code pour récupérer le rôle de l'utilisateur depuis la base de données
$is_admin_or_recruteur = ($role_id === 1 || $role_id === 2);

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>candidatures</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/image_2024-03-10_171426764-removebg-preview.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/price_rangs.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
<style>
.logout {
            color: #f44336;
            text-decoration: none;
            margin-left: 20px;
        }

        .logout:hover {
            color: #4caf50;
        }
    </style>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/image_2024-03-10_171426764-removebg-preview.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a  href="../../view/backoffice/pages/gestion_des_articles.php"><img width="200" height="150" src="assets/img/image_2024-03-10_171426764-removebg-preview.png" alt=""></a>
                            </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="index.php">Accueil</a></li>
                                            <li><a href="offre.php">Offres</a></li>
                                            <li><a href="commandes.php">Services</a></li>
                                            <li><a href="contact.php">Réclamations</a></li>
                                            <li><a href="blog.php">Articles</a>
                                           
                                                <!--<ul class="submenu">
                                                    <li><a href="blog.php">Articles</a></li>
                                                    <li><a href="single-blog.php">Blog Details</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                    <li><a href="commandes.html">Les commandes</a></li>
                                                </ul>-->
                                            </li>
                                            <li><a href="quickchat.php">QuickChat</a></li>
                                            <li><a href="../../view/entretien/entretien.html">Entretien</a></li>




                                            
                                            <?php if ($showUpdateAccountButton): ?>
                                                <li><a href="updateUser.php">Update Account</a></li>
                                            <?php endif; ?>

                                            <?php if ($showGoToBackofficeButton): ?>
                                                <li><a href="../../view/backoffice/pages/dashboard.php">Go to backoffice</a></li>
                                            <?php endif; ?>

                                            
                                        </ul>
                                        
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
                                <?php if (!$showUpdateAccountButton): ?>
            <div class="header-btn d-none f-right d-lg-block">
                <a href="../../view/User/user.html" class="btn head-btn1">SignUp/SignIn</a>
            </div>
        <?php endif; ?>


                                <?php if ($showUpdateAccountButton): ?>
                                    <li><a  href="../../controller/User/logout.php" class="logout">
                            <i class="fas fa-sign-out-alt fa-icons"></i> Log out
                        </a></li>
                       
                        <?php endif; ?>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
        <!-- Header End -->
    </header>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Contactez Nous</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- ================ contact section start ================= -->

    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Votre Candidature :</h2>
                </div>
            </div>
            <form id="service" action="ajouter_cand.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control valid" name="id_offre" id="id_offre" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'ID de l\'offre'" placeholder="ID de l'offre" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control valid" name="date_candidature" id="date_candidature" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Date de candidature'" placeholder="Date de candidature" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control-file" name="cv" id="cv" type="file" accept=".pdf,.doc,.docx" required>
                            <small class="form-text text-muted">Veuillez télécharger votre CV au format PDF ou Word.</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="disponibilite">Disponibilité :</label>
                            <select class="form-control" id="disponibilite" name="disponibilite" required>
                                <option value="">Sélectionnez votre disponibilité</option>
                                <option value="temps_plein">Temps plein</option>
                                <option value="temps_partiel">Temps partiel</option>
                                <option value="flexible">Flexibilité des horaires</option>
                                <option value="nuit">Travail de nuit</option>
                                <option value="weekend">Week-ends seulement</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm boxed-btn">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
        <br><br>
        <form action="../../controller/qrcode.php" method="get">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control me-3" id="qr" name="qr" placeholder="Entrez l'ID de l'offre Si Vous Voulez Verifier">
                        <button type="submit" class="btn btn-success">QR CODE</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </section>

    <!-- Formulaire indépendant pour le QR code -->
    

    <!-- ================ contact section end ================= -->
    


    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./assets/js/price_rangs.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>
