<?php
include "C:/xampp/htdocs/projet web integration/controller/reclamationsC.php";
$idr = $_GET['idr'];
?>

<!doctype html>
<html class="no-js" lang="zxx">

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
    
    
</head>

<body >
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
    <!-- Hero Area End -->

    <!-- ================ contact section start ================= -->

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
    <div class="container">
        <div class="row">
            <div class="col-12" >
                <h2 class="contact-title" >  Envoyez vos reclamations ici !</h2>
            </div>
            
            <div class="col-lg-8">
                <form action="updatereclamation1.php" method="POST" id="updatereclamation" onsubmit="return validateForm()">
                    <!-- Form Inputs -->
                    <div class="form-group">
                       <select class="sujet2 form-control" name="sujet2" id="sujet2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" required>
                          <option value="" disabled selected>Select Subject</option>
                          <option value="General Inquiry">General Inquiry</option>
                          <option value="Technical Support">Technical Support</option>
                          <option value="Billing Issue">Billing Issue</option>
                               <!-- Ajoutez d'autres options au besoin -->
                        </select>
                    </div>
                    <!-- Other Inputs -->
                    <div class="form-group">
                        <textarea class="description2 w-100 form-control" name="description2" id="description2" type="text" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message" required></textarea>
                        <textarea style="display: none;" class="idr3 w-100 form-control" name="idr3" id="idr3" type="text" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"><?php echo isset($_GET['idr']) ? htmlspecialchars($_GET['idr']) : ''; ?></textarea>
                        <div>
                            <label for="currentTime">Current Time:</label>
                            <input id="dater2" name="dater2" class="dater2 form-control" type="text" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
                        </div>
                    </div>
                    <!-- Buttons -->
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm boxed-btn">Modifier</button>
                        <a href="listereclamation.php" class="button button-contactForm boxed-btn">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


    <!-- ================ contact section end ================= -->
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
