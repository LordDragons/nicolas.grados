<?php
include 'header.php';
include 'basededonnée.php'; 

$id_user = 1; 

// Récupérer les films favoris de l'utilisateur depuis la base de données
$stmt_movies = $pdo->prepare("SELECT id_favori FROM favoris WHERE id_user = ? AND type = 'movie'");
$stmt_movies->execute([$id_user]);
$favorite_movies = $stmt_movies->fetchAll(PDO::FETCH_COLUMN);

// Récupérer les séries favorites de l'utilisateur depuis la base de données
$stmt_series = $pdo->prepare("SELECT id_favori FROM favoris WHERE id_user = ? AND type = 'serie'");
$stmt_series->execute([$id_user]);
$favorite_series = $stmt_series->fetchAll(PDO::FETCH_COLUMN);

// Fonction pour vérifier si un film ou une série est dans la liste des favoris
function isFavorite($id, $favorites) {
    return in_array($id, $favorites);
}
?>

<div class="container">
    <h2>Films favoris</h2>
    <div class="row">
        <?php
        foreach ($favorite_movies as $movie_id) {
            // Récupérer les détails du film depuis l'API en utilisant $movie_id
            // Afficher les détails du film
        }
        ?>
    </div>

    <h2>Séries favorites</h2>
    <div class="row">
        <?php
        foreach ($favorite_series as $serie_id) {
            // Récupérer les détails de la série depuis l'API en utilisant $serie_id
            // Afficher les détails de la série
        }
        ?>
    </div>
</div>

