<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/reservation.css">
    <style>
        .reserved {
            background-color: red;
            content: "Réservé" ;
        }
    </style>
    <title>Formulaire de réservation</title>
</head>

<?php
session_start();
require_once('functions.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservationssalles";

$bdd = new mysqli($servername, $username, $password, $dbname);

if ($bdd->connect_error) {
    die("Connection failed: " . $bdd->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    handleRequest();
}
?>

<body>

<h1>Formulaire de réservation</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="salle">Salle :</label>
    <select name="salle" id="salle">
        <option value="salle1">Salle 1</option>
        <option value="salle2">Salle 2</option>
    </select>

    <label for="debut">Date et heure de début :</label>
    <input type="datetime-local" name="debut" required>

    <label for="fin">Date et heure de fin :</label>
    <input type="datetime-local" name="fin" required>

    <label for="description">Thème :</label>
    <select name="description" id="description">
        <option value="mariage">Mariage</option>
        <option value="jeu">Jeu de rôle/société</option>
        <option value="anniv">Anniversaire</option>
        <option value="divorce">Divorce</option>
        <option value="loto">Loto</option>
        <option value="Enterrement">Enterrement de vie garçon/fille</option>
        <option value="autre">Autre</option>
    </select>

    <input type="submit" name="reserve" value="Vérifier la disponibilité et Réserver">
</form>

<?php
// Vérifiez si les paramètres de réservation sont présents
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['salle']) && isset($_POST['debut']) && isset($_POST['fin']) && isset($_POST['description']) && isset($_POST['reserve'])) {
    $salle = $_POST['salle'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
    $description = $_POST['description'];

    // Convertir les chaînes de date en objets DateTime
    $dateDebut = new DateTime($debut);
    $dateFin = new DateTime($fin);

    // Formater les dates dans le format souhaité
    $debutFormatee = $dateDebut->format('Y-m-d H:i:s');
    $finFormatee = $dateFin->format('Y-m-d H:i:s');

    // Vérifiez la disponibilité de la salle
    if (isAvailable($salle, $debutFormatee, $finFormatee, $description)) {
        // Si la salle est disponible, enregistrez la réservation
        saveReservation($salle, $debutFormatee, $finFormatee, $description);
        echo "<p>Réservation réussie!</p>";
    } else {
        echo "<p>La salle n'est pas disponible pour le créneau sélectionné.</p>";
    }
}
            ?>
        

</body>

</html>
