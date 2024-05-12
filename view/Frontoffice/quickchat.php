<?php
session_start();
$showUpdateAccountButton = isset($_SESSION['user_id']);
$showGoToBackofficeButton = $showUpdateAccountButton; // Le bouton "Go to backoffice" s'affichera également si l'utilisateur est connecté

// Vérifier si l'utilisateur est admin ou recruteur
$role_id = 0; // Remplacez cela par le code pour récupérer le rôle de l'utilisateur depuis la base de données
$is_admin_or_recruteur = ($role_id === 1 || $role_id === 2);
?>

<!doctype html>
<html class="no-js" lang="zxx">
<style>

textarea.form-control {
    border: 1px solid #ccc; /* Bordure */
    border-radius: 5px; /* Coins arrondis */
    padding: 10px; /* Espace intérieur */
    font-size: 16px; /* Taille de la police */
    resize: none; /* Empêcher le redimensionnement */
    background-color: #f8f9fa; /* Couleur de fond */
    color: #333; /* Couleur du texte */
}

/* Style pour le placeholder */
textarea.form-control::placeholder {
    color: #999; /* Couleur du placeholder */
}

/* Style pour le focus */
textarea.form-control:focus {
    outline: none; /* Supprimer le contour */
    border-color: #66afe9; /* Couleur de la bordure lorsqu'il est en focus */
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
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title>QuickChat</title>
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
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Discutez avec QuickChat !</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Hero Area End -->
    <!-- ================ contact section start ================= -->

    <?php

function callOpenAI($message){
// Si le formulaire est soumis
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la question de l'utilisateur depuis la requête POST
    $question = $_POST['subject'];*/

    // Appeler l'API de ChatGPT pour obtenir une réponse
    $apiKey = 'LL-teiXZMs5cK8QmPMy2scT5cszUAJV7ph8eCAXCLpgruVCqJ7gSqkHiqJu7ZgoinOM'; 
    $endpoint = 'https://api.llama-api.com/chat/completions';
    $data = array(
        'model' => 'codellama-7b-instruct', 
        'messages' => array(
            array('role' => 'system', 'content' => 'You:'),
            array('role' => 'user', 'content' => $message),
        ),
        'max_tokens' => 100,
        'temperature' => 0.7
    );
    $headers = array(
"Content-Type: application/json",
"Authorization: Bearer ".$apiKey

    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
    /*$options = array(
        'http' => array(
            'header'  => "Content-Type: application/json\r\nAuthorization: Bearer " . $apiKey,
            'method'  => 'POST',
            'content' => json_encode($data),
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($endpoint, false, $context);
    $response = json_decode($result, true);
    $answer = $response['choices'][0]['message']['content'];

    // Afficher la réponse de ChatGPT
    echo '<script>document.getElementById("message").value = "' . $answer . '";</script>';*/
}
if(isset($_POST['message']) && isset($_POST['ok'])){
    $message = $_POST['message'];
    $response = callOpenAI($message);
    $data = json_decode($response, true);
    echo '<textarea class="form-control w-100" name="message" id="message" cols="30" rows="7">' . htmlspecialchars($data['choices'][0]['message']['content']) . '</textarea>';

}

?>



    <section class="contact-section">
            <div class="container">
               
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Demandez-moi n'importe quoi ! Je suis là pour vous aider à booster votre carrière !</h2>
                    </div>
                    <div class="col-lg-8">
    <!--<form class="form-contact contact_form" method="post" id="chatForm" novalidate="novalidate">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'votre question'" placeholder="votre question">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'réponse ici'" placeholder=" réponse ici" readonly></textarea>
                </div>
            </div>
        </div>
        <div class="form-group mt-3">
            <button type="button" id="sendButton" class="button button-contactForm boxed-btn">Send</button>
        </div>
    </form>-->
    <form class="form-contact contact_form" method="POST">
        <input class="form-control" type="text" name="message" placeholder="entrez un message">
        <br>
        <input class="button button-contactForm boxed-btn" type="submit" name="ok" value="Envoyer">
        
</div>

<!--<div class="col-12">
    <br>
                <div class="form-group contact_form">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'réponse ici'" placeholder=" réponse ici" readonly><?php var_dump($data); ?></textarea>
                </div>
</div>-->

<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#sendButton').click(function(){
        var question = $('#subject').val();
        $.ajax({
            url: window.location.href,
            method: 'POST',
            data: {subject: question},
            success: function(response){
                $('#message').val(response);
            }
        });
    });
});
</script>-->
                    
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