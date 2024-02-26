<?php
// Connexion à la base de données (à adapter avec vos paramètres)
$conn = new mysqli('localhost', 'root', '', 'autocompletion');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $query = "SELECT * FROM foodtruck WHERE nom = '$searchTerm'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Afficher les informations récupérées de la base de données
        echo '<p>Nom : ' . $row['nom'] . '</p>';
        echo '<p>Pays : ' . $row['pays'] . '</p>';
        echo '<p>Description : ' . $row['description'] . '</p>';
        // ... Ajoutez d'autres informations ici ...
    } else {
        echo 'Aucune information trouvée.';
    }
}

$conn->close();
