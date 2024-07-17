<?php
// users.php

// Paramètres de connexion à la base de données
$dsn = "mysql:host=localhost;dbname=utilisateurs";
$username = "root";
$password = "";

// Options de connexion PDO
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
);

try {
    // Créer une instance de connexion PDO
    $pdo = new PDO($dsn, $username, $password, $options);

    // Préparer et exécuter la requête SQL
    $query = "SELECT * FROM utilisateurs";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Récupérer les résultats de la requête
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les utilisateurs au format JSON
    header('Content-Type: application/json');
    echo json_encode($users);
} catch (PDOException $e) {
    // En cas d'erreur de connexion ou d'exécution de la requête
    die("Erreur : " . $e->getMessage());
} finally {
    // Fermer la connexion à la base de données
    $pdo = null;
}
?>
