<?php
    // Vérifier si l'utilisateur est connecté
    session_start();
    $showUpdateAccountButton = isset($_SESSION['user_id']);
    $showGoToBackofficeButton = $showUpdateAccountButton; // Le bouton "Go to backoffice" s'affichera également si l'utilisateur est connecté

    // Vérifier si l'utilisateur est admin ou recruteur
    $role_id = 0; // Remplacez cela par le code pour récupérer le rôle de l'utilisateur depuis la base de données
    $is_admin_or_recruteur = ($role_id === 1 || $role_id === 2);
    if (!class_exists('config')) {
        include 'C:\xampp\htdocs\projet web integration\config.php';
     }
     include 'C:\xampp\htdocs\projet web integration\controller\ServiceController.php';
     include 'C:\xampp\htdocs\projet web integration\controller\CommandeController.php';
    
    
    $db=config::getConnexion(); 
    $serv = new ServiceController(); 
    $com = new CommandeController();
    $list =$serv->listServices();
    $lista =$com->listcommande();
?>

<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>QuickHire</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/image_2024-03-10_171426764-removebg-preview.png">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/price_rangs.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">
   </head>
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
   <body>
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
        <!-- Header End -->
    </header>
    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Bienvenue sur QuickHire.tn !</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Our Services Start -->
       
        <!-- Our Services End -->
        <!-- Online CV Area Start -->
         <div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="assets/img/gallery/cv_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="cv-caption text-center">
                            <p class="pera1">Projets et taches</p>
                            <p class="pera2">Ajouter un projet et consulter vos taches en un seul clic !</p>
                            <a href="about.php" class="border-btn2 border-btn4">Visitez notre rubrique projets</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Online CV Area End-->










<!--------------------------------------------------------------Gestion des Services------------------------------------------------------------------------------------------------->        
        <!-- Featured_job_start -->
        <section class="featured-job-area feature-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>QUICKHIRE</span>
                            <h2>Les services</h2>
                            <a href="chatbot.php" class="lien">Talk to QuickBot</a>
                            <style>
                               .lien {
    color: blue; /* Couleur du texte */
    text-decoration: none; /* Supprime le soulignement par défaut */
    position: relative; /* Position relative pour les animations absolues */
}

.lien::after {
    content: ''; /* Ajoute un contenu après le lien */
    position: absolute; /* Position absolue pour permettre le positionnement */
    top: -5px; /* Ajustement pour que la bordure soit à l'extérieur du lien */
    left: -5px; /* Ajustement pour que la bordure soit à l'extérieur du lien */
    width: calc(100% + 10px); /* Largeur avec ajustement pour que la bordure soit plus grande */
    height: calc(100% + 10px); /* Hauteur avec ajustement pour que la bordure soit plus grande */
    border: 4px solid transparent; /* Bordure initialement transparente */
    border-radius: 8px; /* Coins arrondis */
    animation: bordureClignotante 1s infinite alternate; /* Animation de la bordure */
}

@keyframes bordureClignotante {
    from {
        border-color: transparent; /* Couleur de la bordure transparente */
    }
    to {
        border-color: blue; /* Couleur de la bordure bleue */
    }
}



                            </style>
                        </div>
                    </div>
                    <form  action="pageajout.php"  >
                        <button  class="btn bg-gradient-dark mb-0" type="submit">ajouter un service</button>
                    </form>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <!-- single-job-content -->
                        <?php foreach ($list as $service){ ?>
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="commandes.html"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="commandes.html"><h4><?= $service['titre_s'];?></h4></a>
                                    <ul>
                                        <li><?= $service['statut_s'];?></li>
                                        <li><?= $service['categorie_s'];?> </li>
                                        <li><?= $service['prix_s'];?>DT</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link f-right">
                                <a href="commandes.php">afficher tous les informations</a>
                                <a class="" href="updateservice.php?idd=<?php echo $service['ids']; ?>">Update</a>
                                <a class="" href="deleteservice.php?id=<?php echo $service['titre_s']; ?>">Delete</a>
                                 
                            </div>
                        </div>
                        <?php } ?>
                        
                        </div>
                         
                    </div>
                </div>
            </div>
        </section>
        <!-- Featured_job_end -->
<!-----------------------------------------------Gestion Des Services------------------------------------------------------------------------------------------------------->


        <!-- How  Apply Process Start-->
        <div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle white-text text-center">
                            <span>processus d'application</span>
                            <h2>Comment ça marche ?</h2>
                        </div>
                    </div>
                </div>
                <!-- Apply Process Caption -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-search"></span>
                            </div>
                            <div class="process-cap">
                               <h5>1. Chercher une offre</h5>
                               <p>Consulter la rubrique offres afin de chercher votre emploi de reves</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-curriculum-vitae"></span>
                            </div>
                            <div class="process-cap">
                               <h5>2. Postuler pour un poste</h5>
                               <p>Aprés avoir choisi une offre , remplissez le formulaire avec vos informations et votre cv et envoyer votre demande</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="process-cap">
                               <h5>3. Consulter l'état de votre demande</h5>
                               <p>Vous pouvez consulter l'état de votre demande a tout moment et vérifier si elle a été acceptée ou pas</p>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        <!-- How  Apply Process End-->
        <!-- Testimonial Start -->
        <div class="testimonial-area testimonial-padding">
            <div class="container">
                <!-- Testimonial contents -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-10">
                        <div class="h1-testimonial-active dot-style">
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img mb-30">
                                            <img src="assets/img/testmonial/fedi.jpg" alt="" style="width: 150px; height: 150px;">
                                            <span>Abassi Fedi</span>
                                            <p>Président directeur général</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“Nous avons créé ce site dans le but de répondre à un besoin croissant des étudiants à la recherche de travail flexible et adapté à leur emploi du temps chargé. Notre objectif principal était de centraliser les opportunités d'emploi pour faciliter la recherche et la candidature.”</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img mb-30">
                                            <img src="assets/img/testmonial/achraf.jpg" alt="" style="width: 150px; height: 150px;">
                                            <span>Ben Mouelli Achraf</span>
                                            <p>Concepteur principal</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“Créer ce site a été une aventure passionnante. Nous avons dû relever de nombreux défis techniques et opérationnels, mais voir le nombre croissant d'utilisateurs satisfaits chaque jour rend notre travail gratifiant.”</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img mb-30">
                                            <img src="assets/img/testmonial/lina.jpg" alt="" style="width: 150px; height: 150px;">
                                            <span>Ben Salem Lina</span>
                                            <p>Directrice Créative</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“Nous avons toujours eu à cœur de maintenir des standards élevés en termes de qualité des offres d'emploi proposées sur notre plateforme. Cela implique un processus rigoureux de vérification et de validation des annonces publiées.”</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img mb-30">
                                            <img src="assets/img/testmonial/asma.jpg" alt="" style="width: 150px; height: 150px;">
                                            <span>Zhéni Asma</span>
                                            <p>Directrice des affaires sociales</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“Nous sommes constamment à l'écoute des retours de nos utilisateurs pour améliorer notre service. Leur satisfaction et leur réussite dans leur recherche d'emploi sont notre plus grande motivation.”</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img mb-30">
                                            <img src="assets/img/testmonial/ons.jpg" alt="" style="width: 150px; height: 150px;">
                                            <span>Bekri Ons</span>
                                            <p>Responsable Marketing</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“Créer ce site nous a permis de contribuer positivement à la vie des étudiants en leur offrant des opportunités professionnelles significatives. C'est une source de fierté de savoir que nous aidons à façonner leur avenir.”</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img mb-30">
                                            <img src="assets/img/testmonial/taieb.jpg" alt="" style="width: 150px; height: 150px;">
                                            <span>Bel Hadj Ali Taieb</span>
                                            <p>Directeur service financier</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“En tant que co-fondateur, je suis fier du parcours que notre plateforme a parcouru. Nous avons mis l'accent sur la simplicité d'utilisation et l'efficacité de la recherche d'emploi pour offrir une expérience utilisateur optimale.”</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
         <!-- Support Company Start-->
         
        <!-- Support Company End-->
        <!-- Blog Area Start -->
        
        <!-- Blog Area End -->

    </main>
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
        <script src="./assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
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