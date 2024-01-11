<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/reservation.css">
    <title>Planning de la salle</title>
</head>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px #ddd solid;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    h1 {
        text-align: center;
    }

    .jour-inactif {
        color: #888;
    }

    .reserved {
        background-color: red;
        content: "Réservé"; 
    }
</style>

<body>
    <h1>Reservation de la salle</h1>


<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservationssalles";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_SESSION['id_utilisateur'])) {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_POST['salle'], $_POST['debut'], $_POST['fin'], $_POST['description'])) {
            $salle = $_POST['salle'];
            $debut = $_POST['debut'];
            $fin = $_POST['fin'];
            $description = $_POST['description'];

            require_once('functions.php');

            // verifie la disponibilité de la salle
            if (isAvailable($salle, $debut, $fin, $description)) {
                // Si disponible elle est réservée
                saveReservation($salle, $debut, $fin, $description);
                echo "<p>Réservation réussie!</p>";
            } else {
                echo "<p>La salle n'est pas disponible pour le créneau sélectionné.</p>";
            }
        }
    }
} else {
    echo "<p>Connectez-vous pour effectuer une réservation.</p>";
}
?>

<button type="button" class="btn btn-success btn-custom"><a href="connexion.php">Connexion</a></button>


    <?php

    if (isset($_SESSION['id_utilisateur'])) {
        echo "<form action='formulaireDeReservation.php' method='GET'>";
        echo "<input type='submit' value='Vérifier la disponibilité et Réserver'>";
        echo "</form>";
    }
    ?>

    <?php
   echo "<h1>Planning des salles</h1>";
    $joursSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];

    $dateDebut = new DateTime();
    $dateFin = new DateTime();

    echo "<form method='post'>";
    echo "<label for='selectedDate'>Choisir la semaine :</label>";
    echo "<input type='date' id='selectedDate' name='selectedDate' required>";
    echo "<button type='submit'>Afficher la semaine</button>";
    echo "</form>";
    
    
    // Définir le fuseau horaire à Paris (France)
    date_default_timezone_set('Europe/Paris');
    $joursSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
    
    // Vérifiez si une date sélectionnée par l'utilisateur est fournie, sinon utilisez la semaine en cours
    $userSelectedDate = isset($_POST['selectedDate']) ? new DateTime($_POST['selectedDate']) : new DateTime('this week');
    
    echo "<table>";
    echo "<tr><th>Heure</th>";
    
    // Réinitialiser la date au début de la semaine sélectionnée
    $userSelectedDate->modify('-5 days');
    
    // Afficher les jours de la semaine et les dates correspondantes pour la semaine sélectionnée
    for ($i = 0; $i < 5; $i++) {
        $currentDay = $userSelectedDate->format('d/m/y');
        echo "<th>{$joursSemaine[$i]}<br>$currentDay</th>";
    
        // Move to the next day
        $userSelectedDate->modify('+1 day');
    }
    
    echo "</tr>";
    
    // Réinitialiser la date au début de la semaine sélectionnée
    $userSelectedDate->modify('-5 days');
    
    for ($heure = 9; $heure <= 17; $heure++) {
        $heureFormat = sprintf('%02d', $heure);
        echo "<tr><td>$heureFormat:00 - $heureFormat:59</td>";
    
    
        for ($i = 0; $i < 5; $i++) {
            echo "<td>";
            $slotKey = "{$userSelectedDate->format('d/m/y')}_{$heureFormat}";
            
            // Vérifiez si l'emplacement est réservé
            if (isset($_POST['reservations'][$slotKey])) {
                $reservedBy = $_POST['reservations'][$slotKey];
                echo "<span style='color: red;'>Réservée</span><br>{$reservedBy}";
            } else {
                $isReserved = isset($_POST['reservations'][$slotKey]) ? 'checked' : '';
                echo "<input class='réservé' name='reservations[$slotKey]' value='$isReserved'>";
            }
    
            echo "</td>";
    
    
        }
    
        echo "</tr>";
        
        $userSelectedDate->modify('+1 day');
    }
    
    echo "</table>";

    ?>
</body>

</html>