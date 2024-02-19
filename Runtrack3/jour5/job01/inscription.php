 <?php

    session_start();

    // Accès à la base de données
    $mysqlConnection = new mysqli(
        'localhost',  // Serveur 
        'root',       // Identifiant phpmyadmin
        '',           // Mot de passe phpmyadmin
        'utilisateurs' // Nom de la base de données
    );

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
        $login = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        if ($password && $password2 == "") {
            echo "";
            if (!password_verify($_POST["password2"], $password)) {
                echo "Les deux mots de passe sont différents";
            }
        }

        // Ajout à la base de données
        $sql = "INSERT INTO utilisateurs (nom, prenom, email, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($mysqlConnection, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $login, $prenom, $email, $password);

        if ($stmt->execute()) {
            $_SESSION['id'] = mysqli_insert_id($mysqlConnection);
            header('location: connexion.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $mysqlConnection->error;
        }

        mysqli_stmt_close($stmt);
    }
    ?>
    
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Inscription</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Fiche d'inscription</h1>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="p-4 border rounded" method="POST" enctype="multipart/form-data" action="inscription.php">

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input name="nom" type="text" class="form-control" id="nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input name="prenom" type="text" class="form-control" id="prenom" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="text" class="form-control" id="email" required>
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
                
                <form method="POST" action="index.php">
                    <button type="submit" name="deconnexion" class="btn btn-danger">Deconnexion</button>
                </form>
                
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>

</html>