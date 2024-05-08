<?php
//////////////////////////////////////////////////////////////////////////
include "C:/xampp/htdocs/ProjetWebQH/controller/ArticleController.php";
include "C:/xampp/htdocs/ProjetWebQH/controller/CommentaireController.php";
include "C:/xampp/htdocs/ProjetWebQH/controller/AbonnementController.php";
session_start();
    $NameU = isset($_SESSION["firstName"])?$_SESSION["firstName"]:'erreur';
$db = config::getConnexion();
$ArticleC = new ArticleController();

$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$sort2 = isset($_GET['sort1']) ? $_GET['sort1'] : '';


if ($sort === 'title') {
    $list = $ArticleC->listArticlesSortedByTitle();
} else {
    
    $list = $ArticleC->listArticles();
}
//$list = $ArticleC->listArticles();
$comC = new CommentaireController();

if ($sort2 === 'id') {
  $list1 = $comC->listCommentairesSortedByid();
} else {
  
  $list1 = $comC->listCommentaires1();
}
//$list1 = $comC->listCommentaires1();
$AbonnementC = new AbonnementController();
$list69 = $AbonnementC->listAbonnements();
//*****************************************************************************//

$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
$searchTerm1 = isset($_POST['search1']) ? $_POST['search1'] : '';


$listArray = $list->fetchAll(PDO::FETCH_ASSOC);



$filteredArticles = array_filter($listArray, function($Article) use ($searchTerm) {
    
    return stripos($Article['titre_a'], $searchTerm) !== false;
});

$filteredComments = [];

$nextSort = $sort === 'title' ? '' : 'title';
$nextSort1 = $sort2 === 'id' ? '' : 'id';
/////////////////////////////////////////////////////////////////////////
$totalArticles = count($filteredArticles);


$articlesPerPage = 5;


$totalPages = ceil($totalArticles / $articlesPerPage);


$pageNumber = isset($_GET['page']) ? intval($_GET['page']) : 1;


$startIndex = ($pageNumber - 1) * $articlesPerPage;


$articlesToShow = array_slice($filteredArticles, $startIndex, $articlesPerPage);

/////////////////////////////////////////////////////////////////////////

$totalComments = count($list1);


$commentsPerPage = 5;


$totalPages1 = ceil($totalComments / $commentsPerPage);


$pageNumber1 = isset($_GET['page1']) ? intval($_GET['page1']) : 1;


$startIndex1 = ($pageNumber1 - 1) * $commentsPerPage;


$commentsToShow = array_slice($list1, $startIndex1, $commentsPerPage);

?>




<!DOCTYPE html>
<html lang="en">

<style>
.article {
    display: flex;
    align-items: center; 
}

.delete-btn {
    margin-left: auto; 
}

.custom-form {
    max-height: 100%;
    overflow-y: auto; 
  }

  .modification-form {
  display: none;
}

.modification-form:target {
  display: block;
}

.btn-spaced {
    margin-right: 10px; /* Ajoutez ici l'espacement désiré entre les boutons */
  }

  .btn-spaced:last-child {
    margin-right: 0; /* Supprime la marge à droite pour le dernier bouton */
  }

  .btn {
    width: 120px; /* Largeur souhaitée */
    height: 40px; /* Hauteur souhaitée */
  }

  </style>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    QuickHire
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">


<script>
  document.addEventListener('DOMContentLoaded', function() {
  const articleLinks = document.querySelectorAll('.article .delete-btn');
  const modifyLinks = document.querySelectorAll('.article .modify-link');

  // Pour les liens '+' affichant les informations supplémentaires
  articleLinks.forEach(link => {
    if (link.textContent === '+') {
      link.addEventListener('click', function(event) {
        event.preventDefault();
        const articleId = this.getAttribute('href').split('#')[1];
        const articleInfo = document.getElementById(articleId);

        toggleDisplay(articleInfo);
      });
    }
  });

  // Pour les liens 'modifier' affichant le formulaire de modification
  modifyLinks.forEach(link => {
    link.addEventListener('click', function(event) {
      event.preventDefault();
      const modifyId = this.getAttribute('href').split('#')[1];
      const modifyForm = document.getElementById(modifyId);

      toggleDisplay(modifyForm);
    });
  });

  // Fonction pour afficher ou masquer un élément
  function toggleDisplay(element) {
    if (element.style.display === 'none' || element.style.display === '') {
      element.style.display = 'block';
    } else {
      element.style.display = 'none';
    }
  }
});

function validateTitre() {
        var titre = document.getElementById("titre").value;
        var titreMessage = document.getElementById("titreMessage");
        if (titre.length >= 10 && titre[0] === titre[0].toUpperCase()) {
            titreMessage.innerHTML = "Données valides";
            titreMessage.style.color = "green";
        } else {
            titreMessage.innerHTML = "Le titre doit commencer par une majuscule et contenir au moins 10 caractères.";
            titreMessage.style.color = "red";
        }
    }

    function validateContenu() {
        var contenu = document.getElementById("contenu").value;
        var contenuMessage = document.getElementById("contenuMessage");
        if (contenu.length >= 20 && contenu[0] === contenu[0].toUpperCase() && contenu.includes(" ") && contenu.trim().endsWith(".")) {
            contenuMessage.innerHTML = "Données valides";
            contenuMessage.style.color = "green";
        } else {
            contenuMessage.innerHTML = "Le contenu doit avoir au minimum 20 caractères, commencer par une majuscule, contenir au moins un espace et se terminer par un point.";
            contenuMessage.style.color = "red";
        }
    }

    function validateAuteur() {
        var auteur = document.getElementById("auteur").value;
        var auteurMessage = document.getElementById("auteurMessage");
        if (/^[A-Z][a-z]*$/.test(auteur)) {
            auteurMessage.innerHTML = "Données valides";
            auteurMessage.style.color = "green";
        } else {
            auteurMessage.innerHTML = "L'auteur doit contenir seulement des caractères alphabétiques et commencer par une majuscule.";
            auteurMessage.style.color = "red";
        }
    }

    function validateVideo() {
        var videoInput = document.getElementById("video").value;
        var videoMessage = document.getElementById("videoMessage");

        if (videoInput.startsWith("https://")) {
            videoMessage.textContent = "Lien de la vidéo valide.";
            videoMessage.style.color = "green";
        } else {
            videoMessage.textContent = "Le lien de la vidéo doit commencer par 'https://'.";
            videoMessage.style.color = "red";
        }
    }

    function validateForm() {
        validateTitre();
        validateContenu();
        validateAuteur();
        validateVideo();

        // Renvoie true si toutes les validations sont réussies, sinon false
        return document.querySelectorAll('span[style="color:red;"]').length === 0;
    }

            // *************************************pour le formulaire de modification ************************************************************************
            function validateTitre1() {
        var titre = document.getElementById("titre1").value;
        var titreMessage = document.getElementById("titreMessage1");
        if (titre.length >= 10 && titre[0] === titre[0].toUpperCase()) {
            titreMessage.innerHTML = "Données valides";
            titreMessage.style.color = "green";
        } else {
            titreMessage.innerHTML = "Le titre doit commencer par une majuscule et contenir au moins 10 caractères.";
            titreMessage.style.color = "red";
        }
    }

    function validateContenu1() {
        var contenu = document.getElementById("contenu1").value;
        var contenuMessage = document.getElementById("contenuMessage1");
        if (contenu.length >= 20 && contenu[0] === contenu[0].toUpperCase() && contenu.includes(" ") && contenu.trim().endsWith(".")) {
            contenuMessage.innerHTML = "Données valides";
            contenuMessage.style.color = "green";
        } else {
            contenuMessage.innerHTML = "Le contenu doit avoir au minimum 20 caractères, commencer par une majuscule, contenir au moins un espace et se terminer par un point.";
            contenuMessage.style.color = "red";
        }
    }

    function validateAuteur1() {
        var auteur = document.getElementById("auteur1").value;
        var auteurMessage = document.getElementById("auteurMessage1");
        if (/^[A-Z][a-z]*$/.test(auteur)) {
            auteurMessage.innerHTML = "Données valides";
            auteurMessage.style.color = "green";
        } else {
            auteurMessage.innerHTML = "L'auteur doit contenir seulement des caractères alphabétiques et commencer par une majuscule.";
            auteurMessage.style.color = "red";
        }
    }

    function validateVideo1() {
        var videoInput = document.getElementById("video1").value;
        var videoMessage = document.getElementById("videoMessage1");

        if (videoInput.startsWith("https://")) {
            videoMessage.textContent = "Lien de la vidéo valide.";
            videoMessage.style.color = "green";
        } else {
            videoMessage.textContent = "Le lien de la vidéo doit commencer par 'https://'.";
            videoMessage.style.color = "red";
        }
    }

    function validateForm1() {
        validateTitre1();
        validateContenu1();
        validateAuteur1();
        validateVideo1();
        // Renvoie true si toutes les validations sont réussies, sinon false
        return document.querySelectorAll('span[style="color:red;"]').length === 0;
    }
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 function validateTitre2() {
        var titre = document.getElementById("titre2").value;
        var titreMessage = document.getElementById("titreMessage2");
        if (titre.length >= 10 && titre[0] === titre[0].toUpperCase()) {
            titreMessage.innerHTML = "Données valides";
            titreMessage.style.color = "green";
        } else {
            titreMessage.innerHTML = "Le sujet doit commencer par une majuscule et contenir au moins 10 caractères.";
            titreMessage.style.color = "red";
        }
    }

    function validateContenu2() {
        var contenu = document.getElementById("contenu2").value;
        var contenuMessage = document.getElementById("contenuMessage2");
        if (contenu.length >= 20 && contenu[0] === contenu[0].toUpperCase() && contenu.includes(" ") && contenu.trim().endsWith(".")) {
            contenuMessage.innerHTML = "Données valides";
            contenuMessage.style.color = "green";
        } else {
            contenuMessage.innerHTML = "Le contenu doit avoir au minimum 20 caractères, commencer par une majuscule, contenir au moins un espace et se terminer par un point.";
            contenuMessage.style.color = "red";
        }
    }

    function validateAuteur2() {
        var auteur = document.getElementById("auteur2").value;
        var auteurMessage = document.getElementById("auteurMessage2");
        if (/^[A-Z][a-z]*$/.test(auteur)) {
            auteurMessage.innerHTML = "Données valides";
            auteurMessage.style.color = "green";
        } else {
            auteurMessage.innerHTML = "L'auteur doit contenir seulement des caractères alphabétiques et commencer par une majuscule.";
            auteurMessage.style.color = "red";
        }
    }

    function validateForm2() {
        validateTitre2();
        validateContenu2();
        

        // Renvoie true si toutes les validations sont réussies, sinon false
        return document.querySelectorAll('span[style="color:red;"]').length === 0;
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    document.getElementById('showStatistics').addEventListener('click', function(event) {
    event.preventDefault();
    fetch('get_statistics.php')
        .then(response => response.json())
        .then(data => {
            let statisticsHTML = '<h3>Category Statistics</h3><ul>';
            data.forEach(statistic => {
                statisticsHTML += '<li>' + statistic.categorie_a + ': ' + statistic.count + '</li>';
            });
            statisticsHTML += '</ul>';
            document.getElementById('statisticsContainer').innerHTML = statisticsHTML;
        })
        .catch(error => console.error('Error fetching statistics:', error));
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
</script>
<div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
<span class="mask bg-gradient-dark opacity-6"></span>
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="../../frontoffice/index.php" target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">QuickHire.tn</span>
      </a>
    </div>
    
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/dashboard.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Tableau de bord</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/tables.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Utilisateurs</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/gestion_des_services.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Services</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/virtual-reality.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Réclamations</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/rtl.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Offres</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../pages/gestion_des_articles.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Articles</span>
          </a>
        </li>
        <!--<li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/profile.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/sign-in.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/sign-up.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div>-->
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5" href="javascript:;" style="color:#ffffff;">Pages</a></li>
            <li class="breadcrumb-item text-sm active" aria-current="page" style="color:#ffffff;">Gestion des articles</li>
          </ol>
          <h6 class="font-weight-bolder mb-0" style="color:#ffffff;">Gestion des articles</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
       <div class="row">
    <div  class="col-lg-6"> <!-- Utilisez une colonne de 6 colonnes pour chaque formulaire -->
      <div>
        <center><h2 class="mb-0" style="color:#0dcaf0;">Ajouter un article</h2></center>
      </div>
      <div class="card mt-4 custom-form"> <!-- Ajoutez la classe custom-form au premier formulaire -->
        <br>
        <p class="text-sm mb-0" align="center" style="margin-left:25px;margin-right:25px;"><br>
          veuillez remplir le formulaire ci-dessous et taper sur Ajouter pour effectuer l'ajout.
          <br>
        </p>
        
        <form id="service" action="AjouterArticle.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
          <section align="center">
            <label for="titre_ser">Titre de l'article:</label>
            <input type="text" id="titre" name="titres" onblur="validateTitre()">
            <span id="titreMessage" style="color:green;"></span>
            <br><br>
            <label for="titre_ser">contenu de l'article:</label>
            <textarea type="text" id="contenu" name="contenus" onblur="validateContenu()"></textarea>
            <span id="contenuMessage" style="color:green;"></span>
            <br><br>
            <label for="titre_ser">auteur de l'article:</label>
            <input type="text" id="auteur" name="auteurs" onblur="validateAuteur()" value="<?php echo $NameU; ?>" readonly>
            <span id="auteurMessage" style="color:green;"></span>
            <br><br>
            <label for="titre_ser">catégorie:</label>
            <select id="categorie" name="categories">
                <option value="Technologies">Technologies</option>
                <option value="Art et Design">Art et Design</option>
                <option value="Litérature">Litérature</option>
                <option value="santé et bien étre">Santé et bien étre</option>
                <option value="Inspiration">Inspiration</option>
                <option value="Vie sociale">Vie sociale</option>
                </select>
                <br><br>
     <label for="titre_ser">URL de la vidéo :</label>
            <input type="text" id="video" name="videos" onblur="validateVideo()">
            <span id="videoMessage" style="color:green;"></span>
            <br><br>
      <label for="image">Sélectionner une image :</label>
     <input type="file" id="image" name="image">
     
          </section>
          <br><br>
          <button class="btn bg-gradient-dark mb-0 toast-btn" type="submit" data-target="successToast"><i class="material-icons text-sm">add</i>Ajouter</button>
          <br><br>
        </form>
        
      </div>
      <br>
    </div>
   <!-- <div class="col-lg-6"> -->
      <!--<div>
        <center><h2 class="mb-0" style="color:#0dcaf0;">Modifier un article</h2></center>
      </div>-->
      <!--<div class="card mt-4 custom-form"> 
        <p class="text-sm mb-0" align="center" style="margin-left:25px;margin-right:25px;"><br>
          veuillez remplir le formulaire ci-dessous , saisir l'identifiant de l'article a modifier et taper sur modifier (pour cela vous pouvez consulter la liste des articles figurant juste en dessous)
        </p>
        <form id="service" action="ModifierArticle.php" method="post" onsubmit="return validateForm2()" enctype="multipart/form-data">
          <section align="center">
            <label for="titre_ser">Titre de l'article:</label>
            <input type="text" id="titre2" name="titres1" onblur="validateTitre2()">
            <span id="titreMessage2" style="color:green;"></span>
            <br><br>
            <label for="titre_ser">contenu de l'article:</label>
            <textarea type="text" id="contenu2" name="contenus1" onblur="validateContenu2()"></textarea>
            <span id="contenuMessage2" style="color:green;"></span>
            <br><br>
            <label for="titre_ser">auteur de l'article:</label>
            <input type="text" id="auteur2" name="auteurs1" onblur="validateAuteur2()">
            <span id="auteurMessage2" style="color:green;"></span>
            <br><br>
            <label for="image">Sélectionner une image :</label>
     <input type="file" id="image" name="image2">
          </section>
          <br>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-lg-3 col-sm-6 col-12">
              </div>
              <div class="col-lg-3 col-sm-6 col-12 mt-sm-0 mt-2">
                <input class="btn bg-gradient-info w-100 mb-0 toast-btn" type="text" id="id1" name="id1s" placeholder="id">
              </div>
              <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                <button class="btn bg-gradient-success w-100 mb-0 toast-btn" type="submit" data-target="warningToast" >Modif</button>
              </div>
              <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>-->


<div class="col-lg-6"> 
      <div>
        <center><h2 class="mb-0" style="color:#0dcaf0;">Envoyer un e-mail aux abonnés</h2></center>
      </div>
      <div class="card mt-4 custom-form"> 
        <p class="text-sm mb-0" align="center" style="margin-left:25px;margin-right:25px;"><br>
          veuillez remplir le formulaire ci-dessous , saisir le sujet ainsi que le contenu de l'email et appuyer sur envoyer
        </p>
        <form id="service" action="envoyermail.php" method="post" onsubmit="return validateForm2()">
          <section align="center">
            <label for="titre_ser">Sujet de l'email:</label>
            <input type="text" id="titre2" name="titres69" onblur="validateTitre2()">
            <span id="titreMessage2" style="color:green;"></span>
            <br><br>
            <label for="titre_ser">contenu de l'email:</label>
            <textarea type="text" id="contenu2" name="contenus69" onblur="validateContenu2()"></textarea>
            <span id="contenuMessage2" style="color:green;"></span>
            <br><br>
          </section>
          
          <div class="card-body p-3">
            <div class="row">
              <div class="col-lg-3 col-sm-6 col-12">
              </div>
              <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                <button class="btn bg-gradient-success w-100 mb-0 toast-btn" type="submit" data-target="warningToast" >Send</button>
              </div>
              <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
              </div>
            </div>
          </div>
        </form>
      </div>
      <br>
      <div>
        <center><h2 class="mb-0" style="color:#0dcaf0;">Liste des abonnés</h2></center>    
      </div>
      <div class="card mt-4" style="overflow-y: scroll;">
      
        <!-- Liste des commentaires récents -->
        <?php foreach ($list69 as $Abonnement) {
          
         ?>
          <div class="card-body p-3 pb-0">
            <div class="alert alert-info alert-dismissible text-white" role="alert">
              <div class="article">
                <b><span class="text-sm"><?= $Abonnement['id_ab']; ?>.</span></b>
                <span class="text-sm"><?= $Abonnement['email_ab']; ?></span>
                <a class="alert-link text-white"> ------------<?= $Abonnement['date_ab']; ?></a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    
  </div>



</div>



          
<div class="container-fluid py-4">
  <div class="row">
    <!-- Partie gauche : Recherche + Liste des articles -->
    <div class="col-lg-6">
      <div>
        <center><h2 class="mb-0" style="color:#0dcaf0;">Liste des articles</h2></center>    
      </div>
      <br>
      <div class="input-group input-group-outline">
        <form id="form_search" class="input-group input-group-outline" action="gestion_des_articles.php" method="post">
          <label class="form-label">Rechercher</label>
          <input style="color: white;" type="text" class="form-control" name="search">
          <button class="btn bg-gradient-success mb-0 toast-btn" type="submit">Chercher</button>
        </form>
      </div>
      <br>
      <div class="d-flex justify-content-center">
      <a href="generate_pdf.php" class="btn bg-gradient-info mb-0 toast-btn btn-spaced">Exporter</a>
      <a href="gestion_des_articles.php?sort=<?= $nextSort ?>" class="btn bg-gradient-info mb-0 toast-btn btn-spaced">Trier</a>
      <a href="#" class="btn bg-gradient-warning mb-0 toast-btn btn-spaced" id="showStatistics">Stat</a>
</div>

<div id="statisticsContainer" style="display: none;">
<br>
<canvas id="categoryPieChart" width="400" height="400"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
let statisticsVisible = false;
let pieChart;

const toggleStatistics = async () => {
    const statisticsContainer = document.getElementById('statisticsContainer');
    statisticsVisible = !statisticsVisible;
    if (statisticsVisible) {
        statisticsContainer.style.display = 'block';
        try {
            const response = await fetch('get_statistics.php');
            const data = await response.json();

            let categories = [];
            let counts = [];
            let totalArticles = 0;
            
            data.forEach(statistic => {
                categories.push(statistic.categorie_a);
                counts.push(statistic.count);
                totalArticles += statistic.count;
            });
            
            // Calculate percentages
            let percentages = counts.map(count => Math.round((count / totalArticles) * 100));

            // Update chart data
            pieChart.data.labels = categories;
            pieChart.data.datasets[0].data = counts;
            pieChart.update();
        } catch (error) {
            console.error('Error fetching statistics:', error);
        }
    } else {
        statisticsContainer.style.display = 'none';
    }
};

document.getElementById('showStatistics').addEventListener('click', toggleStatistics);

// Initialize pie chart
document.addEventListener('DOMContentLoaded', () => {
    let ctx = document.getElementById('categoryPieChart').getContext('2d');
    pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [],
            datasets: [{
                data: [],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Category Distribution'
            }
        }
    });
});
</script>
      <div class="card mt-4">
        <!-- Liste des articles -->
        <?php foreach ($articlesToShow as $Article) { 
          $com1C = new CommentaireController();
          $list2 = $com1C->listCommentaires($Article['id_a']);
          
          ?>
          <div class="card-body p-3 pb-0">
            <div class="alert alert-primary alert-dismissible text-white" role="alert">
              <div class="article">
                <b><span class="text-sm"><?= $Article['id_a']; ?>.</span></b>
                <span class="text-sm"><?= $Article['titre_a']; ?></span>
                <a href="../../frontoffice/single-blog.php?id0=<?php echo urlencode($Article['id_a']); ?>" class="alert-link text-white"> -------(Cliquez-ici pour afficher)</a>
                <a href="#modifyArticle<?php echo $Article['id_a']; ?>" class="delete-btn modify-link">modifier</a>
                <a href="SupprimerArticle.php?id=<?php echo $Article['id_a']; ?>" class="delete-btn">x</a>
                <a href="#articleInfo<?php echo $Article['id_a']; ?>" class="delete-btn">+</a>
              </div>
            </div>
            <div id="articleInfo<?php echo $Article['id_a']; ?>" class="article-info" style="display: none;">
              <b> Détails de l'article :</b><br><br>
              <b>ID: </b> <?php echo $Article['id_a']; ?><br>
              <b>Titre: </b> <?php echo $Article['titre_a']; ?><br>
              <b>Contenu: </b> <?php echo $Article['contenu_a']; ?><br>
              <b>Auteur: </b> <?php echo $Article['auteur_a']; ?><br>
              <b>Catégorie: </b> <?php echo $Article['categorie_a']; ?><br><br>
              <b>Commentaires :</b><br><br>
              <?php foreach ($list2 as $Commentaire) { ?>
                <div class="card-body p-3 pb-0">
                  <div class="alert alert-success alert-dismissible text-white" role="alert">
                    <div class="article">
                      <b><span class="text-sm"><?= $Commentaire['id_ut']; ?>.</span></b>
                      <span class="text-sm"><?= $Commentaire['contenu_c']; ?></span>
                      <a href="../../frontoffice/single-blog.php?id0=<?php echo urlencode($Commentaire['id_ar']); ?>" class="alert-link text-white"> -------(Cliquez-ici pour afficher)</a>
                      <a href="SupprimerCommentaire1.php?idcom1=<?php echo $Commentaire['id_c']; ?>" class="delete-btn">x</a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
            <div id="modifyArticle<?php echo $Article['id_a']; ?>" class="modification-form">
              <!-- Formulaire de modification -->
              <form id="service" action="ModifierArticle.php" method="post" onsubmit="return validateForm1()" enctype="multipart/form-data">
                <!-- Votre formulaire de modification ici -->
                <section align="center">
                  <label for="titre_ser">Titre de l'article:</label>
                  <input type="text" id="titre1" name="titres1" onblur="validateTitre1()" value=<?php echo $Article['titre_a']; ?>>
                  <span id="titreMessage1" style="color:green;"></span>
                  <br><br>
                  <label for="titre_ser">contenu de l'article:</label>
                  <textarea id="contenu1" onblur="validateContenu1()" name="contenus1"><?php echo $Article['contenu_a']; ?></textarea>
                  <span id="contenuMessage1" style="color:green;"></span>
                  <br><br>
                  <label for="titre_ser">auteur de l'article:</label>
                  <input type="text" id="auteur1" onblur="validateAuteur1()" name="auteurs1" value=<?php echo $NameU; ?> readonly>
                  <span id="auteurMessage1" style="color:green;"></span>
                  <br><br>
                  <label for="titre_ser">catégorie:</label>
            <select id="categorie" name="categories1">
                <option value="Technologies">Technologies</option>
                <option value="Art et Design">Art et Design</option>
                <option value="Litérature">Litérature</option>
                <option value="santé et bien étre">Santé et bien étre</option>
                <option value="Inspiration">Inspiration</option>
                <option value="Vie sociale">Vie sociale</option>
                </select>
                <br><br>
     <label for="titre_ser">URL de la vidéo :</label>
            <input type="text" id="video1" name="videos1" onblur="validateVideo1()">
            <span id="videoMessage1" style="color:green;"></span>
            <br><br>
                  <label for="image2">Sélectionner une image :</label>
     <input type="file" id="image2" name="image2">
                  <input type="hidden" id="ida1" name="id1s" value=<?php echo $Article['id_a'];?>>
                </section>
                <br>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                      <button class="btn bg-gradient-success w-100 mb-0 toast-btn" type="submit" data-target="infoToast">Modif</button>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            
          </div>
          
        <?php } ?>
        
      </div> 
      <br>  
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
                
    
    <!-- Partie droite : Commentaires récents -->
    <div class="col-lg-6">
      <div>
        <center><h2 class="mb-0" style="color:#0dcaf0;">Commentaires récents</h2></center>    
      </div>
      <br>
      <div class="input-group input-group-outline">
        <form id="form_search" class="input-group input-group-outline" action="gestion_des_articles.php" method="post">
          <label class="form-label">Rechercher</label>
          <input style="color: white;" type="text" class="form-control" name="search1">
          <button class="btn bg-gradient-success mb-0 toast-btn" type="submit">Chercher</button>
        </form>
      </div>
      <br>
      <div class="d-flex justify-content-center">
      <a href="generate_pdf1.php" class="btn bg-gradient-info mb-0 toast-btn btn-spaced">Exporter</a>
      <a href="gestion_des_articles.php?sort1=<?= $nextSort1 ?>" class="btn bg-gradient-info mb-0 toast-btn btn-spaced">Trier</a>
</div>

      <div class="card mt-4" >
        <!-- Liste des commentaires récents -->
        <?php foreach ($commentsToShow as $Commentaire) {
          if (stripos($Commentaire['id_ut'], $searchTerm1) !== false) {
            $filteredComments[] = $Commentaire;
         ?>
          <div class="card-body p-3 pb-0">
            <div class="alert alert-success alert-dismissible text-white" role="alert">
              <div class="article">
                <b><span class="text-sm"><?= $Commentaire['id_ut']; ?>.</span></b>
                <span class="text-sm"><?= $Commentaire['contenu_c']; ?></span>
                <a href="../../frontoffice/single-blog.php?id0=<?php echo urlencode($Commentaire['id_ar']); ?>" class="alert-link text-white"> -------(Cliquez-ici pour afficher)</a>
                <a href="SupprimerCommentaire1.php?idcom1=<?php echo $Commentaire['id_c']; ?>" class="delete-btn">x</a>
              </div>
            </div>
          </div>
        <?php } }?>
      </div>
      <br>  
      <nav class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">
        <?php for ($j = 1; $j <= $totalPages1; $j++) { ?>
            <li class="page-item <?= $j == $pageNumber1 ? 'active' : '' ?>">
                <a href="?page1=<?= $j ?>" class="page-link"><?= $j ?></a>
            </li>
        <?php } ?>
    </ul>
</nav>
    </div>
    
  </div>
  
</div>

        

      <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successToast" aria-atomic="true">
          <div class="toast-header border-0">
            <i class="material-icons text-success me-2">
        check
      </i>
            <span class="me-auto font-weight-bold">Ajout </span>
            <small class="text-body">Now</small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body">
            Ajout effectué avec succés !
          </div>
        </div>
        <div class="toast fade hide p-2 mt-2 bg-gradient-info" role="alert" aria-live="assertive" id="infoToast" aria-atomic="true">
          <div class="toast-header bg-transparent border-0">
            <i class="material-icons text-white me-2">
        Gestion des articles
      </i>
            <span class="me-auto text-white font-weight-bold">Modification </span>
            <small class="text-white">Now</small>
            <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal light m-0">
          <div class="toast-body text-white">
            modification effectuée avec succés !
          </div>
        </div>
        <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="warningToast" aria-atomic="true">
          <div class="toast-header border-0">
            <i class="material-icons text-warning me-2">
        travel_explore
      </i>
            <span class="me-auto font-weight-bold">Envoi mail </span>
            <small class="text-body">Now</small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body">
            Envoi de l'email avec succés ! 
          </div>
        </div>
        <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="dangerToast" aria-atomic="true">
          <div class="toast-header border-0">
            <i class="material-icons text-danger me-2">
        campaign
      </i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Material Dashboard </span>
            <small class="text-body">11 mins ago</small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body">
            Hello, world! This is a notification message.
          </div>
        </div>
      </div>
      <footer class="footer py-4  ">
        
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn btn-outline-dark w-100" href="">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>