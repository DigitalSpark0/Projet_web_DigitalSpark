<?php
////////////////////////////////////////////////////////////////////////
if (!class_exists('config')) {
   include "C:/xampp/htdocs/ProjetWebQH/config.php";
}

include "C:/xampp/htdocs/ProjetWebQH/controller/ArticleController.php";
include "C:/xampp/htdocs/ProjetWebQH/controller/CommentaireController.php";

$id00 = isset($_GET["id0"])?$_GET["id0"]:'error';
$db = config::getConnexion();
$ArticleC = new ArticleController();
$list = $ArticleC->listArticles1($id00);
$CommentaireC = new CommentaireController();
$list1 = $CommentaireC->listCommentaires($id00);
///////////////////////////////////////////////////////////////////////

?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job board HTML-5 Template </title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
  
   <!-- CSS here -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="assets/css/slicknav.css">
      <link rel="stylesheet" href="assets/css/price_rangs.css">
      <link rel="stylesheet" href="assets/css/animate.min.css">
      <link rel="stylesheet" href="assets/css/magnific-popup.css">
      <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/slick.css">
      <link rel="stylesheet" href="assets/css/nice-select.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
<script>
    function validateForm() {
        var commentValid = validateComment();
        var auteurValid = validateAuteur();

        // Renvoie true si toutes les validations sont réussies, sinon false
        return commentValid && auteurValid;
    }

    function validateComment() {
        var comment = document.getElementById("comment").value;
        var commentMessage = document.getElementById("commentMessage");
        if (comment.trim() !== "") {
            commentMessage.innerHTML = "Données valides";
            commentMessage.style.color = "green";
            return true;
        } else {
            commentMessage.innerHTML = "Veuillez saisir un commentaire commencant par une majuscule et contenant au moins un espace";
            commentMessage.style.color = "red";
            return false;
        }
    }

    function validateAuteur() {
        var auteur = document.getElementById("name").value;
        var auteurMessage = document.getElementById("auteurMessage");
        if (!isNaN(auteur) && auteur >= 1 && auteur <= 999) {
            auteurMessage.innerHTML = "Données valides";
            auteurMessage.style.color = "green";
            return true;
        } else {
            auteurMessage.innerHTML = "L'identifiant doit être un nombre non nul et entre 1 et 999.";
            auteurMessage.style.color = "red";
            return false;
        }
    }

    function validateComment1() {
        var comment = document.getElementById("comment1").value;
        var commentMessage = document.getElementById("commentMessage1");
        if (comment.trim() !== "") {
            commentMessage.innerHTML = "Données valides";
            commentMessage.style.color = "green";
            return true;
        } else {
            commentMessage.innerHTML = "Veuillez saisir un commentaire commencant par une majuscule et contenant au moins un espace";
            commentMessage.style.color = "red";
            return false;
        }
    }

    function validateForm1() {
        var commentValid = validateComment1();
        

        // Renvoie true si toutes les validations sont réussies, sinon false
        return commentValid;
    }

</script>
   <!-- Preloader Start -->
   <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
               <div class="preloader-circle"></div>
               <div class="preloader-img pere-text">
                  <img src="assets/img/logo/logo.png" alt="">
               </div>
            </div>
      </div>
   </div>
   <!-- Preloader Start-->
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
                                          <li><a href="index.html">Abassi Fedi 2A24</a></li>
                                          <li><a href="job_listing.html">Find a Jobs </a></li>
                                          <li><a href="about.html">About</a></li>
                                          <li><a href="#">Page</a>
                                              <ul class="submenu">
                                                  <li><a href="blog.php">Articles</a></li>
                                                  <li><a href="single-blog.php">Blog Details</a></li>
                                                  <li><a href="elements.html">Elements</a></li>
                                                  <li><a href="commandes.html">Les commandes</a></li>
                                              </ul>
                                          </li>
                                          <li><a href="contact.html">Contact</a></li>
                                      </ul>
                                  </nav>
                              </div>          
                              <!-- Header-btn -->
                              <div class="header-btn d-none f-right d-lg-block">
                                  <a href="#" class="btn head-btn1">Register</a>
                                  <a href="../../view/backoffice/pages/gestion_des_articles.php" class="btn head-btn2">Login</a>
                              </div>
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
                          <h2>Détails de l'article</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
   </div>
   <!-- Hero Area End -->
   <!--================Blog Area =================-->
   <?php

        foreach ($list as $Article) {
        ?>
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="data:image/jpeg;base64,<?= $Article['image_a']; ?>" alt="">
                  </div>
                  <div class="blog_details">
                     <h2><?= $Article['titre_a']; ?>
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i><?= $Article['auteur_a']; ?></a></li>
                        <li><a><i class="fa fa-comments"></i><?= $Article['date_p']; ?></a></li>
                     </ul>
                     <p class="excert">
                        <?= $Article['contenu_a']; ?>
                     </p>
                     
                  </div>
               </div>
               <!-- -->
               
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                        people like this</p>
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                     </ul>
                  </div>
                  <div class="navigation-area">
                     <div class="row">
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="assets/img/post/preview.png" alt="">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           </div>
                           <div class="detials">
                              <p>Prev Post</p>
                              <a href="#">
                                 <h4>Space The Final Frontier</h4>
                              </a>
                           </div>
                        </div>
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           <div class="detials">
                              <p>Next Post</p>
                              <a href="#">
                                 <h4>Telescopes 101</h4>
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="assets/img/post/next.png" alt="">
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="blog-author">
                  <div class="media align-items-center">
                     <img src="assets/img/blog/author.png" alt="">
                     <div class="media-body">
                        <a href="#">
                           <h4><?= $Article['auteur_a']; ?></h4>
                        </a>
                        <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                           our dominion twon Second divided from</p>
                     </div>
                  </div>
               </div>
               <?php } ?>
               <div class="comments-area">
                  <h4>05 Comments</h4>
                  <div class="comment-list">
                  <?php
        foreach ($list1 as $Commentaire) {
        ?>
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="assets/img/comment/comment_1.png" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 <?= $Commentaire['contenu_c']; ?>
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#"><?= $Commentaire['id_ut']; ?></a>
                                    </h5>
                                    <p class="date"><?= $Commentaire['date_c']; ?></p>
                                 </div>
                                 <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                    
                                 </div>
                                 <div class="reply-btn">
                                 <a href="SupprimerCommentaire.php?idcom=<?php echo $Commentaire['id_c']; ?>&id011=<?php echo $id00; ?>" class="btn-reply text-uppercase">supprimer</a>
                               </div>
                              </div>
                              <form id="formmodcom" action="ModifierCommentaire.php" method="post" onsubmit="return validateForm1()">
                              <div class="d-flex align-items-center">
                              <input style=" height:50px;" type="text" class="form-control w-100" name="comment1" id="comment1" onblur="validateComment1()">
                                 
                              <input type="hidden" class="form-control w-100" name="idh" id="idh" value=<?php echo $Commentaire['id_c']; ?>>
                              <input type="hidden" value=<?php echo $id00; ?> name="id010">
                                 
                                 <div class="reply-btn">
                                 <button style="width:100px; height:50px;" type="submit" class="btn bg-gradient-success w-100 mb-0 toast-btn">modifier</button>
                                 
        </div>
        
        </div>
        <span id="commentMessage1" style="color:green;"></span>
        </form>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
                  
                  
               </div>
               <div class="comment-form">
                  <h4>Leave a Reply</h4>
                  <form class="form-contact comment_form" action="AjouterCommentaire.php" id="commentForm" method="post" onsubmit="return validateForm()">
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <input type="text" class="form-control w-100" name="comment" id="comment"
                                 placeholder="Write Comment" onblur="validateComment()">
                                 <span id="commentMessage" style="color:green;"></span>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="name" id="name" type="text" placeholder="ID" onblur="validateAuteur()">
                              <span id="auteurMessage" style="color:green;"></span>
                           </div>
                        </div>

                        
                        <div class="col-sm-6">
                           <div class="form-group">
                           <input type="hidden" value=<?php echo $id00; ?> name="id000">
                           </div>
                        </div>
                        
                     </div>
                     

                     <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                     <form action="#">
                        <div class="form-group">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder='Search Keyword'
                                 onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                              <div class="input-group-append">
                                 <button class="btns" type="button"><i class="ti-search"></i></button>
                              </div>
                           </div>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                           type="submit">Search</button>
                     </form>
                  </aside>
                  <aside class="single_sidebar_widget post_category_widget">
                     <h4 class="widget_title">Category</h4>
                     <ul class="list cat-list">
                        <li>
                           <a href="#" class="d-flex">
                              <p>Resaurant food</p>
                              <p>(37)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Travel news</p>
                              <p>(10)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Modern technology</p>
                              <p>(03)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Product</p>
                              <p>(11)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Inspiration</p>
                              <p>(21)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Health Care</p>
                              <p>(21)</p>
                           </a>
                        </li>
                     </ul>
                  </aside>
                  <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title">Recent Post</h3>
                     <div class="media post_item">
                        <img src="assets/img/post/post_1.png" alt="post">
                        <div class="media-body">
                           <a href="single-blog.php">
                              <h3>From life was you fish...</h3>
                           </a>
                           <p>January 12, 2019</p>
                        </div>
                     </div>
                     <div class="media post_item">
                        <img src="assets/img/post/post_2.png" alt="post">
                        <div class="media-body">
                           <a href="single-blog.php">
                              <h3>The Amazing Hubble</h3>
                           </a>
                           <p>02 Hours ago</p>
                        </div>
                     </div>
                     <div class="media post_item">
                        <img src="assets/img/post/post_3.png" alt="post">
                        <div class="media-body">
                           <a href="single-blog.php">
                              <h3>Astronomy Or Astrology</h3>
                           </a>
                           <p>03 Hours ago</p>
                        </div>
                     </div>
                     <div class="media post_item">
                        <img src="assets/img/post/post_4.png" alt="post">
                        <div class="media-body">
                           <a href="single-blog.php">
                              <h3>Asteroids telescope</h3>
                           </a>
                           <p>01 Hours ago</p>
                        </div>
                     </div>
                  </aside>
                  <aside class="single_sidebar_widget tag_cloud_widget">
                     <h4 class="widget_title">Tag Clouds</h4>
                     <ul class="list">
                        <li>
                           <a href="#">project</a>
                        </li>
                        <li>
                           <a href="#">love</a>
                        </li>
                        <li>
                           <a href="#">technology</a>
                        </li>
                        <li>
                           <a href="#">travel</a>
                        </li>
                        <li>
                           <a href="#">restaurant</a>
                        </li>
                        <li>
                           <a href="#">life style</a>
                        </li>
                        <li>
                           <a href="#">design</a>
                        </li>
                        <li>
                           <a href="#">illustration</a>
                        </li>
                     </ul>
                  </aside>
                  <aside class="single_sidebar_widget instagram_feeds">
                     <h4 class="widget_title">Instagram Feeds</h4>
                     <ul class="instagram_row flex-wrap">
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                           </a>
                        </li>
                     </ul>
                  </aside>
                  <aside class="single_sidebar_widget newsletter_widget">
                     <h4 class="widget_title">Newsletter</h4>
                     <form action="#">
                        <div class="form-group">
                           <input type="email" class="form-control" onfocus="this.placeholder = ''"
                              onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                           type="submit">Subscribe</button>
                     </form>
                  </aside>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->
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
      <!-- Date Picker -->
      <script src="./assets/js/gijgo.min.js"></script>
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