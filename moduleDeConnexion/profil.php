<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Modifier le Profil</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
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

<body>

    <?php

    $user['login'] = '';
    $user['prenom'] = '';
    $user['nom'] = '';
    $user['password'] = '';

    try {

        $bdd = new mysqli("localhost", "root", "", "moduleconnexion");

        if (isset($_COOKIE['id_utilisateurs'])) {
            $id_utilisateur = $_COOKIE['id_utilisateurs'];

            // Recherche les données liées a l'id utilisateurs
            $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE id_utilisateurs = ?");
            $req->bind_param('i', $id_utilisateur);
            $req->execute();
            $user = $req->get_result()->fetch_assoc();
            $req->close();

            // Verifie que l'utilisateur est bien existant
            if (!$user) {
                echo "Utilisateur trouvé.";
                exit();
            }

            // Si le formulaire est soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $login = $_POST['login'];
                $prenom = $_POST['prenom'];
                $nom = $_POST['nom'];
                $password = $_POST['password'];

                // Requête de modification d'enregistrement
                $ModifierDisque = "UPDATE utilisateurs SET login=?, prenom=?, nom=?, password=? WHERE id_utilisateurs=?";
                $stmt = $bdd->prepare($ModifierDisque);
                $stmt->bind_param('ssssi', $login, $prenom, $nom, $password, $id_utilisateur);
                $stmt->execute();

                // Contrôle sur la requête
                if (!$stmt) {
                    die('Erreur SQL !' . $ModifierDisque . '<br />' . $bdd->error);
                } else {
                    echo "<div class='alert alert-success'><h1>Requête validée !</h1><p>La mise à jour a bien été effectuée !</p>";
                }

                $stmt->close();
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deconnexion'])) {

            setcookie('id_utilisateurs', '', time() - 3600, '/', '', false, true);
            header("Location: index.php");
            exit();
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ?>


    <h1>Voici votre Profil</h1>

    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
        <div>
            <label for="login">Login:</label>
            <input name="login" type="text" value="<?= $user['login']; ?>" required>
        </div>
        <div>
            <label for="prenom">Prenom:</label>
            <input name="prenom" type="text" value="<?= $user['prenom']; ?>" required>
        </div>
        <div>
            <label for="nom">Nom:</label>
            <input name="nom" type="text" value="<?= $user['nom']; ?>" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input name="password" type="text" value="<?= $user['password']; ?>" required>
        </div>


        <button type="submit" class="btn btn-success">Modifier mon profil</button>
    </form>

    <form method="POST" action="index.php">
        <button type="submit" name="deconnexion" class="btn btn-danger">Deconnexion</button>
    </form>

    <script>
        function logout() {

            document.cookie = "id_utilisateurs=";
            window.location.href = 'index.php';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>