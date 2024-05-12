<?php 
session_start();
$showUpdateAccountButton = isset($_SESSION['user_id']);
$showGoToBackofficeButton = $showUpdateAccountButton; // Le bouton "Go to backoffice" s'affichera également si l'utilisateur est connecté

// Vérifier si l'utilisateur est admin ou recruteur
$role_id = 0; // Remplacez cela par le code pour récupérer le rôle de l'utilisateur depuis la base de données
$is_admin_or_recruteur = ($role_id === 1 || $role_id === 2);

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Ajouter Service</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="">

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
    <header>
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
   </head>
    <body>
    <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-7 mb-lg-0 mb-4">
  <div class="card mt-4">
    <div class="card-header pb-0 p-3 text-center">
      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
          <h3 class="mb-0">Ajouter un service</h3>
        </div>
      </div>
    </div>
    <!-- Formulaire d'ajout de service -->
    <div class="card-body">
      <form id="service" action="../../view/frontoffice/ajouter_service.php" method="post" class="text-center">
        <div class="form-group">
          <label for="titre_ser">Titre du service:</label>
          <input type="text" id="titre" name="titres" class="form-control" onblur="validatetitle()">
          <span id="titreSpan"></span>
        </div>

        <div class="form-group">
          <label for="prix_ser">Prix du service:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">€</span>
            </div>
            <input type="text" id="prix" name="prixs" class="form-control" onblur="validatePrix()">
          </div>
          <span id="prixSpan"></span>
        </div>

        <div class="form-group">
          <label for="duree_ser">Durée estimée:</label>
          <input type="text" id="duree" name="durees" class="form-control">
        </div>

        <div class="form-group">
          <label for="categorie_ser">Catégorie du service:</label>
          <input id="categorie" name="categories" class="form-control">
            
            <!-- Ajoutez vos options de catégorie ici -->
          
        </div>

        <div class="form-group">
          <label for="statut_ser">Statut du service:</label>
          <select id="statut" name="statuts" class="form-control" onblur="validateStatut()">
            <option value="active">disponible</option>
            <option value="inactive">prochainement</option>
          </select>
          <span id="statutSpan"></span>
        </div>

        <div class="form-group">
          <label for="description_ser">Description du service:</label>
          <textarea id="description" name="descriptions" class="form-control" rows="4" onblur="validateDescription()"></textarea>
          <span id="descriptionSpan"></span>
        </div>

        <button class="btn bg-gradient-dark mb-0" type="submit">Ajouter</button>
      </form>
    </div>
  </div>
</div>
</div>
</div>
            <script>
            function validatetitle() {
                var titre = document.getElementById("titre").value;
                var titreSpan = document.getElementById("titreSpan");
                if (titre.length < 20) {
                titreSpan.innerText = "Le titre est valide.";
                titreSpan.style.color = "green";
                } else {
                titreSpan.innerText = "Le titre doit avoir moins de 20 caractères.";
                titreSpan.style.color = "red";
                }
                return false; r
            }
            function validatePrix() {
                var prix = parseFloat(document.getElementById("prix").value);
                var prixSpan = document.getElementById("prixSpan");

                // Validation du prix
                if (prix >= 10 && prix <= 1000) {
                prixSpan.innerText = "Le prix est valide.";
                prixSpan.style.color = "green";
                } else {
                prixSpan.innerText = "Le prix doit être compris entre 10 et 1000.";
                prixSpan.style.color = "red";
                }
            }
            function validateDescription() {
                var description = document.getElementById("desscription").value;
                var descriptionSpan = document.getElementById("descriptionSpan");

                // Validation de la description
                if (description.trim() !== '') {
                descriptionSpan.innerText = "La description est valide.";
                descriptionSpan.style.color = "green";
                } else {
                descriptionSpan.innerText = "La description ne peut pas être vide.";
                descriptionSpan.style.color = "red";
                }
            }
            function validateStatut() {
                var statut = document.getElementById("statut").value.toLowerCase();
                var statutSpan = document.getElementById("statutSpan");

                // Validation du statut
                if (statut === "prochainement" || statut === "disponible") {
                statutSpan.innerText = "Le statut est valide.";
                statutSpan.style.color = "green";
                } else {
                statutSpan.innerText = "Le statut doit être 'prochainement' ou 'disponible'.";
                statutSpan.style.color = "red";
                }
            }
            </script>
    </body>
</html>