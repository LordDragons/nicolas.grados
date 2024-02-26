<?php
// Connexion à la base de données (à adapter avec vos paramètres)
$conn = new mysqli('localhost', 'root', '', 'autocompletion');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérez les suggestions de la base de données
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $query = "SELECT nom FROM foodtruck WHERE nom LIKE '%$searchTerm%' LIMIT 10";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Affichez les suggestions sous forme de liste
        echo '<ul>';
        while ($row = $result->fetch_assoc()) {
            echo '<li>' . $row['nom'] . '</li>';
        }
        echo '</ul>';
    } else {
        echo 'Aucune suggestion trouvée.';
    }
}

$conn->close();
?>
