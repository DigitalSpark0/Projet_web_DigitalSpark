<?php
// Inclure le fichier de connexion à la base de données et les fonctions nécessaires
include_once "C:/xampp/htdocs/ProjetWebQH/config.php";
include_once "../../controller/User/user.php";
include_once "../../model/userC.php";

// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['id_utilisateur'])) {
    // Rediriger vers la page de connexion ou afficher un message d'erreur
    header("Location: ../../view/User/user.html#signin");
    exit;
}

// Récupérer l'ID de l'utilisateur connecté
$id_utilisateur = $_SESSION['id_utilisateur'];

// Instancier le contrôleur pour gérer les utilisateurs
$userController = new userCRUD();

// Récupérer les informations de l'utilisateur à partir de la base de données
$userInfo = $userController->getUserById($id_utilisateur);

// Vérifier si le formulaire a été soumis pour mettre à jour les informations de l'utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Mettre à jour les informations de l'utilisateur dans la base de données
    $userController->updateUser($id_utilisateur, $prenom, $nom, $email, $role);

    // Rediriger vers une page de confirmation ou actualiser la page actuelle
    // header("Location: userUpdated.php");
    // exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon compte</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
            position: relative;
        }
        h1 {
            margin-bottom: 30px;
            color: #333;
            font-size: 28px;
            font-weight: 700;
        }
        label {
            font-weight: 500;
            color: #007bff;
            display: block;
            margin-bottom: 15px;
            position: relative;
            font-size: 16px;
        }
        input[type="text"], select {
            width: calc(100% - 42px);
            padding: 14px 20px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
            color: #333;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus, select:focus {
            outline: none;
            border-color: #007bff;
        }
        select {
            appearance: none;
            background: transparent url('data:image/svg+xml;utf8,<svg fill="%23333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>') no-repeat;
            background-position: right 15px center;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 14px 24px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 20px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .fa-user,
        .fa-envelope,
        .fa-user-shield {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 10px;
            color: #666;
        }
        .home-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            text-decoration: none;
            font-weight: 500;
            margin-right: 10px;
        }
        .home-btn:hover {
            background-color: #0056b3;
        }
        .button-group {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="button-group">
            <a href="../../view/frontoffice/index.php" class="home-btn"><i class="fas fa-home"></i> Accueil</a>
            <?php if ($userInfo['Role'] == 1 || $userInfo['Role'] == 2) { ?>
                <a href="../../view/backoffice/pages/dashboard.php" class="home-btn"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <?php } else { ?>
                <a href="../../view/frontoffice/index.php" class="home-btn"><i class="fas fa-home"></i> Dashboard</a>
            <?php } ?>
        </div>
        <h1>Modifier mon compte</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Champs du formulaire avec les données pré-remplies -->
            <label for="prenom"><i class="fas fa-user"></i> Prénom:</label><br>
            <input type="text" id="prenom" name="prenom" value="<?php echo $userInfo['prenom']; ?>" required><br>
            <label for="nom"><i class="fas fa-user"></i> Nom:</label><br>
            <input type="text" id="nom" name="nom" value="<?php echo $userInfo['nom']; ?>" required><br>
            <label for="email"><i class="fas fa-envelope"></i> Email:</label><br>
            <input type="text" id="email" name="email" value="<?php echo $userInfo['Email']; ?>" required><br>
            <label for="role"><i class="fas fa-user-shield"></i> Rôle:</label><br>
            <select name="role" id="role" required>
                <option value="1" <?php if($userInfo['Role'] == 1) echo "selected"; ?>>Admin</option>
                <option value="2" <?php if($userInfo['Role'] == 2) echo "selected"; ?>>Recruteur</option>
                <option value="3" <?php if($userInfo['Role'] == 3) echo "selected"; ?>>Etudiant</option>
                <option value="4" <?php if($userInfo['Role'] == 4) echo "selected"; ?>>Freelance</option>
                <!-- Ajoutez d'autres options selon vos besoins -->
            </select><br><br>
            <input type="submit" value="Enregistrer les modifications">
        </form>
    </div>
</body>
</html>

