<!DOCTYPE HTML>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            color: #0dcaf0;
            text-align: center;
            margin-top: 0;
        }
        p {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea {
            width: calc(100% - 22px); 
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        textarea:focus {
            border-color: #0dcaf0;
            outline: none;
        }
        button {
            background-color: #0dcaf0;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0b99c5;
        }
        .row {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .col {
            flex: 0 0 50%;
            max-width: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Modifier un article</h2>
        <p>Veuillez remplir le formulaire ci-dessous pour modifier un article. Cliquez sur "Modifier" pour valider.</p>
        <form action="ModifierArticle.php" method="post">
            <label for="titre">Titre de l'article:</label>
            <input type="text" id="titre" name="titres1" placeholder="Entrez le titre de l'article">

            <label for="contenu">Contenu de l'article:</label>
            <textarea id="contenu" name="contenus1" rows="5" placeholder="Entrez le contenu de l'article"></textarea>

            <label for="auteur">Auteur de l'article:</label>
            <input type="text" id="auteur" name="auteurs1" placeholder="Entrez l'auteur de l'article">

            <input type="hidden" name="id1s" value="<?php echo $id111; ?>">

            <div class="row">
                <div class="col" align="center">
                    <button type="submit">Modifier</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
