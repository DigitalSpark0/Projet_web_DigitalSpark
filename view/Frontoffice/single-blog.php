<?php


session_start();
    $showUpdateAccountButton = isset($_SESSION['user_id']);
    $showGoToBackofficeButton = $showUpdateAccountButton; // Le bouton "Go to backoffice" s'affichera également si l'utilisateur est connecté

    // Vérifier si l'utilisateur est admin ou recruteur
    $role_id = 0; // Remplacez cela par le code pour récupérer le rôle de l'utilisateur depuis la base de données
    $is_admin_or_recruteur = ($role_id === 1 || $role_id === 2);
////////////////////////////////////////////////////////////////////////
if (!class_exists('config')) {
   include "C:/xampp/htdocs/projet web integration/config.php";
}

include "C:/xampp/htdocs/projet web integration/controller/ArticleController.php";
include "C:/xampp/htdocs/projet web integration/controller/CommentaireController.php";
    $IDU = isset($_SESSION["user_id"])?$_SESSION["user_id"]:'erreur';
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
<style>

.highlight {
    background-color: pink;
}

.recent-post-image {
    max-width: 100px; 
    height: 100px; 
}

.post-image {
    max-width: 300px; 
    height: auto; 
}

.like-dislike-buttons {
    text-align: center;
}

.like-dislike-buttons button {
    padding: 10px 20px;
    margin: 0 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    display: inline-block;
    margin-right: 10px;
}

.like-dislike-buttons button i {
    margin-right: 5px;
}

/* Styles pour le bouton de like */
#like-button {
    background-color: #5cb85c; /* Vert */
    color: white;
}

/* Styles pour le bouton de dislike */
#dislike-button {
    background-color: #d9534f; /* Rouge */
    color: white;
}

.like-button {
    background-color: green; /* Couleur verte pour le bouton "Like" */
    color: white; /* Couleur du texte en blanc */
    border: none; /* Supprime les bordures */
    padding: 5px 10px; /* Ajoute un peu d'espacement autour du texte */
    cursor: pointer; /* Transforme le curseur en main au survol */
    border-radius: 5px; /* Ajoute des coins arrondis */
}

.dislike-button {
    background-color: red; /* Couleur rouge pour le bouton "Dislike" */
    color: white; /* Couleur du texte en blanc */
    border: none; /* Supprime les bordures */
    padding: 5px 10px; /* Ajoute un peu d'espacement autour du texte */
    cursor: pointer; /* Transforme le curseur en main au survol */
    border-radius: 5px; /* Ajoute des coins arrondis */
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
    <title>Détails de l'article</title>
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
      <link rel="stylesheet" href="assets/css/slick.css">
      <link rel="stylesheet" href="assets/css/nice-select.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
<script>
    function validateForm() {
        var commentValid = validateComment();
        //var auteurValid = validateAuteur();

        
        return commentValid;
    }

    function validateComment() {
    var comment = document.getElementById("comment").value;
    var commentMessage = document.getElementById("commentMessage");
    var firstChar = comment.charAt(0);

    
    if (firstChar === firstChar.toUpperCase() && comment.includes(' ')) {
        commentMessage.innerHTML = "Données valides";
        commentMessage.style.color = "green";
        return true;
    } else {
        commentMessage.innerHTML = "Veuillez saisir un commentaire commençant par une majuscule et contenant au moins un espace";
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
         $currentArticleId = $Article['id_a'];
$previousArticleId = $ArticleC->getPreviousArticleId($currentArticleId);
$nextArticleId = $ArticleC->getNextArticleId($currentArticleId);
$list2 = ($previousArticleId !== false) ? $ArticleC->listArticles1($previousArticleId) : [];
    $list3 = ($nextArticleId !== false) ? $ArticleC->listArticles1($nextArticleId) : [];
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
                     <?php if (!empty($Article['video_a'])) : ?>
                                <div class="video-container">
                                    <iframe width="760" height="415" src="<?= $Article['video_a']; ?>" frameborder="0" allowfullscreen></iframe>
                                </div>
                            <?php endif; ?>
                  </div>
               </div>
               <!-- -->
               
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                  <p class="like-info">
    <span class="align-middle">
        <button class="like-button" data-action="like" data-comment-id="<?= $Article['id_a']; ?>"><i class="far fa-thumbs-up"></i> Like</button>
        <!--<button class="dislike-button" data-action="dislike"><i class="far fa-thumbs-down"></i> Dislike</button>-->
    </span>
    <span id="num-likes">0</span> personnes aiment ça
</p>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    // Récupérer le nombre de likes depuis le stockage local
    var numLikes = localStorage.getItem('numLikes');
    if (numLikes !== null) {
        $('#num-likes').text(numLikes);
    }

    $('.like-button').click(function() {
        var commentId = $(this).data('comment-id');
        var currentLikesText = $('#num-likes').text().trim();
        var currentLikes = parseInt(currentLikesText);

        // Vérifier si l'utilisateur a déjà liké ce commentaire
        var alreadyLiked = $(this).hasClass('liked');

        // Si l'utilisateur a déjà liké, diminuer le nombre de likes, sinon l'augmenter
        var newLikes = alreadyLiked ? currentLikes - 1 : currentLikes + 1;

        $.ajax({
            type: 'POST',
            url: 'update_likes.php',
            data: { action: 'like', comment_id: commentId, likes: newLikes },
            success: function(data) {
                // Mettre à jour le nombre de likes dans le stockage local
                localStorage.setItem('numLikes', newLikes);
                $('#num-likes').text(newLikes);

                // Modifier l'apparence du bouton en fonction du like/unlike de l'utilisateur
                if (alreadyLiked) {
                    $('.like-button').removeClass('liked');
                } else {
                    $('.like-button').addClass('liked');
                }
            }
        });
    });
});

</script>


<meta property="og:title" content="<?= htmlspecialchars($Article['titre_a']) ?>" />
    <meta property="og:description" content="<?= htmlspecialchars($Article['contenu_a']) ?>" />
    <meta property="og:type" content="article" />
    <!-- Ajoutez une image si vous en avez une -->
    <!--<meta property="og:image" content="URL_DE_L_IMAGE" />-->
    <!-- Indiquez l'URL de l'article -->
    <meta property="og:url" content="http://google.com" />

    



                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                     <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://google.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>

                         <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
    <li><a href="https://twitter.com/intent/tweet?url=http://localhost/projet web integration/view/frontoffice/single-blog.php?id0=<?= $Article['id_a'] ?>&text=<?= $Article['titre_a'] ?> par <?= $Article['auteur_a'] ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
    <li><a href="https://www.linkedin.com/sharing/share-offsite/?url=http://localhost/projet web integration/view/frontoffice/single-blog.php?id0=<?= $Article['id_a'] ?>&title=<?= urlencode($Article['titre_a']) ?>&summary=<?= urlencode($Article['contenu_a']) ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
</ul>




                  </div>
                  <div class="navigation-area">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
            
                <?php foreach ($list2 as $prevArticle): ?>
                    <div class="thumb">
                        <a href="single-blog.php?id0=<?= $previousArticleId ?>">
                            <img class="recent-post-image" src="data:image/jpeg;base64,<?= $prevArticle['image_a']; ?>" alt="">
                        </a>
                    </div>
                    <div class="arrow">
                        <a href="single-blog.php?id0=<?= $previousArticleId ?>">
                            <span class="lnr text-white ti-arrow-left"></span>
                        </a>
                    </div>
                    <div class="detials">
                        <p>Article précédent</p>
                        <a href="single-blog.php?id0=<?= $previousArticleId ?>">
                            <h4><?= $prevArticle['titre_a']; ?></h4>
                        </a>
                    </div>
                <?php endforeach; ?>
            
        </div>
        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
            
                <?php foreach ($list3 as $nextArticle): ?>
                    <div class="detials">
                        <p>Article suivant</p>
                        <a href="single-blog.php?id0=<?= $nextArticleId ?>">
                            <h4><?= $nextArticle['titre_a']; ?></h4>
                        </a>
                    </div>
                    <div class="arrow">
                        <a href="single-blog.php?id0=<?= $nextArticleId ?>">
                            <span class="lnr text-white ti-arrow-right"></span>
                        </a>
                    </div>
                    <div class="thumb">
                        <a href="single-blog.php?id0=<?= $nextArticleId ?>">
                            <img class="recent-post-image" src="data:image/jpeg;base64,<?= $nextArticle['image_a']; ?>" alt="">
                        </a>
                    </div>
                <?php endforeach; ?>
            
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
                        <p>membre doué de l'équipe administrative, toujours a la recherche d'aventure et du savoir</p>
                     </div>
                  </div>
               </div>
               
               <div class="comments-area">
                  <h4><?= $CommentaireC->countCommentaires($Article['id_a']) ?> Commentaires</h4>
                  <div class="comment-list">
                  <?php } ?>
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
                  <h4>Laissez un commentaire</h4>
                  <form class="form-contact comment_form" action="AjouterCommentaire.php" id="commentForm" method="post" onsubmit="return validateForm()">
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <input type="text" class="form-control w-100" name="comment" id="comment"
                                 placeholder="votre commentaire ici" onblur="validateComment()">
                                 <span id="commentMessage" style="color:green;"></span>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="name" id="name" type="hidden" placeholder="ID" value="<?php echo $IDU; ?>">
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
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Publier</button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
               

                  <!--<aside class="single_sidebar_widget post_category_widget">
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
                  </aside>-->
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
                  <aside class="single_sidebar_widget search_widget">
    <form id="search-form">
        <div class="form-group">
            <div class="input-group mb-3">
                <input id="search-input" type="text" class="form-control" placeholder='chercher mot clé'
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'chercher mot clé'">
                <div class="input-group-append">
                    <button class="btns" type="button"><i class="ti-search"></i></button>
                </div>
            </div>
        </div>
        <!--<button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>-->
    </form>
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
                  </aside>-->
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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Votre code JavaScript -->
<script>
    $(document).ready(function() {
        $('#search-input').on('input', function() {
            var searchTerm = $(this).val().trim().toLowerCase();
            var content = $('.blog_details p').text();
            var highlightedContent = content.replace(new RegExp(searchTerm, 'gi'), function(match) {
                return '<span class="highlight">' + match + '</span>';
            });
            $('.blog_details p').html(highlightedContent);
        });
    });
</script>
</body>
</html>