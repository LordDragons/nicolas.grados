<?php
        session_start();

        // Si l'utilisateur est déjà connecté, redirigez-le vers la page d'accueil
        if(isset($_SESSION['id_utilisateurs'])) {
            header('location: index.php');
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $login = $_POST['nom'];
            $password = $_POST['password'];

            if (!empty($login) && !empty($password)) {
                $bdd = new mysqli("localhost", "root", "", "utilisateurs");

                // Utilisation de requêtes préparées pour éviter les attaques par injection SQL
                $sql = "SELECT * FROM utilisateurs WHERE nom = ? AND password = ?";
                $stmt = $bdd->prepare($sql);
                $stmt->bind_param('ss', $login, $password);
                $stmt->execute();
                $res = $stmt->get_result();

                // Vérifie si un utilisateur est trouvé
                if ($res->num_rows > 0) {
                    $user = $res->fetch_assoc();
                    $_SESSION['id_utilisateurs'] = $user['id_utilisateurs'];
                    header('location: index.php');
                    $bdd->close();
                    exit();
                } else {
                    echo 'Login ou mot de passe incorrect.';
                }

                $stmt->close();
            } else {
                echo 'Veuillez remplir tous les champs.';
            }
        }
    ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form class="mt-5 w-75 mx-auto" method="POST" action="connexion.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input name="nom" type="text" id="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input name="password" type="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Se Connecter</button>
    </form>

    <form method="POST" action="index.php">
        <button type="submit" name="deconnexion" class="btn btn-danger">Deconnexion</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>
