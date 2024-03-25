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
    <title>Accueil</title>
</head>

<body>
    <div class="btn-container">
        <button type="button" class="btn btn-secondary btn-custom"><a href="inscription.php">Inscription</a></button>
        <button type="button" class="btn btn-success btn-custom"><a href="connexion.php">Connexion</a></button>
        <button type="button" name="deconnexion" class="btn btn-danger btn-custom" onclick="logout()">Déconnexion</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="assets/cinetech.js"></script>




</body>

</html>