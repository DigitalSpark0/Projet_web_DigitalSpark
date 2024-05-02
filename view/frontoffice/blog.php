<?php
/////////////////////////////////////////////////////
if (!class_exists('config')) {
    include "C:/xampp/htdocs/ProjetWebQH/config.php";
 }

include "C:/xampp/htdocs/ProjetWebQH/controller/ArticleController.php";
include "C:/xampp/htdocs/ProjetWebQH/controller/CommentaireController.php";

$db = config::getConnexion();
$ArticleC = new ArticleController();
$list = $ArticleC->listArticles();
$CommentaireC = new CommentaireController();

$searchTerm2 = isset($_POST['search2']) ? $_POST['search2'] : '';


$listArray1 = $list->fetchAll(PDO::FETCH_ASSOC);



$filteredArticles = array_filter($listArray1, function($Article) use ($searchTerm2) {
    
    return stripos($Article['titre_a'], $searchTerm2) !== false;
});

$categories = array_unique(array_column($listArray1, 'categorie_a'));


if (isset($_GET['category']) && in_array($_GET['category'], $categories)) {
    $selectedCategory = $_GET['category'];
    $filteredArticles = array_filter($filteredArticles, function($Article) use ($selectedCategory) {
        return $Article['categorie_a'] === $selectedCategory;
    });
}

$totalArticles = count($filteredArticles);


$articlesPerPage = 3;


$totalPages = ceil($totalArticles / $articlesPerPage);


$pageNumber = isset($_GET['page']) ? intval($_GET['page']) : 1;


$startIndex = ($pageNumber - 1) * $articlesPerPage;


$articlesToShow = array_slice($filteredArticles, $startIndex, $articlesPerPage);

////////////////////////////////////////////////////
?>

<!doctype html>
<html class="no-js" lang="zxx">
<style>

.recent-post-image {
    max-width: 100px; 
    height: 100px; 
}

.post-image {
    max-width: 300px; 
    height: auto; 
}

</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title>Articles</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/image_2024-03-10_171426764-removebg-preview.png">
    
    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/price_rangs.css">
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
                            <a  href="index.html"><img width="200" height="150" src="assets/img/image_2024-03-10_171426764-removebg-preview.png" alt=""></a>
                            </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="index.html">Accueil</a></li>
                                            <li><a href="job_listing.html">Services</a></li>
                                            <li><a href="about.html">Réclamations</a></li>
                                            <li><a href="blog.php">Articles</a>
                                                <!--<ul class="submenu">
                                                    <li><a href="blog.php">Articles</a></li>
                                                    <li><a href="single-blog.php">Blog Details</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                    <li><a href="commandes.html">Les commandes</a></li>
                                                </ul>-->
                                            </li>
                                            <li><a href="contact.php">QuickChat</a></li>
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
                            <h2>Nos Articles</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0" style="height: 2200px; overflow-y: auto;">
                    <div class="blog_left_sidebar">
                        
                                <?php
        foreach ($articlesToShow as $Article) {
        ?>
        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="data:image/jpeg;base64,<?= $Article['image_a']; ?>" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3><?= date("Y-m-d", strtotime($Article['date_p'])); ?></h3>
                                    <p><?= date("H:i:s", strtotime($Article['date_p'])); ?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                            <a class="d-inline-block" href="single-blog.php?id0=<?php echo $Article['id_a']; ?>"><h2><?= $Article['titre_a']; ?></h2></a>
                                
                                <!--<p><?php// echo $Article['contenu_a']; ?></p>-->
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i><?= $Article['auteur_a']; ?></a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i><?= $CommentaireC->countCommentaires($Article['id_a']) ?> Commentaires</a></li>
                                </ul>
                                
                            </div>
                        </article>

                        <?php } ?>

                        <nav class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <li class="page-item <?= $i == $pageNumber ? 'active' : '' ?>">
                <a href="?page=<?= $i ?>" class="page-link"><?= $i ?></a>
            </li>
        <?php } ?>
    </ul>
</nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="blog.php" method="post">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Mot clé de recherche'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Mot clé de recherche'" name="search2">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Chercher</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Catégories</h4>
                            <ul class="list cat-list">
                            <?php foreach ($categories as $category): ?>
        <li>
            <a href="blog.php?category=<?= urlencode($category) ?>" class="d-flex">
                <p><?= $category ?></p>
                <p>(<?= count(array_filter($listArray1, function($Article) use ($category) {
                    return $Article['categorie_a'] === $category;
                })) ?>)</p>
            </a>
        </li>
    <?php endforeach; ?>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
    <h3 class="widget_title">Articles récents</h3>
    <?php
    $articleController = new ArticleController();
    $recentArticles = $articleController->listRecentArticles();

    foreach ($recentArticles as $Article) {
        // Calcul du temps écoulé
        $dateAdded = new DateTime($Article['date_p']);
        $now = new DateTime();
        $interval = $now->diff($dateAdded);
        $timeElapsed = '';

        if ($interval->y > 0) {
            $timeElapsed = $interval->format('%y years ago');
        } elseif ($interval->m > 0) {
            $timeElapsed = $interval->format('%m months ago');
        } elseif ($interval->d > 0) {
            $timeElapsed = $interval->format('%d days ago');
        } elseif ($interval->h > 0) {
            $timeElapsed = $interval->format('%h hours ago');
        } elseif ($interval->i > 0) {
            $timeElapsed = $interval->format('%i minutes ago');
        } else {
            $timeElapsed = 'Just now';
        }
    ?>
        <div class="media post_item">
            <img class="recent-post-image" src="data:image/jpeg;base64,<?= $Article['image_a']; ?>" alt="post">
            <div class="media-body">
                <a href="single-blog.php?id0=<?php echo $Article['id_a']; ?>">
                    <h3><?= $Article['titre_a']; ?></h3>
                </a>
                <p><?= $timeElapsed; ?></p>
            </div>
        </div>
    <?php } ?>
</aside>

                        <!--<aside class="single_sidebar_widget tag_cloud_widget">
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
                        </aside>-->


                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>

                            <form action="newsletter.php" method="post">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Tapez votre email !' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">S'abonner</button>
                            </form>
                             <br>
                            <form action="deletesub.php" method="post">
                                <div class="form-group">
                                    <input type="email" name="email1" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Tapez votre email !' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Se désabonner</button>
                            </form>

                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
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