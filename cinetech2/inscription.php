<?php


include "header.php";
require_once "basededonnée.php";


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/cinetech.css">
    <title>Inscription</title>
</head>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $login = $_POST["login"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        if ($password != $password2) {
            echo "Les deux mots de passe sont différents";
        } else {

            $sql = "INSERT INTO users (nom, prenom, login, password) VALUES (?, ?, ?, ?)";

            try {
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nom, $prenom, $login, $password]);
                header('location: connexion.php');
                exit();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }

    ?>

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
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input name="prenom" type="text" class="form-control" id="nom" required>
                        </div>
                        <div class="mb-3">
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

    <button type="button" name="deconnexion" class="btn btn-danger mt-3" onclick="logout()">Déconnexion</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/cinetech.js"></script>

</body>

</html>