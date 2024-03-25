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
    <title>Séries</title>
</head>

<body>
    <h1>Les Séries et Émissions</h1>
    <?php
    $api_key = "0933e801b72985dce80748e928bbf524";
    $url = "https://api.themoviedb.org/3/tv/popular";
    $posterSize = "w300";
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Paramètres de l'API
    $params = [
        "api_key" => $api_key,
        "page" => $page,
    ];

    // Requête cURL pour les séries et les émissions
    $ch = curl_init($url . '?' . http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_series = curl_exec($ch);
    curl_close($ch);

    // Traitement des données JSON
    $data_series = json_decode($response_series, true);

    // Affichage des titres des séries ou des émissions avec leurs affiches et dates de sortie
    if (isset($data_series["results"])) {
        echo "<div style='display: flex; flex-wrap: wrap;'>";
        foreach ($data_series["results"] as $tvShow) {
            echo "<div style='margin: 20px; text-align: center; max-width: 250px;'>";
            echo "<h3 style='overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'>" . $tvShow["name"] . "</h3>";

            // Affichage de la date de sortie
            if (isset($tvShow["first_air_date"])) {
                $air_date = date("Y-m-d", strtotime($tvShow["first_air_date"]));
                echo "<p>Date de sortie : " . $air_date . "</p>";
            }

            // Affichage de l'affiche de la série (si disponible)
            if (isset($tvShow["poster_path"])) {
                $poster_url = "https://image.tmdb.org/t/p/" . $posterSize . $tvShow["poster_path"];

                // Ajout d'un bouton pour ajouter aux favoris
                echo "<div>";
                echo "<a href='description.php?id=" . $tvShow["id"] . "'>";
                echo "<img src='" . $poster_url . "' alt='Affiche de la série TV' style='width: 200px; height: 300px;'>";
                echo "</a>";
                echo "</div>";
            } else {
                echo "<p>Aucune affiche disponible</p>";
            }
            echo "<button class='addToFavorites' data-title='" . htmlspecialchars($tvShow["name"]) . "' data-poster='" . htmlspecialchars($poster_url) . "'>+</button>";

            echo "</div>";
        }
        echo "</div>";

        // Ajout du bouton "Voir d'autres"
        echo "<div style='text-align: center;'>";
        echo "<a href='?page=" . ($page + 1) . "'><button>Voir d'autres</button></a>";
        echo "</div>";
    } else {
        echo "Erreur lors de la requête à l'API.";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
        $userId = isset($_COOKIE['id_user']) ? $_COOKIE['id_user'] : '';
    
        $title = isset($_POST["type"]) ? $_POST["type"] : '';
        // $poster peut être utilisé pour d'autres fonctionnalités si nécessaire
        $poster = isset($_POST["poster"]) ? $_POST["poster"] : '';
    
        if (!empty($userId) && !empty($type)) {
            $sql = "INSERT INTO favoris (id_user, type) VALUES (?,?)";
    
            try {
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$userId, $type]);
                echo "Success";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Missing user ID or title.";
        }
    }
    
    ?>
    <div class="btn-container">
        <button type="button" name="deconnexion" class="btn btn-danger btn-custom" onclick="logout()">Déconnexion</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="assets/cinetech.js"></script>
</body>

</html>