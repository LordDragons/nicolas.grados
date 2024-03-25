<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/cinetech.css">
    <title>Cinetech</title>
</head>
<header>
    <div class="logo">
        <h1>Bienvenue sur <a href="index.php">Dragociné</a></h1>
    </div>

    <?php
    if (isset($_COOKIE['id_user'])) {
        echo '
            <a href="favoris.php">Mes favoris</a>
            <a href="films.php">Les Films</a>
            <a href="series.php">Les Séries</a>
            <a href="commentaire.php">Les Commentaires</a>
        ';
    } else {
        echo '<a href="index.php">Mes favoris</a>';
        echo '<a href="index.php">Les Films</a>';
        echo '<a href="index.php">Les Séries</a>';
        echo '<a href="index.php">Les Commentaires</a>';
    }
    ?>

<div class="search-bar">
    <input type="text" id="search-input" placeholder="Rechercher..." oninput="getSuggestions()">
    <ul id="suggestions-list"></ul>
    <button id="search-button" onclick="searchMoviesAndSeries()">Rechercher</button>
</div>

</header>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="assets/cinetech.js"></script>
</body>

</html>
