<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets//reservation.css">
    <title>Planning de la salle</title>
</head>
<body>
    <h1>Reservation de la salle</h1>


<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservationssalles";

$bdd = new mysqli($servername, $username, $password, $dbname);

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
   echo "<form method='post'>";
   echo "<label for='selectedDate'>Choisir la semaine :</label>";
   echo "<input type='date' id='selectedDate' name='selectedDate' required>";
   echo "<button type='submit'>Afficher la semaine</button>";
   echo "</form>";


   // Définir le fuseau horaire à Paris (France)
   date_default_timezone_set('Europe/Paris');
   $joursSemaine = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];

   // Vérifiez si une date sélectionnée par l'utilisateur est fournie, sinon utilisez la semaine en cours
   $userSelectedDate = isset($_POST['selectedDate']) ? new DateTime($_POST['selectedDate']) : new DateTime('this week');


   echo "<table>";
   echo "<tr><th>Heure</th>";

   // Réinitialiser la date au début de la semaine sélectionnée
   $day = '';

   $dayNumber = $userSelectedDate->format('w');
   if ($dayNumber == '0') {
       $userSelectedDate->modify('+1 days');
   } else if ($dayNumber == '6') {
       $userSelectedDate->modify('+2 days');
   } else if ($dayNumber > '1' && $dayNumber < '6') {
       $userSelectedDate->modify('-' . (intval($dayNumber) - 1) . ' days');
   }

   $userSelectedDateStart = clone $userSelectedDate; //Met en mémoire la date sélectionnée
   // Afficher les jours de la semaine et les dates correspondantes pour la semaine sélectionnée
   for ($i = 0; $i < 5; $i++) {
       $currentDay = $userSelectedDate->format('w d/m/y');
       $explodeCurrentDay = explode(' ', $currentDay);

       echo "<th>{$joursSemaine[$explodeCurrentDay[0]]}<br>$explodeCurrentDay[1]</th>";

       $userSelectedDate->modify('+1 day');
   }

   echo "</tr>";

   // Requete de récupération des données
   $sql = "SELECT * FROM reservations WHERE debut >= '{$userSelectedDateStart->format('Y-m-d')}' AND fin <= '{$userSelectedDate->format('Y-m-d')}'";
   $result = $bdd->query($sql);

   //Affichage des Heures au début du tableau
   for ($heure = 9; $heure <= 17; $heure++) {
       $dateTemp = clone $userSelectedDateStart;
       $heureFormat = sprintf('%02d', $heure);
       $heureFinFormat = $heure + 1;
       $heureFinFormat = sprintf('%02d', $heureFinFormat);
       echo "<tr><td>$heureFormat:00 - $heureFinFormat:00</td>";

       ///*****************************Affichage des reservations************* */

       for ($i = 5; $i > 0; $i--) {

           $dateFormatCompare = new DateTime($dateTemp->format('Y-m-d') . " {$heureFormat}:00:00"); // Compare les dates
           $dateFormatCompareFin = new DateTime($dateTemp->format('Y-m-d') . " {$heureFinFormat}:00:00"); // Compare les dates

           echo "<td class='";

           $reservationInfo = "";

           if ($result->num_rows > 0) {
               foreach ($result as $row) {

                   $newDateDebut = new DateTime($row['debut']);
                   $newDateFin = new DateTime($row['fin']);

                   if ($dateFormatCompare >= $newDateDebut  &&   $dateFormatCompareFin <= $newDateFin) {
                       $debutFormatee = $row['debut'];
                       $finFormatee = $row['fin'];
                       $reservationInfo .= "reserved'> <span class='reserved'>Réservé</span>";
                   } else {
                       echo "'>";
                       echo "Pas de Réservation ";
                   }
               }
               echo $reservationInfo;
           } else {
               echo "'>";
               echo "Pas de Réservation";
           }

           echo "</td>";

           $dateTemp->modify('+1 day');
       }
       echo "</tr>";
   }

   echo "</table>";

   $bdd->close();

   ?>
</body>

</html>