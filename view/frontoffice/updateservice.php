<?php 
$idssupdate = $_GET["idd"];
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
         <title>Modifier un service</title>
         
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
                                            <li><a href="about.html">Réclamations</a></li>
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
    <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    
                  </div>
                  <section align="center">
                  
                        <h3 class="modif" >modifier un service</h3>
                    
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
                    
                    <button class="modiff" type="submit">modifier</button>
                    </section>
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