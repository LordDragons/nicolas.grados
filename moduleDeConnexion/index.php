<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
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
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .btn-custom {
            border-radius: 50px;
            padding: 15px 30px;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Bienvenue sur notre site</h1>

    <div class="btn-container">
        <button type="button" class="btn btn-primary btn-custom"><a href="admin.php">Administrateur</a></button>
        <button type="button" class="btn btn-secondary btn-custom"><a href="inscription.php">Inscription</a></button>
        <button type="button" class="btn btn-success btn-custom"><a href="connexion.php">Connexion</a></button>
    </div>

    <script>
        function logout() {
            document.cookie = "id_utilisateurs=";
            window.location.href = 'index.php';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>