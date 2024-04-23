<?php 


?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Job board HTML-5 Template </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

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
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="job_listing.html">Find a Jobs </a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                    <li><a href="commandes.php">Les services</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="#" class="btn head-btn1">Register</a>
                                    <a href="#" class="btn head-btn2">Login</a>
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
   </head>
    <body>
    <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h3 class="mb-0">Ajouter un service</h3>
                    </div>
                  </div>
                  <!--formulaire taa ajout taa el service-->
                  <form id="service" action="../../view/backoffice/pages/ajouter_service.php"  method="post">
                    <section align="center">
                      <label for="titre_ser">Titre du service:</label>
                      <input type="text" id="titre" name="titres" onblur="validatetitle()">
                      <span id="titreSpan"></span>
                      <br><br>
                      <label for="titre_ser">Prix du service:</label>
                      <input type="text" id="prix" name="prixs" onblur="validatePrix()">
                      <span id="prixSpan"></span>
                      <br><br>
                      <label for="titre_ser">Durée estimée:</label>
                      <input type="text" id="duree" name="durees">
                      <span></span>
                      <br><br>
                      <label for="titre_ser">Categorie du service:</label>
                      <input type="text" id="categorie" name="categories">
                      <span></span>
                      <br><br>
                      <label for="titre_ser">Statut du service:</label>
                      <input type="text" id="statut" name="statuts" onblur="validateStatut()">
                      <span id="statutSpan"></span>

                      <br><br>
                      <label for="titre_ser">Description du service:</label>
                      <textarea type="text" id="desscription" name="descriptions" onblur="validateDescription()"></textarea>
                      <span id="descriptionSpan"></span>
                    </section>
                    <button class="btn bg-gradient-dark mb-0" type="submit">ajouter</button>
                  </form>

                  <!--   CONTROLE DE SAISIE-->
                  
                 

                  <!--   CONTROLE DE SAISIE-->


                  <!--formulaire taa ajout taa el service-->
                  </div>
                
              </div>
            </div>
            <script>
            function validatetitle() {
                var titre = document.getElementById("titre").value;
                var titreSpan = document.getElementById("titreSpan");
                if (titre.length < 10) {
                titreSpan.innerText = "Le titre est valide.";
                titreSpan.style.color = "green";
                } else {
                titreSpan.innerText = "Le titre doit avoir moins de 10 caractères.";
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