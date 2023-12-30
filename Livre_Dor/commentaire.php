<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Commentaire</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: goldenrod;
            text-align: center;
            display: flex;
            justify-content: center;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php

session_start();

    // Vérifier si l'utilisateur est connecté 
    if (!isset($_SESSION['utilisateur_id'])) {
        header("Location: connexion.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
        exit();
    }
    ?>

    <h1>Ajouter un Commentaire</h1>

    <form class="mt-5 w-75 mx-auto" method="POST" action="traitement_commentaire.php">
        <div class="mb-3">
            <label for="date">Date du commentaire</label>
            < <label for="commentaire">Commentaire</label>
                <textarea name="commentaire" id="commentaire" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Ajouter le Commentaire</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>