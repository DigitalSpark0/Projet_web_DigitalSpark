<?php 
$idssupdate = $_GET["idd"];

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
   </head>
    <body>
    <header>
        
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="index.html"><img width="200" height="150" src="assets/img/logoquickhire.png" alt=""></a>
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
                                            <!-- Header-btn -->
                               
                                            <div>
                                                <a class="custom-link" href ="http://localhost/projet%20web%20(gestion%20services)/view/backoffice/pages/gestion_des_services.php">to the back office</a>
                                              </div>
                                              <style>
                                              /* Style du lien */
                                              a.custom-link {
                                                  color: black; /* Couleur du texte */
                                                  text-decoration: none; /* Supprimer le soulignement par défaut */
                                                  font-weight: bold; /* Gras */
                                                  padding: 10px 20px; /* Ajouter de l'espace autour du texte */
                                                  border: 2px solid black; /* Bordure noire */
                                                  border-radius: 10px; /* Bordure arrondie */
                                                  background-color: pink; /* Fond rose */
                                                  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); /* Ombre */
                                                  transition: all 0.3s ease; /* Transition fluide pour l'effet hover */
                                              }
                                      
                                              /* Style du lien lorsqu'il est survolé */
                                              a.custom-link:hover {
                                                  background-color: black; /* Changement de couleur de fond au survol */
                                                  color: pink; /* Changement de couleur de texte au survol */
                                                  box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.7); /* Ombre plus prononcée au survol */
                                              }
                                          </style>
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
    <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    
                  </div>
                  <section align="center">
                  <div class="col-6 d-flex" align="center">
                        <h3 class="modif" >modifier un service</h3>
                    </div>
                  <form id="service" action="updateservice2.php" method="post" onsubmit="return validateForm()">
                      <label for="titre_ser">Titre du service:</label>
                      <input type="text" id="titre" name="titres2">
                      <br><br>
                      <label for="titre_ser">Prix du service:</label>
                      <input type="text" id="prix" name="prixs2">
                      <br><br>
                      <label for="titre_ser">Durée estimée:</label>
                      <input type="text" id="duree" name="durees2">
                      <br><br>
                      <label for="titre_ser">Categorie du service:</label>
                      <input type="text" id="categorie" name="categories2">
                      <br><br>
                      <label for="titre_ser">Statut du service:</label>
                      <input type="text" id="statut" name="statuts2">
                      <br><br>
                      <label for="titre_ser">Description du service:</label>
                      <textarea type="text" id="desscription" name="descriptions2"></textarea>
                      <br><br>
                      <input type="hidden" name="idupmodif"value="<?php echo $idssupdate ?>">
                    </section>
                    <button class="modiff" type="submit">modifier</button>
                  </form>
                  <style>
        /* Style général du formulaire */
        .modif {
            margin: 0; /* Supprime les marges par défaut */
            color: black; /* Couleur du texte */
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Ombre portée */
        }
        .modiff {
            width: 100%;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Ombre portée */
        }

        /* Changement de couleur du bouton au survol */
        .modiff:hover {
            background-color: #555;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #333;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style des champs de saisie */
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Style du bouton de soumission */
        input[type="submit"] {
            width: 100%;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Changement de couleur du bouton au survol */
        input[type="submit"]:hover {
            background-color: #555;
        }

        /* Style pour les messages d'erreur */
        .error-message {
            color: red;
            margin-top: 5px;
        }

        /* Style pour le titre du formulaire */
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        
    </style>
                </div>   
            </div>
</div>   
<script>
                  function validateForm() 
                  {
                      var titre = document.getElementById("titre").value;
                      var prix = parseFloat(document.getElementById("prix").value);
                      var duree= document.getElementById("duree").value;
                      var statut = document.getElementById("statut").value.toLowerCase();
                      var categorie = document.getElementById("categorie").value.trim().toLowerCase();
                      var description = document.getElementById("desscription").value;
                    /////////////////////////////////////////////////////////////////////////////
                      //controle de saisie titre
                      if (titre.length > 10) 
                      {
                          alert("Le titre ne doit pas dépasser 10 caractères");
                          return false;
                      }
                      //////////////////////////////////////////////////////
                      //controle de saisie prix
                      if (prix <= 100 || prix >= 1000 || isNaN(prix)) 
                      {
                          alert("Le prix doit être compris entre 100 et 1000");
                          return false;
                      }
                      ///////////////////////////////////////////////////////
                      //controle de saisie statut
                      if (statut !== "disponible" && statut !== "prochainement") 
                      {
                          alert("Le statut doit être soit 'disponible' soit 'prochainement'");
                          return false; 
                      }
                      //////////////////////////////////////////////////////////
                      ///////////////////////////////////////////////////////////
                      //verification duree
                      if (duree==="")
                      {
                        alert("donner une duree pour le service");
                        return false;
                      }
                      /////////////////////////////////////////////////////////////
                      //verification description
                      if (description === "") 
                      {
                          alert("La description ne peut pas être vide");
                          return false; 
                      }

                    //////////////////////////////////////////////
                      return true;
                  }
                  </script>
                  
    </body>
</html>