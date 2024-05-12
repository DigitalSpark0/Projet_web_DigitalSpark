
<?php
include "C:/xampp/htdocs/projet web integration/controller/reponsesC.php";
include "C:/xampp/htdocs/projet web integration/controller/reclamationsC.php";

session_start();
    $showUpdateAccountButton = isset($_SESSION['user_id']);
    $showGoToBackofficeButton = $showUpdateAccountButton; // Le bouton "Go to backoffice" s'affichera également si l'utilisateur est connecté

    // Vérifier si l'utilisateur est admin ou recruteur
    $role_id = 0; // Remplacez cela par le code pour récupérer le rôle de l'utilisateur depuis la base de données
    $is_admin_or_recruteur = ($role_id === 1 || $role_id === 2);

// Initialisez la variable $listReponses en tant que tableau vide
$listReponses = [];

// Vérifiez si la clé 'idr' existe dans le tableau $_GET
if(isset($_GET['idr'])) {
    // Récupération de l'ID de la réclamation depuis l'URL
    $id_reclamation = $_GET['idr'];

    // Instanciation des contrôleurs
    $reponseController = new reponsesC();
    $reclamationController = new reclamationsC();

    // Récupération de la liste des réponses pour cette réclamation spécifique
    $listReponses = $reponseController->getReponsesByReclamation($id_reclamation);

    
}
?>




<!DOCTYPE html>
<html lang="en">
    

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Liste des réponses</title>
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
    <style>
        /* Ajoutez votre style de centrage ici */
        body,
        html {
            height: 100%;
        }

        .contact-section {
            height: 100%;
            display: flex;
            margin-left: 400px;
        }
    </style>
    <style>
        body {
            background-color: white; /* Fond de la page en blanc */
            margin: 0; /* Réinitialiser les marges */
            padding: 0; /* Réinitialiser le rembourrage */
            font-family: Arial, sans-serif; /* Utiliser une police générique */
        }

        .container {
            max-width: 800px; /* Largeur maximale du contenu */
            margin: 0 auto; /* Centrer le contenu */
            padding: 20px; /* Ajouter un espacement autour du contenu */
        }

        .card-header {
            background-color: #FB246A; /* Couleur de fond pour l'en-tête */
            color: white; /* Couleur du texte pour l'en-tête */
            padding: 10px; /* Ajouter un espacement autour du texte */
            border-radius: 10px; /* Bords arrondis pour l'en-tête */
            text-align: center; /* Centrer le texte */
            border-bottom: none; /* Supprimer la bordure inférieure */
        }

        .table {
            width: 100%; /* Largeur de la table à 100% */
            border-collapse: collapse; /* Fusionner les bordures de cellule */
            margin-top: 20px; /* Espacement en haut de la table */
        }

        .table th,
        .table td {
            border: 1px solid #FB246A; /* Bordure autour des cellules */
            padding: 8px; /* Ajouter un espacement à l'intérieur des cellules */
            text-align: center; /* Centrer le texte */
        }

        .no-response {
             /* Couleur de fond pour le message */
            color: white; /* Couleur du texte pour le message */
            padding: 10px; /* Ajouter un espacement autour du texte */
            border-radius: 10px; /* Bords arrondis pour le message */
            text-align: center; /* Centrer le texte */
        }

        /* Masquer le titre lorsque le message n'a pas de réponse */
        .no-response .card-header {
            display: none;
        }
        
.logout {
            color: #f44336;
            text-decoration: none;
            margin-left: 20px;
        }

        .logout:hover {
            color: #4caf50;
        }
    
    </style>
</head>
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
                                            <li><a href="commandes.php">Services</a></li>
                                            <li><a href="about.php">Projets</a></li>
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

</header> 
<body>

<!-- Preloader Start -->
<div id="preloader-active" >
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
                          v
        <!-- Header End -->
        <style>
    .error-message {
        color: red;
    }

    #description {
        margin-top: 10px; /* Ajoute une marge entre la select box et la textarea */
    }
    </style>



    <div class="container">
        <div class="card my-4">
            <?php if (empty($listReponses)) { ?>
                <div class="no-response">
                    <div class="card-header">
                        <h6 class="text-capitalize ">Tableau des réponses</h6>
                    </div>
                    <p >Pas de réponse pour le moment.</p>
                </div>
            <?php } else { ?>
                <div class="card-header" style="background-color: #FB246A; color: white; font-weight: bold;">
    <h6 class="text-capitalize">Tableau des réponses</h6>
</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Deuxième tableau pour les réponses -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase">id réponse</th> <!-- Utiliser la couleur fournie pour les titres -->
                                    <th class="text-uppercase">Contenu</th>
                                    <th class="text-uppercase">Date de réponse</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                <?php foreach ($listReponses as $reponseC) { ?>
                                    <tr>
                                        <td><?= $reponseC['idrep']; ?></td>
                                        <td><?= $reponseC['contenu']; ?></td>
                                        <td><?= $reponseC['daterep']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                     
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="form-group mt-6">
                        <a href="listereclamation.php" class="button button-contactForm boxed-btn" style="margin-left:560px">Retour</a>
                    </div>
    </div>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                       <div class="single-footer-caption mb-50">
                         <div class="single-footer-caption mb-30">
                             <div class="footer-tittle">
                                 <h4>Qui sommes-nous ?</h4>
                                 <div class="footer-pera">
                                     <p>“QuickHire.tn” est une plateforme web qui rend la recherche d'emploi facile pour les étudiants.
 Que ce soit pour des missions à temps partiel, à plein temps ou en freelance, QuickHire simplifie le processus, permettant aux étudiants de trouver rapidement des opportunités.
</p>
                                </div>
                             </div>
                         </div>

                       </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Contact Info</h4>
                                <ul>
                                    <li>
                                    <p>Address : Z.I Chotrana II Tunis,Tunisie</p>
                                    </li>
                                    <li><a href="#">Phone : +216 70555555</a></li>
                                    <li><a href="#">Email : info@quickhire.com</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Important Link</h4>
                                <ul>
                                    <li><a href="offre.php">Offres</a></li>
                                    <li><a href="commandes.php">Services</a></li>
                                    <li><a href="about.php">Projets</a></li>
                                    <li><a href="blog.php">Articles</a></li>
                                    <li><a href="contact.php">Réclamations</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <div class="footer-pera footer-pera2">
                                 <p>Rendez-vous dans la rubrique Articles pour s'abonner.</p>
                             </div>
                             <!-- Form -->
                             
                            </div>
                        </div>
                    </div>
                </div>
               <!--  -->
               <div class="row footer-wejed justify-content-between">
                       <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                          <!-- logo -->
                          <div class="footer-logo mb-20">
                            <a href="index.html"><img width="200" height="150" src="assets/img/logo/digitalspark.png" alt=""></a>
                          </div>
                       </div>
                       <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>5000+</span>
                            <p>Cherchers d'emploi</p>
                        </div>
                       </div>
                       <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="footer-tittle-bottom">
                                <span>451</span>
                                <p>Partenaires</p>
                            </div>
                       </div>
                       <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <!-- Footer Bottom Tittle -->
                            <div class="footer-tittle-bottom">
                                <span>568</span>
                                <p>Freelancers</p>
                            </div>
                       </div>
               </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        
        <!-- Footer End-->
    </footer>
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
