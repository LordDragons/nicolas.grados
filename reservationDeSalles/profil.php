<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Modifier le Profil</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets//reservation.css">
</head>


<body>

    <?php
    $user['login'] = '';
    $user['password'] = '';

    try {

        $bdd = new mysqli("localhost", "root", "", "reservationssalles");

        if (isset($_COOKIE['id_utilisateur'])) {
            $id_utilisateur = $_COOKIE['id_utilisateur'];

            // Recherche les données liées a l'id utilisateurs
            $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = ?");
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
                $password = $_POST['password'];

                // Requête de modification d'enregistrement
                $ModifierDisque = "UPDATE utilisateurs SET login=?,  password=? WHERE id_utilisateur=?";
                $stmt = $bdd->prepare($ModifierDisque);
                $stmt->bind_param('ssi', $login, $password, $id_utilisateur);
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

            setcookie('id_utilisateur', '', time() - 3600, '/', '', false, true);
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

            document.cookie = "id_utilisateur=";
            window.location.href = 'index.php';
        }
    </script>

</body>

</html>