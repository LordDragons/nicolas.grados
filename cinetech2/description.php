<?php
include "header.php";
require_once "basededonnée.php";

if (isset($_GET['id'])) {
    $movie_id = $_GET['id'];

    // Clé d'API pour l'accès à l'API de films
    $api_key = "0933e801b72985dce80748e928bbf524";

    $langue = "fr";

    // URL de l'API pour récupérer les détails du film en utilisant son ID
    $api_url = "https://api.themoviedb.org/3/movie/{$movie_id}?api_key={$api_key}&language={$langue}";

    // Requête cURL pour récupérer les détails du film
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Traitement des données JSON de la réponse
    $movie_details = json_decode($response, true);

    if ($movie_details && !empty($movie_details['title'])) {
        // Affichage des détails du film
        echo "<h2>Détails du film : " . $movie_details["title"] . "</h2>";
        echo "<p>Date de sortie : " . $movie_details["release_date"] . "</p>";
        echo "<p>Résumé : " . $movie_details["overview"] . "</p>";

        // Affichage des acteurs
        $credits_url = "https://api.themoviedb.org/3/movie/{$movie_id}/credits?api_key={$api_key}";
        $ch = curl_init($credits_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $credits_response = curl_exec($ch);
        curl_close($ch);
        $credits = json_decode($credits_response, true);
        if ($credits && !empty($credits['cast'])) {
            echo "<p>Acteurs : ";
            foreach ($credits['cast'] as $actor) {
                echo $actor['name'] . ", ";
            }
            echo "</p>";
        } else {
            echo "<p>Aucune information sur les acteurs disponible</p>";
        }

        // Affichage du type cinématographique (genre)
        if (!empty($movie_details['genres'])) {
            echo "<p>Genre(s) : ";
            foreach ($movie_details['genres'] as $genre) {
                echo $genre['name'] . ", ";
            }
            echo "</p>";
        } else {
            echo "<p>Aucune information sur le genre disponible</p>";
        }

        // Affichage de l'affiche du film
        if (isset($movie_details["poster_path"])) {
            $poster_url = "https://image.tmdb.org/t/p/w300" . $movie_details["poster_path"];
            echo "<img src='" . $poster_url . "' alt='Affiche du film'>";
        } else {
            echo "<p>Aucune affiche disponible</p>";
        }

        // Vous pouvez afficher d'autres détails du film selon vos besoins
    } else {
        echo "Aucun film trouvé avec l'ID spécifié.";
    }
} else {
    echo "ID de film non fourni.";
}


if (isset($_GET['id'])) {
    $tv_id = $_GET['id'];

    // Clé d'API pour l'accès à l'API de séries TV
    $api_key = "0933e801b72985dce80748e928bbf524";

    $langue = "fr";
    // URL de l'API pour récupérer les détails de la série TV en utilisant son ID
    $api_url = "https://api.themoviedb.org/3/tv/{$tv_id}?api_key={$api_key}&language={$langue}";
    // Requête cURL pour récupérer les détails de la série TV
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Traitement des données JSON de la réponse
    $tv_details = json_decode($response, true);

    if ($tv_details && !empty($tv_details['name'])) {
        // Affichage des détails de la série TV
        echo "<h2>Détails de la série TV : " . $tv_details["name"] . "</h2>";
        echo "<p>Date de première diffusion : " . $tv_details["first_air_date"] . "</p>";
        echo "<p>Résumé : " . $tv_details["overview"] . "</p>";

        // Affichage des acteurs
        $credits_url = "https://api.themoviedb.org/3/tv/{$tv_id}/credits?api_key={$api_key}";
        $ch = curl_init($credits_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $credits_response = curl_exec($ch);
        curl_close($ch);
        $credits = json_decode($credits_response, true);
        if ($credits && !empty($credits['cast'])) {
            echo "<p>Acteurs : ";
            foreach ($credits['cast'] as $actor) {
                echo $actor['name'] . ", ";
            }
            echo "</p>";
        } else {
            echo "<p>Aucune information sur les acteurs disponible</p>";
        }

        // Affichage des genres de la série TV
        if (!empty($tv_details['genres'])) {
            echo "<p>Genre(s) : ";
            foreach ($tv_details['genres'] as $genre) {
                echo $genre['name'] . ", ";
            }
            echo "</p>";
        } else {
            echo "<p>Aucune information sur le genre disponible</p>";
        }

        // Affichage de l'affiche de la série TV
        if (isset($tv_details["poster_path"])) {
            $poster_url = "https://image.tmdb.org/t/p/w300" . $tv_details["poster_path"];
            echo "<img src='" . $poster_url . "' alt='Affiche de la série TV'>";
        } else {
            echo "<p>Aucune affiche disponible</p>";
        }

        // Vous pouvez afficher d'autres détails de la série TV selon vos besoins
    } else {
        echo "Aucune série TV trouvée avec l'ID spécifié.";
    }
} else {
    echo "ID de série TV non fourni.";
}
