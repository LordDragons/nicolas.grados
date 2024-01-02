<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets//reservation.css">
</head>

<body>


    <?php


    //acccés à la base de données
    $mysqlConnection = new mysqli(
        'localhost',  //serveur 
        'root', // identifiant phpmyadmin
        '',      // mot de passe phpmyadmin
        'reservationssalles', //identification de la base de donnée
    );

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
        $login = $_POST["login"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];


        if ($password && $password2 == "") {
            echo "";
            if (!password_verify($_POST["password2"], $password)) { {
                    echo "les deux mots de passe sont différents";
                }
            }
        }

        // Ajout à la base de données
        $sql = "INSERT INTO utilisateurs (login, password) VALUES (?, ?)";

        $stmt = mysqli_prepare($mysqlConnection, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $login, $password);

        if ($stmt->execute()) {
            header('location: connexion.php');
        } else {
            echo "Error: " . $sql . "<br>" . $mysqlConnection->error;
        }
    }

    ?>
<h1>Fiche d'inscription</h1>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="p-4 border rounded" method="POST" enctype="multipart/form-data" action="inscription.php">

                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input name="login" type="text" class="form-control" id="login" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input name="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Confirmer Votre Mot de passe</label>
                        <input name="password2" class="form-control" id="password2" required>
                    </div>

                    <button type="submit" class="btn btn-success">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-danger mt-3" onclick="logout()">Déconnexion</button>

    <script>
        function logout() {
            document.cookie = "id_utilisateur=";
            window.location.href = 'index.php';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>