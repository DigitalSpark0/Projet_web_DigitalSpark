<!doctype html>
<?php
session_start();
$showUpdateAccountButton = isset($_SESSION['user_id']);
$showGoToBackofficeButton = $showUpdateAccountButton; // Le bouton "Go to backoffice" s'affichera également si l'utilisateur est connecté

// Vérifier si l'utilisateur est admin ou recruteur
$role_id = 0; // Remplacez cela par le code pour récupérer le rôle de l'utilisateur depuis la base de données
$is_admin_or_recruteur = ($role_id === 1 || $role_id === 2);
  if (!class_exists('config')) {
    include "C:/xampp/htdocs/projet web integration/config.php";
 }
  include "C:/xampp/htdocs/projet web integration/controller/projectController.php";
  include "C:/xampp/htdocs/projet web integration/controller/tacheController.php";

  $db= config::getConnexion();
  $serviceC = new projectController();
  $list = $serviceC->listproject();

  $projectC = new tacheController();
  $tab = $projectC->listtache();


?>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Projets</title>
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
                    <img src="assets/img/logo/digitalspark.png" alt="">
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

        <!-- Hero Area Start-->
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Projets</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Hero Area End -->
        <!-- Support Company Start-->
        <div class="support-company-area fix section-padding2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="right-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2">
                                <span>La Freelance</span>
                                <h2>500+ de nos utilisateurs sont des étudiants qui veulent travailler en Freelance</h2>
                            </div>
                            <div class="support-caption">
                                
                                <p>Les étudiants qui souhaitent travailler en freelance sont souvent des individus autonomes et flexibles, dotés d'une forte motivation et d'une passion pour leur domaine d'études ou leurs compétences. Ils recherchent généralement des opportunités qui leur permettent de gérer leur emploi du temps de manière indépendante tout en développant leur expérience professionnelle. </p>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="support-location-img">
                            <img src="assets/img/service/support-img.jpg" alt="">
                            <div class="support-img-cap text-center">
                                <p>Depuis</p>
                                <span>2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Support Company End-->
        <!-- How  Apply Process Start-->
        <div class="apply-process-area apply-bg pt-150 pb-150">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle white-text text-center">
                            <h2> Project</h2>
                        </div>
                    </div>
                </div>
                <!-- Apply Process Caption -->
                  <div class="row mb-4">
                    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                      <div class="card">
                        <div class="card-header pb-0">
                          <div class="row">
                            <div class="col-lg-6 col-7">
                              <h6>Listes des Projets</h6>
                              <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <!--<span class="font-weight-bold ms-1">30 done</span> this month-->
                              </p>
                            </div>
                            <div class="col-lg-6 col-5 my-auto text-end">
                              <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>  
                        <?php
                    foreach ($list as $project) {
                    ?>
                        <div class="card-body px-0 pb-2">
                          <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IDp</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ProjectName</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ProjectCost</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TacheDemande</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    <div class="d-flex px-2 py-1">
                                      <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm"><?= $project['IDp'];?></h6>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="avatar-group mt-2">
                                      <span class="text-xs font-weight-bold"> <?php echo isset($project['ProjectName']) ? $project['ProjectName'] : ''; ?> </span>
                                    </div>
                                  </td>
                                  <td class="align-middle text-center text-sm">
                                    <span class="text-xs font-weight-bold"> <?php echo isset($project['Category']) ? $project['Category'] : ''; ?> </span>
                                  </td>
                                  <td class="align-middle">
                                    <div class="progress-wrapper w-75 mx-auto">
                                      <div class="progress-info">
                                        <div class="progress-percentage">
                                          <span class="text-xs font-weight-bold"><?php echo isset($project['Description']) ? $project['Description'] : ''; ?> </span>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="align-middle text-center text-sm">
                                    <span class="text-xs font-weight-bold"> <?php echo isset($project['ProjectCost']) ? $project['ProjectCost'] : ''; ?> </span>
                                  </td>
                                  <td class="align-middle text-center text-sm">
                                    <span class="text-xs font-weight-bold"> <?php echo isset($project['TacheDemande']) ? $project['TacheDemande'] : ''; ?> </span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <forum>
                          <a class="btn bg-gradient-dark mb-0" type="delete" href="supprimer_projects.php?id=<?php echo $project['IDp']; ?>"><i class="material-icons text-sm"></i>Delete</a>
                          <a class="btn bg-gradient-dark mb-0" type="update" href="modifier_project.php?id=<?php echo $project['IDp']; ?>"><i class="material-icons text-sm"></i>Update</a>
                          <a class="btn bg-gradient-dark mb-0 add-task-btn" href="formulaire_tache.php?id=<?php echo $project['IDp']; ?>"><i class="material-icons text-sm"></i> Add Tache</a>
                        </forum>
                        <?php }
                        ?>
                      </div>
                      <forum>
                        <a class="btn bg-gradient-dark mb-0" type="update" href="recherche_project.php?id=<?php echo $project['IDp']; ?>"><i class="material-icons text-sm"></i>Recherche</a>
                        <a class="btn bg-gradient-dark mb-0" type="update" href="stat.php?id=<?php echo $project['IDp']; ?>"><i class="material-icons text-sm"></i>Statistique</a>
                      </forum>
                    </div>
                  </div>
                  
            </div>
        </div>
        <!-- How  Apply Process End-->
        <!-- Testimonial Start -->
        
        <!-- Testimonial End -->
        <!-- Online CV Area Start -->
        <div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="assets/img/gallery/cv_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="cv-caption text-center">
                           
                            <p class="pera2"> Faites la différence avec vos projets !</p>
                            <a href="formulaire.php" class="border-btn2 border-btn4">Ajouter votre projet</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Online CV Area End-->
    
        <!-- Blog Area Start -->
        <div class="home-blog-area blog-h-padding">
            <div class="apply-process-area apply-bg pt-150 pb-150">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle white-text text-center">
                            <h2> Taches</h2>
                        </div>
                    </div>
                </div>
                <!-- Apply Process Caption -->
                <div class="row mb-4">
                    <!---------------------------------------------------------------------------------------------------------------------->
                    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                      <div class="card">
                        <div class="card-header pb-0">
                          <div class="row">
                            <div class="col-lg-6 col-7">
                              <h6>Listes des Taches</h6>
                              <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <!--<span class="font-weight-bold ms-1">30 done</span> this month-->
                              </p>
                            </div>
                            <div class="col-lg-6 col-5 my-auto text-end">
                              <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>  
                        <?php
                    foreach ($tab as $tache) {
                    ?>
                        <div class="card-body px-0 pb-2">
                          <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IDt</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IDp</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomtache</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DescriptionT</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deadline</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Priority</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Notes</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    <div class="d-flex px-2 py-1">
                                      <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm"><?php echo isset($tache['IDt']) ? $tache['IDt'] : '';?></h6>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="d-flex px-2 py-1">
                                      <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm"><?php echo isset($tache['IDp']) ? $tache['IDp'] : '';?></h6>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="avatar-group mt-2">
                                      <span class="text-xs font-weight-bold"> <?php echo isset($tache['Nomtache']) ? $tache['Nomtache'] : ''; ?> </span>
                                    </div>
                                  </td>
                                  <td class="align-middle text-center text-sm">
                                    <span class="text-xs font-weight-bold"> <?php echo isset($tache['DescriptionT']) ? $tache['DescriptionT'] : ''; ?> </span>
                                  </td>
                                  <td class="align-middle">
                                    <div class="progress-wrapper w-75 mx-auto">
                                      <div class="progress-info">
                                        <div class="progress-percentage">
                                          <span class="text-xs font-weight-bold"><?php echo isset($tache['Deadline']) ? $tache['Deadline'] : ''; ?> </span>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="align-middle text-center text-sm">
                                    <span class="text-xs font-weight-bold"> <?php echo isset($tache['Priority']) ? $tache['Priority'] : ''; ?> </span>
                                  </td>
                                  <td class="align-middle text-center text-sm">
                                    <span class="text-xs font-weight-bold"> <?php echo isset($tache['Notes']) ? $tache['Notes'] : ''; ?> </span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <forum>
                          <a class="btn bg-gradient-dark mb-0" type="delete" href="supprimer_taches.php?id=<?php echo $tache['IDt']; ?>"><i class="material-icons text-sm"></i>Delete</a>
                          <a class="btn bg-gradient-dark mb-0" type="update" href="modifier_project.php?id=<?php echo $tache['IDp']; ?>"><i class="material-icons text-sm"></i>Update</a>
                        </forum>
                        <?php }
                        ?>
                      </div>
                      <forum>
                        <a class="btn bg-gradient-dark mb-0" type="update" href="recherche_tache.php?id=<?php echo $tache['Priority']; ?>"><i class="material-icons text-sm"></i>Recherche</a>
                      </forum>
                    </div>
                  </div>
            </div>
        </div>
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