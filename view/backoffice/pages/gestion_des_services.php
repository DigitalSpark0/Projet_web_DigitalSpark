<?php
include "C:/xampp/htdocs/projet web (gestion services)/controller/ServiceController.php";
include "C:/xampp/htdocs/projet web (gestion services)/controller/CommandeController.php";
include "C:/xampp/htdocs/projet web (gestion services)/config.php";

$db=config::getConnexion(); 
$serv = new ServiceController();
$cum = new CommandeController();
$gawk= new CommandeController(); 
$list =$serv->listServices();
$listaa=$cum->listcommande();
$listaaa=$gawk->listcommande();

// Préparer la requête SQL pour récupérer les commandes
$query = "SELECT * FROM commande";
$statement = $db->query($query);

// Récupérer les données des commandes
$commandes = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

 <!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="C:/xampp/htdocs/projet web (gestion services)/view/backoffice/assets/img/imageservice-removebg-preview.png">
  <link rel="icon" type="image/png" href="C:/xampp/htdocs/projet web (gestion services)/view/backoffice/assets/img/imageservice-removebg-preview.png">
  <title>
    Gestion des Services
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
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
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
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/tables.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Tables</span>
          </a>
        </li>


        <!--------------------------------GESTION DES SERVICES------------------------------------------------------------->
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../pages/gestion_des_services.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Gestion des Services</span>
          </a>
        </li>
        <!----------------------------------GESTION DES SERVICES------------------------------------------>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/virtual-reality.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/rtl.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notifications</span>
          </a>
        </li>
        <li class="nav-item mt-3">
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
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Gestion des services</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Gestion des Services</h6>
        </nav>
        <div>
          <a class="custom-link" href ="http://localhost/projet%20web%20(gestion%20services)/view/frontoffice/index.php">to the front office</a>
        </div>
        <!-- Afficher le résultat total -->

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




    <!----------------------------------------------min hna tebda elpage taik achraf---------------------------------------------------------------------------------------------------------------->
    <div class="container-fluid py-4">
    <div class="row">
    <div class="col-lg-6">
        <div class="card-header pb-0 px-3 ">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0" align="center">La liste des services</h3>
            
                </div>
            <div class="overflow-auto" style="max-height: 450px;">
            <ul class="list-group">
                <?php foreach ($list as $service){ ?>
                    <li class="list-group-item border-5 d-flex p-4 mb-2 bg-gray-200 border-radius-lg">
                        <div class="d-flex flex-column" >
                            <h2 class="mb-3 text-sm font-weight-bold" ><?= $service['titre_s'];?></h2>
                            <span class="mb-2 text-xs">id du service: <span class="text-dark ms-sm-2"><?= $service['ids'];?></span></span>
                            <span class="mb-2 text-xs">Prix: <span class="text-dark ms-sm-2"><?= $service['prix_s'];?></span></span>
                            <span class="mb-2 text-xs">Catégorie: <span class="text-dark ms-sm-2"><?= $service['categorie_s'];?> </span></span>
                            <span class="text-xs">Statut: <span class="text-dark ms-sm-2"><?= $service['statut_s'];?></span></span>
                            <span class="text-xs">Description: <span class="text-dark ms-sm-2"><?= $service['desc_s'];?></span></span>
                            <span class="text-xs">Durée: <span class="text-dark ms-sm-2"><?= $service['duree_s'];?></span></span>
                            <div class="d-flex justify-content-between">
                            <a class="btn bg-gradient-dark mb-0" href="../../frontoffice/deleteservice.php?id=<?php echo $service['titre_s']; ?>">Delete</a>
                            <a class="btn bg-gradient-dark mb-0 ms-2" href="#nouvelle_partie">chercher les commandes</a>
                            
                        </div>
                        </div>
                    </li>
                <?php }// endforeach; ?>
            </ul>
                </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card-header pb-0 px-3">
          <div class="d-flex justify-content-between align-items-center">
              <h3 class="mb-0">la liste des commandes</h3>
              <div>
            <a href="#" class="btn btn-sm btn-primary" id="notificationIcon" name="notificationIcon">
                <i class="fas fa-bell"></i><br><br> <!-- Utilisation d'une icône de cloche, ajustez selon votre bibliothèque d'icônes -->
                <!-- Vous pouvez également ajouter un badge avec le nombre de notifications -->
                <span class="badge bg-danger"><?php echo count($commandes); ?></span>
            </a>
        </div>
        <div class="hidden-contentservice" id="notificationContent" style="display: none; max-height: 300px; overflow-y: auto;">
                    <?php foreach ($commandes as $commande) { ?>
                      <div class="notification-item">
                          <p>Il y a une commande d'id <?php echo $commande['idc']; ?> ajoutée à la date <?php echo $commande['date_c']; ?></p>
                          <button class="hide-notification-button">Masquer cette notification</button>
                      </div>
                    <?php } ?>
                    
                </div>
              <form action="genpdf.php">
                  <button type="submit" class="btn btn-primary" name="genpdf">Télécharger PDF</button>
              </form>
          </div>
            <div class="overflow-auto" style="max-height: 450px;">
            <ul class="list-group">
                <?php
                 $totalMontant = 0;
                 foreach($listaaa as $commande){
                  $totalMontant += $commande['montant_c']; }?>
                   <div class="total-container">
                      <p>Total des montants des commandes : <?php echo $totalMontant; ?> DT</p>
                  </div>
                  <form id="saveTotalMontantForm" action="save_total_montant.php" method="post">
                    <!-- Champ caché pour stocker le montant total -->
                      <input type="hidden" name="totalMontant" value="<?php echo $totalMontant; ?>">

                    <!-- Champ caché pour stocker la date actuelle -->
                   <input type="hidden" name="dateActuelle" value="<?php echo date('Y-m-d'); ?>">
                    <button type="submit" name="submit">Enregistrer le montant total</button>
                  </form>
                  
                 <?php
                foreach ($listaa as $commande){ ?>
                    <li class="list-group-item border-5 d-flex p-4 mb-2 bg-gray-200 border-radius-lg">
                    <div class="d-flex flex-column">
                      <h2  class="mb-3 text-sm font-weight-bold" >id du commande:  <?= $commande['idc'];?></h2>
                      <span class="mb-2 text-xs">idservice: <span class="text-dark ms-sm-2" name="idsse"><?= $commande['idservice'];?></span></span>
                      <span class="mb-2 text-xs">date d'ajout de la commande: <span class="text-dark ms-sm-2" name="da"><?= $commande['date_c'];?> </span></span>
                      <span class="text-xs">statut: <span class="text-dark ms-sm-2" name="st"><?= $commande['statut_c'];?></span></span>
                      <span class="text-xs">montant: <span class="text-dark ms-sm-2" name="mo"><?= $commande['montant_c'];?></span></span>
                      
                      <div class="d-flex justify-content-between mt-3">
                          <form method="POST" action="updatecommande.php">
                              <input type="submit" class="btn btn-primary" name="updatee" value="Update">
                              <input type="hidden" value=<?php echo $commande['idc']; ?> name="idup">
                              <input type="hidden" value=<?php echo $commande['idservice']; ?> name="idsse">
                              <input type="hidden" value=<?php echo $commande['date_c']; ?> name="da">
                              <input type="hidden" value=<?php echo $commande['statut_c']; ?> name="st">
                              <input type="hidden" value=<?php echo $commande['montant_c']; ?> name="mo">
                          </form>
                
                          <a class="btn btn-danger" href="deletecommande.php?id=<?php echo $commande['idc']; ?>">Delete</a><br><br>
                          <script>
                            function toggleContent(button) {
                            var hiddenContent = button.nextElementSibling;
                            if (hiddenContent.style.display === "none") {
                                hiddenContent.style.display = "block";
                            } else {
                                hiddenContent.style.display = "none";
                            }
                        }
                        </script>
                        
                      </div>
                  </div>

                    </li>
                    <li>
                <button class="btn btn-success mt-3" onclick="toggleContent(this)">Update 2.0</button>
                <div class="hidden-content" style="display: none;">
                    <!-- Contenu caché -->
                    <form method="POST" action="gestion_des_services.php" align="center">
                    <input type="hidden" value=<?php echo $commande['idc']; ?> name="idcupdate" >
                    <input type="hidden" value=<?php echo $commande['idservice']; ?> name="idsupdate" >
                    <label for="upsta">statut:</label>
                    <input type="text" id="statutInput" value=<?php echo $commande['statut_c']; ?> name="statupdate"><br><br>
                    <span id="statutError" style="color: red;"></span>
                    <input type="hidden" value=<?php echo $commande['date_c']; ?> name="dateupdate">
                    <label for="upmont">montant:</label>
                    <input type="text" value=<?php echo $commande['montant_c']; ?> name="montupdate"><span id="montspan"></span><br><br>
                    <input type="submit" class="btn btn-primary" value="valider">
                    </form>
                    <script>
                        function validateForm() {
                          var statutInput = document.getElementById("statutInput").value;
                          var statutError = document.getElementById("statutError");
                          var isValid = true;

                          // Vérifier si le statut est "en_cours"
                          if (statutInput.trim() !== "en_cours") {
                              statutError.textContent = "Le statut doit être 'en_cours'";
                              isValid = false;
                          } else {
                              statutError.textContent = ""; // Efface le message d'erreur s'il est valide
                          }

                          // Si tout est valide, soumettre le formulaire
                          return isValid;
                      }
                        // Récupérer l'élément de l'icône de notification et le contenu caché
                        var notificationIcon = document.getElementById("notificationIcon");
                        var notificationContent = document.getElementById("notificationContent");

                        // Ajouter un gestionnaire d'événements pour le clic sur l'icône de notification
                        notificationIcon.addEventListener("click", function(event) {
                            // Empêcher le comportement par défaut du lien
                            event.preventDefault();

                            // Afficher ou masquer le contenu en fonction de son état actuel
                            if (notificationContent.style.display === "none") {
                                notificationContent.style.display = "block";
                            } else {
                                notificationContent.style.display = "none";
                            }
                        });
                        document.querySelectorAll(".hide-notification-button").forEach(function(button) {
                              button.addEventListener("click", function() {
                                  this.parentNode.style.display = "none";
                              });
                          });


                    </script>
                    <style>
                      /* Style de la div cachée */
                      .hidden-content {
                          display: none; /* Par défaut, la div est cachée */
                          position: fixed; /* Positionnement fixe pour rester à l'écran même lors du défilement */
                          top: 50%; /* Positionne le haut de la div au centre vertical */
                          left: 50%; /* Positionne la gauche de la div au centre horizontal */
                          transform: translate(-50%, -50%); /* Centre la div horizontalement et verticalement */
                          background-color: white; /* Couleur de fond de la div */
                          padding: 20px; /* Espacement intérieur de la div */
                          border: 2px solid #ccc; /* Bordure de la div */
                          border-radius: 5px; /* Bordure arrondie */
                          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre portée */
                      }

                      /* Style des éléments à l'intérieur de la div cachée */
                      .hidden-content label {
                          display: block; /* Affiche chaque label sur une nouvelle ligne */
                          margin-bottom: 10px; /* Espacement entre chaque label et input */
                      }

                      .hidden-content input[type="text"] {
                          width: 100%; /* Largeur des champs texte à 100% de la largeur de la div */
                          padding: 5px; /* Espacement intérieur des champs texte */
                          margin-bottom: 10px; /* Espacement entre chaque champ texte */
                      }

                      .hidden-content input[type="submit"] {
                          display: block; /* Affiche le bouton de soumission sur une nouvelle ligne */
                          width: 100%; /* Largeur du bouton à 100% de la largeur de la div */
                      }
                                                             
                          /* Style de la fenêtre pop-up */
.hidden-contentservice {
    display: none;
    position: fixed; /* Utilisation de position fixed */
    top: 40%; /* Centrer verticalement */
    left: 80%; /* Centrer horizontalement */
    transform: translate(-50%, -50%); /* Centrer la fenêtre */
    background-color: white;
    padding: 20px;
    border: 2px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 9999; /* Valeur de z-index plus élevée pour afficher devant les autres éléments */
}

/* Style de l'icône de notification */
a[name="notificationIcon"] {
    position: relative; /* Permettra de positionner le badge de notification */
}

/* Style du badge de notification */
span[name="notificationBadge"] {
    position: absolute;
    top: -5px;
    right: -5px;
}

/* Style de la fenêtre modale */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4); /* Fond semi-transparent */
}

/* Contenu de la fenêtre modale */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    border-radius: 5px;
}

/* Bouton de fermeture de la fenêtre modale */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Style du bouton de notification */
.btn-notification {
    position: relative;
}

/* Style du badge de notification dans le bouton */
.badge-notification {
    position: absolute;
    top: -5px;
    right: -5px;
}
.hidden-contentservice p {
    font-family: 'Arial', sans-serif;
    font-size: 16px;
    color: #333;
    margin: 10px 0;
    opacity: 0;
    animation: fadeIn 0.5s ease forwards;
    border: 2px solid #ddd; /* Bordure grise */
    border-radius: 8px; /* Bordure arrondie */
    padding: 15px; /* Espacement intérieur */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Légère ombre portée */
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px); /* Décalage vers le haut */
    }
    to {
        opacity: 1;
        transform: translateY(0); /* Retour à la position d'origine */
    }
}




                    </style>
                </div>
            </li>
                <?php }// endforeach; ?>
            </ul>
            <?php 
                      $idcupdateee = isset($_POST["idcupdate"]) ?$_POST["idcupdate"]:'erreur';
                      $idserviceee = isset($_POST["idsupdate"]) ?$_POST["idsupdate"]:'erreur';
                      $date_ccc = isset($_POST["dateupdate"])?$_POST["dateupdate"]:'erreur';
                      $statut_ccc = isset($_POST["statupdate"])?$_POST["statupdate"]:'erreur';
                      $montant_ccc = isset($_POST["montupdate"])?$_POST["montupdate"]:'erreur';
                        
                      $comoo=new CommandeController();
                      $comoo->updatecommande($idcupdateee,$idserviceee,$date_ccc,$statut_ccc,$montant_ccc);

                      header('Location:gestion_des_services.php');
                      ?>
            </div>
        </div>
    </div>
</div>
<!-- Nouvelle partie -->
<div class="row mt-4">
    <div class="col-lg-10 mx-auto">
        <div class="card-header pb-0 px-3">
            <h3 class="mb-0" align="center" id="nouvelle_partie">chercher une commande</h3>
            <div class="d-flex justify-content-center mt-3">
            <form method="post" action="gestion_des_services.php">
              <div class="input-group mb-3">
                <input type="text" class="form-control me-3" name="idService" placeholder="Donnez l'ID du service" aria-label="Recherche" aria-describedby="button-addon2">
                <button class="btn btn-primary " type="submit" id="button-addon2">chercher</button>  
              </div>
            </form>
            </div>
            <?php $idserchercher = isset($_POST["idService"]) ?$_POST["idService"]:'erreur'; 
            $cherchercommande = new CommandeController();
            $listchercher = $cherchercommande->listcommandechercher($idserchercher);
            ?>
            <?php foreach ($listchercher as $commande){ ?>
                    <li class="list-group-item border-5 d-flex p-4 mb-2 bg-gray-200 border-radius-lg">
                    <div class="d-flex flex-column">
                      <h2 class="mb-3 text-sm font-weight-bold">id du commande:  <?= $commande['idc'];?></h2>
                      <span class="mb-2 text-xs">idservice: <span class="text-dark ms-sm-2" name="idsse"><?= $commande['idservice'];?></span></span>
                      <span class="mb-2 text-xs">date d'ajout de la commande: <span class="text-dark ms-sm-2" name="da"><?= $commande['date_c'];?> </span></span>
                      <span class="text-xs">statut: <span class="text-dark ms-sm-2" name="st"><?= $commande['statut_c'];?></span></span>
                      <span class="text-xs">montant: <span class="text-dark ms-sm-2" name="mo"><?= $commande['montant_c'];?></span></span>
                  </div>
                    </li>
                <?php } ?>
            <!-- Contenu de la nouvelle partie -->
        </div>
    </div>
</div> 
<!-------partie_stat--------------------------------------->    
<div class="row mt-4">
<div align="center" class="title"><h3><strong>statistiques des ventes</strong></h3></div>
    <div class="col-lg-10 mx-auto">
        <div class="card-header pb-0 px-3">
        
            <div class="statistics-container">
                <?php
                // Requête SQL pour sélectionner toutes les entrées de la table montot
                $sql = "SELECT * FROM montot";
                $result = $db->query($sql);

                // Tableau pour stocker les montants par date
                $montantsParDate = array();

                // Parcourir les résultats de la requête
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $date = $row['dateactuellemont'];
                    $montant = $row['montdate'];

                    // Vérifier si la date existe déjà dans le tableau
                    if (array_key_exists($date, $montantsParDate)) {
                        // Si la date existe, ajouter le montant à la valeur existante
                        $montantsParDate[$date] += $montant;
                    } else {
                        // Sinon, créer une nouvelle entrée dans le tableau
                        $montantsParDate[$date] = $montant;
                    }
                }

                // Calculer le montant maximum pour normaliser les données
                $maxMontant = max($montantsParDate);

                // Définir l'échelle maximale souhaitée
                $echelleMax = 100;

                // Calculer le facteur d'échelle en divisant le montant maximum par l'échelle maximale
                $facteurEchelle = $maxMontant / $echelleMax;
                
                // Afficher les montants par date en utilisant l'échelle
                foreach ($montantsParDate as $date => $montantTotal) {
                    // Diviser chaque montant par le facteur d'échelle pour réduire la hauteur des barres
                    $hauteurBarre = $montantTotal / $facteurEchelle;
                    echo "<div class=\"bar\" style=\"height: $hauteurBarre%;\"></div><br><br>";
                    echo "<p>Date : $date, Montant total : $montantTotal</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

    
</div>

<style>
                .btn-primary {
                  border-radius: 0; /* Bordures carrées */
              }

              /* Style pour l'input de recherche */
              .form-control {
                  border-radius: 0; /* Bordures carrées */
              }
              .statistics-container p {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
        /* Ajoutez d'autres styles selon vos besoins */
    }

    /* Style pour le container des statistiques */
    .statistics-container {
        display: flex;
        justify-content: space-around;
        align-items: flex-end;
        height: 300px; /* Hauteur fixe du container */
    }
     

    .bar {
    width: 20px; /* Largeur des barres */
    background-color: #007bff; /* Couleur des barres */
    margin: 0 5px; /* Marge entre les barres */
    opacity: 0.7; /* Opacité par défaut */
    transition: opacity 0.5s ease; /* Transition pour l'opacité */
}

/* Lorsque vous survolez les barres, elles deviennent plus opaques */
.bar:hover {
    opacity: 1; /* Opacité complète au survol */
}
.title {
        opacity: 0;
        transition: opacity 0.5s ease, transform 0.5s ease;
        margin-bottom: 20px; /* Espace sous le titre */
    }

    .statistics-container {
        display: flex;
        justify-content: space-around;
        align-items: flex-end;
        height: 300px; /* Hauteur fixe du container */
    }

    .bar {
        width: 20px; /* Largeur des barres */
        background-color: #007bff; /* Couleur des barres */
        margin: 0 5px; /* Marge entre les barres */
        opacity: 0.7; /* Opacité par défaut */
        transition: opacity 0.5s ease; /* Transition pour l'opacité */
    }

    /* Lorsque vous survolez les barres, elles deviennent plus opaques */
    .bar:hover {
        opacity: 1; /* Opacité complète au survol */
    }


                </style>
                <script>
    // Ajouter un événement lorsque la page est chargée pour afficher le titre avec un effet de fondu et de glissement
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.title').style.opacity = '1';
        document.querySelector('.title').style.transform = 'translateY(0)';
    });
</script>

      















      <!--------------------7ajat zaydin ya achraf ba3ed hadha (a3mel tala aalihom ba3ed matkaml eli lazmk khater fiha dark mode)---------------------------------------->
      <!--
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    -->
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
  

</body>

</html>