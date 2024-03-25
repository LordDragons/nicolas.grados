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
    <title>Films</title>
</head>

<body>
    <h1>Les Films</h1>

    <?php
    $api_key = "0933e801b72985dce80748e928bbf524";
    $url = "https://api.themoviedb.org/3/movie/popular";
    $posterSize = "w300";
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Paramètres de l'API
    $params = [
        "api_key" => $api_key,
        "page" => $page,
    ];

    // Requête cURL pour les films
    $ch = curl_init($url . '?' . http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Traitement des données JSON
    $data = json_decode($response, true);

    // Affichage des titres des films avec leurs affiches et dates de sortie
    if (isset($data["results"])) {
        echo "<div style='display: flex; flex-wrap: wrap;'>";
        foreach ($data["results"] as $movie) {
            echo "<div style='margin: 20px; text-align: center;'>";
            echo "<h3>" . $movie["title"] . "</h3>";

            // Affichage de la date de sortie
            if (isset($movie["release_date"])) {
                $release_date = date("Y-m-d", strtotime($movie["release_date"]));
                echo "<p>Date de sortie : " . $release_date . "</p>";
            }

            // Affichage de l'affiche du film (si disponible)
            if (isset($movie["poster_path"])) {
                $poster_url = "https://image.tmdb.org/t/p/" . $posterSize . $movie["poster_path"];

                // Ajout d'un lien vers la description avec l'affiche du film
                echo "<div>";
                echo "<a href='description.php?id=" . $movie["id"] . "'>";
                echo "<img src='" . $poster_url . "' alt='Affiche du film' style='width: 200px; height: 300px;'>";
                echo "</a>";
                echo "</div>";

                // Ajout d'un bouton pour ajouter aux favoris avec un identifiant unique
                echo "<button class='addToFavorites' data-title='" . htmlspecialchars($movie["title"]) . "' data-poster='" . htmlspecialchars($poster_url) . "'>+</button>";
            }

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
?>

    <div class="btn-container">
        <button type="button" name="deconnexion" class="btn btn-danger btn-custom" onclick="logout()">Déconnexion</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="assets/cinetech.js"></script>

</body>

</html>
