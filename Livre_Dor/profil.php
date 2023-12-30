<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Votre Profil</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css">
</head>
<style>
    body {
        text-align: center;
        padding: 50px;
        width: auto;

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

    textarea {
        resize: both;
    }
</style>

<body>

    <?php

session_start();

    $user['login'] = '';
    $user['password'] = '';
    $user['commentaire'] = '';

    try {

        $bdd = new mysqli("localhost", "root", "", "livreor");

        if (isset($_SESSION['id_utilisateurs'])) {
            $id_utilisateur = $_SESSION['id_utilisateurs'];

            // Recherche les données liées à l'id utilisateurs
            $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE id_utilisateurs = ?");
            $req->bind_param('i', $id_utilisateur);
            $req->execute();
            $user = $req->get_result()->fetch_assoc();
            $req->close();
        }


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Pour "Ajouter le Commentaire" au clic
            if (isset($_POST['ajouter_commentaire'])) {
                // Récupérer le nouveau commentaire depuis le formulaire
                $nouveauCommentaire = $_POST['commentaire'];

                // Vérifier si le commentaire n'est pas vide
                if (!empty($nouveauCommentaire)) {
                    // Requête de modification de la base de données des commentaires selon lid_utilisateurs et avec date automatique
                    $requeteNouveau = $bdd->prepare("INSERT INTO commentaires (id_utilisateurs, commentaire, date) VALUES (?, ?, CURRENT_TIMESTAMP)");
                    $requeteNouveau->bind_param('is', $id_utilisateur, $nouveauCommentaire);
                    $requeteNouveau->execute();

                    // Contrôle sur la requête
                    if ($requeteNouveau === false) {
                        die('Erreur SQL !' . $bdd->error);
                    } elseif ($requeteNouveau->affected_rows === 0) {
                        echo "<div class='alert alert-danger'><h2>Erreur !</h2><p>La requête n'a eu aucun impact sur la base de données.</p></div>";
                    } else {
                        echo "<div class='alert alert-success'><h2>Requête validée !</h2><p>Le commentaire a bien été mis en ligne !</p></div>";
                    }

                    $requeteNouveau->close();
                } else {
                    // Gérer le cas où le commentaire est vide
                    echo "<div class='alert alert-danger'><h2>Erreur !</h2><p>Le commentaire ne peut pas être vide.</p></div>";
                }
            }
        }
        //**********************

        if (isset($_POST['modifier_profil'])) {
            // Récupérer le nouveau profil depuis le formulaire
            $login = isset($_POST['login']) ? $_POST['login'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';


            if (!empty($login)) {
                // Requête de modification d'enregistrement
                $modifierProfil = $bdd->prepare("UPDATE utilisateurs SET login=?, password=? WHERE id_utilisateurs=?");
                $modifierProfil->bind_param('ssi', $login, $password, $id_utilisateur);
                $modifierProfil->execute();


                // Contrôle sur la requête
                if ($modifierProfil === false) {
                    die('Erreur SQL !' . $bdd->error);
                } elseif ($modifierProfil->affected_rows === 0) {
                    echo "<div class='alert alert-danger'><h2>Erreur !</h2><p>La requête n'a eu aucun impact sur la base de données.</p></div>";
                } else {
                    echo "<div class='alert alert-success'><h2>Requête validée !</h2><p>La mise à jour a bien été effectuée !</p>";
                }

                // Nouvelle requête pour récupérer les données mises à jour
                $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE id_utilisateurs = ?");
                $req->bind_param('i', $id_utilisateur);
                $req->execute();
                $user = $req->get_result()->fetch_assoc();
                $req->close();


                $modifierProfil->close();
            }
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
        <div>
            <label for="commentaire">Mes Commentaires:</label><br />
            <textarea name="commentaire"><?= isset($user['commentaire']) ? $user['commentaire'] : ''; ?></textarea>
        </div>

        <button type="submit" name="ajouter_commentaire" class="btn btn-success">Ajouter le Commentaire</button>

        <button type="submit" name="modifier_profil" class="btn btn-violet">Modifier mon profil</button>

        <button type="button" class="btn btn-primary"><a href="livreDor.php">Livre D'or</a></button>


    </form>

    <form method="POST" action="index.php">
        <button type="submit" name="deconnexion" class="btn btn-danger">Deconnexion</button>
    </form>

    <script>
        function logout() {
            document.session = "id_utilisateurs=";
            window.location.href = 'index.php';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM>

</body>

</html>