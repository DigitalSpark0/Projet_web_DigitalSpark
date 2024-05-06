
<?php
include "../../controller/reponsesC.php";
include "../../controller/reclamationsC.php";


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
    <title>Job board HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

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
    </style>
</head>

<body>

<!-- Preloader Start -->
<div id="preloader-active" >
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
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
                                <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="job_listing.html">Find a Jobs </a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                    <li><a href="job_details.html">job Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
         <div style="margin-right: 40px;"> 
          <a class="custom-link" href ="http://localhost/GestionDesReclamation/view/Backoffice/pages/tables.php"> Back office → </a>
        </div>
        
        <style>
a.custom-link {
    position: relative; /* Définir la position relative pour pouvoir utiliser top et left */
    top: 50%; /* Déplacer le lien vers le bas de 50% de la hauteur de son conteneur */
    left: 50%; /* Déplacer le lien vers la droite de 50% de la largeur de son conteneur */
    transform: translate(-50%, -50%); /* Déplacer le lien de moitié de sa propre largeur et hauteur vers le haut et la gauche pour le centrer */
    color: black; /* Couleur du texte */
    text-decoration: none; /* Supprimer le soulignement par défaut */
    font-weight: bold; /* Gras */
    padding: 10px 20px; /* Ajouter de l'espace autour du texte */
    border: 2px #FB246A; /* Bordure noire */
    border-radius: 10px; /* Bordure arrondie */
    background-color: whitesmoke; /* Fond rose */
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); /* Ombre */
    transition: all 0.3s ease; /* Transition fluide pour l'effet hover */
}

/* Style du lien lorsqu'il est survolé */
a.custom-link:hover {
    background-color: whitesmoke; /* Changement de couleur de fond au survol */
    color: #FB246A; /* Changement de couleur de texte au survol */
    box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.7); /* Ombre plus prononcée au survol */
}

      </style>
      <header>
      
                                        </ul>
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
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
                                 <h4>About Us</h4>
                                 <div class="footer-pera">
                                     <p>Heaven frucvitful doesn't cover lesser dvsays appear creeping seasons so behold.</p>
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
                                    <p>Address :Your address goes
                                        here, your demo address.</p>
                                    </li>
                                    <li><a href="#">Phone : +8880 44338899</a></li>
                                    <li><a href="#">Email : info@colorlib.com</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Important Link</h4>
                                <ul>
                                    <li><a href="#"> View Project</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Testimonial</a></li>
                                    <li><a href="#">Proparties</a></li>
                                    <li><a href="#">Support</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <div class="footer-pera footer-pera2">
                                 <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
                             </div>
                             <!-- Form -->
                             <div class="footer-form" >
                                 <div id="mc_embed_signup">
                                     <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                     method="get" class="subscribe_form relative mail_part">
                                         <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                         class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                         onblur="this.placeholder = ' Email Address '">
                                         <div class="form-icon">
                                             <button type="submit" name="submit" id="newsletter-submit"
                                             class="email_icon newsletter-submit button-contactForm"><img src="assets/img/icon/form.png" alt=""></button>
                                         </div>
                                         <div class="mt-10 info"></div>
                                     </form>
                                 </div>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
               <!--  -->
               <div class="row footer-wejed justify-content-between">
                       <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                          <!-- logo -->
                          <div class="footer-logo mb-20">
                            <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                          </div>
                       </div>
                       <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>5000+</span>
                            <p>Talented Hunter</p>
                        </div>
                       </div>
                       <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="footer-tittle-bottom">
                                <span>451</span>
                                <p>Talented Hunter</p>
                            </div>
                       </div>
                       <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <!-- Footer Bottom Tittle -->
                            <div class="footer-tittle-bottom">
                                <span>568</span>
                                <p>Talented Hunter</p>
                            </div>
                       </div>
               </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                     <div class="row d-flex justify-content-between align-items-center">
                         <div class="col-xl-10 col-lg-10 ">
                             <div class="footer-copy-right">
                                 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                             </div>
                         </div>
                         <div class="col-xl-2 col-lg-2">
                             <div class="footer-social f-right">
                                 <a href="#"><i class="fab fa-facebook-f"></i></a>
                                 <a href="#"><i class="fab fa-twitter"></i></a>
                                 <a href="#"><i class="fas fa-globe"></i></a>
                                 <a href="#"><i class="fab fa-behance"></i></a>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
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
