<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon compte</title>
</head>
<body>
    <h1>Modifier mon compte</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <!-- Champs du formulaire avec les données pré-remplies -->
        <label for="prenom">Prenom:</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $prenom;?>" required>
        <br><br>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $nom;?>" required>
        <br><br>
        <label for="Email">Email:</label>
        <input type="text" id="Email" name="Email" value="<?php echo $email;?>" required>
        <br><br>
        <label for="Role">Role:</label>
        <select name="Role" id="Role" required>
            <option value="1" <?php if($role == 1) echo "selected"; ?>>Admin</option>
            <option value="2" <?php if($role == 2) echo "selected"; ?>>Recruteur</option>
        </select>
        <br><br>
        <input type="submit" value="Enregistrer les modifications">
    </form>
</body>
</html>
