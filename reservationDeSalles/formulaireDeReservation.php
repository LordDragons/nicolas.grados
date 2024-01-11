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

    <form action="profil.php" method="GET">
        <label for="salle">Salle :</label>
        <select name="salle" id="salle">
            <option value="salle1">Salle 1</option>
            <option value="salle2">Salle 2</option>
            <option value="salle3">Salle 3</option>
            <option value="salle4">Salle 4</option>
            <option value="salle5">Salle 5</option>
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

        <input type="submit" value="Vérifier la disponibilité et Réserver">
    </form>

    <?php
    if (isset($_GET['salle']) && isset($_GET['debut']) && isset($_GET['fin']) && isset($_GET['description'])) {
        $salle = $_GET['salle'];
        $description = $_GET['description'];
        $debut = $_GET['debut'];
        $fin = $_GET['fin'];

        $dateDebut = new DateTime($debut);
        $dateFin = new DateTime($fin);

        $debutFormate = $dateDebut->format('Y-m-d H:i:s');
        $finFormatee = $dateFin->format('Y-m-d H:i:s');

        if (isAvailable($salle, $debut, $fin, $description, $bdd)) {
            saveReservation($salle, $debut, $fin, $description, $bdd);
            echo "<p>Réservation réussie!</p>";
        } else {
            echo "<p>La salle n'est pas disponible pour le créneau sélectionné.</p>";
        }

        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Heure</th>";
        displayWeekDaysFrench();
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        displayTimeSlots($debut, $fin);
        echo "</tbody>";
        echo "</table>";
    }

    $joursSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'] ;

    echo "<table>" ;
        echo "<tr><th>Heure</th>" ;
        
        foreach ($joursSemaine as $jour) {
            echo "<th>$jour</th>" ;
        }
        echo "</tr>" ;
        
        for ($heure = 9 ; $heure <= 17 ; $heure++) {
            $heureFormat = sprintf('%02d', $heure) ;
            echo "<tr><td>$heureFormat :00 - $heureFormat :59</td>" ;
            
            foreach ($joursSemaine as $jour) {
                echo "<td>" ;
                    $slotKey = "{$jour}_{$heureFormat}" ;
                    $isReserved = isset($_GET['reservations'][$slotKey]) ? 'checked' : '' ;
                    echo "<input class=reserved name='reservations[$slotKey]' value='$isReserved' readonly>" ;
                    echo "</td>" ;
                }
                echo "</tr>" ;
            }
            
            echo "</table>";
            
            
            // Afficher le tableau et le planning de réservation uniquement lors de la soumission du formulaire
            
            if (isset($_GET['salle']) && isset($_GET['debut']) && isset($_GET['fin']) && isset($_GET['description'])) {
                displayReservationTable();
                displaySchedule();
            }
            ?>
        

</body>

</html>
