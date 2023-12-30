<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css">
    <style>
        table {
            color: black;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;

        }

        table,
        th,
        td {
            border: 1px solid white;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f8e8c5;

        }

        form {
            margin-top: 20px;
        }
    </style>

</head>

<body>
    <?php

session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "livreor";

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifie la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sélectionne les commentaires du plus récent au plus ancien
    $sql = "SELECT date, login, commentaire FROM commentaires NATURAL JOIN utilisateurs ORDER BY date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>Livre d'or</h1>";
        echo "<table>";

        echo "<thead><tr>";
        echo "<th>Date</th>";
        echo "<th>Utilisateur</th>";
        echo "<th>Commentaire</th>";
        echo "</tr></thead>";

        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['date']}</td>";
            echo "<td>{$row['login']}</td>";
            echo "<td>{$row['commentaire']}</td>";
            echo "</tr>";
        }
        echo "</tbody>";

        echo "</table>";
    } else {
        echo "Aucun commentaire.";
    }

    $conn->close();
    ?>

    <?php
    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION['id_utilisateurs'])) {
        echo "<a href='commentaire.php' class='btn btn-success mt-3'>Ajouter un commentaire</a>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>