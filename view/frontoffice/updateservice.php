<?php 


?>
<!DOCTYPE html>
<html>
    <body>
    <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h3 class="modif">modifier un service</h3>
                    </div>
                  </div>
                  <form id="service" action="updateservice2.php" method="post" onsubmit="return validateForm()">
                    <section align="center">
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
                      // Vérification de la catégorie
                      var categoriesAutorisees = ["Rédaction et édition", "Design graphique", "Développement web et programmation", "Marketing et publicité", "Formation et coaching"];
                      if (!categoriesAutorisees.includes(categorie)) 
                      {
                          alert("La catégorie n'est pas valide.Categorie doit ètre 'Rédaction et édition' ou 'Design graphique' ou 'Développement web et programmation' ou 'Marketing et publicité' ou 'Formation et coaching'!");
                          return false;
                      }
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