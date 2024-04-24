

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter Offre</title>
  <style>
    body, h1, h2, h3, h4, h5, h6, p, form, input, button {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .container {
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      background-color: #212529;
      color: #fff;
      width: 250px;
      padding: 1rem;
    }

    .main-content {
      flex: 1;
      background-color: #f8f9fa;
      padding: 1rem;
    }

    .sidebar a {
      text-decoration: none;
      color: #fff;
      display: block;
      padding: 0.5rem 1rem;
      border-radius: 0.375rem;
      transition: background-color 0.2s ease-in-out;
    }

    .sidebar a.active, .sidebar a:hover {
      background-color: #343a40;
    }

    .content-header h3 {
      margin-bottom: 2rem;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
    }

    input[type=text], input[type=date], textarea {
      width: 100%;
      padding: 0.375rem 0.75rem;
      border: 1px solid #ced4da;
      border-radius: 0.25rem;
      margin-top: 0.5rem;
    }

    .btn {
      display: inline-block;
      font-weight: 400;
      color: #212529;
      text-align: center;
      vertical-align: middle;
      user-select: none;
      background-color: #dcdcdc;
      border: 1px solid transparent;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: 0.25rem;
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
                  border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn:hover {
      background-color: #a8a8a8;
    }
  </style>
</head>
<body>
  
<div class="row">
          <div class="col-md-12 mb-lg-0 mb-4">
            <!-- Formulaire d'ajout des offres -->
            <div class="card mt-4">
              <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h3 class="mb-0">Ajouter offre</h3>
                  </div>
                </div>
              </div>
              <div class="card-body p-3">
                <!-- Formulaire d'ajout d'offre -->
                <form id="service" action="ajouter_service.php" method="post">
                  <!-- Champs pour le titre, statut, entreprise, date_pub, description -->
                  <label for="titres">Titre:</label>
                  <input type="text" id="titres" name="titres">
                  <br><br>
                  <label for="statuts">Statut:</label>
                  <input type="text" id="statuts" name="statuts">
                  <br><br>
                  <label for="entreprises">Entreprise:</label>
                  <input type="text" id="entreprises" name="entreprises">
                  <br><br>
                  <label for="date_pubs">Date pub:</label>
                  <input type="text" id="date_pubs" name="date_pubs">
                  <br><br>
                  <label for="descriptions">Description:</label>
                  <input type="text" id="descriptions" name="descriptions">
                  <br><br>
                  <!-- Bouton pour soumettre le formulaire -->
                  <button class="btn bg-gradient-dark mb-0" type="submit"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Ajouter</button>
                </form>
              </div>
            </div>
          </div>
        </div>
  <script src="script.js"></script>
</body>
</html>
