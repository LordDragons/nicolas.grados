<?php
function displayWeekDaysFrench() {
    $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
   
    foreach ($days as $day) {
        echo "<th>$day</th>";
    }
}

function displayTimeSlots($selectedMonth, $selectedYear) {
    $hours = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];

    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $selectedMonth, $selectedYear);

    for ($hourIndex = 0; $hourIndex < count($hours); $hourIndex++) {
        echo "<tr>";
        echo "<td>{$hours[$hourIndex]}</td>";

        for ($day = 1; $day <= $daysInMonth; $day++) {
            echo "<td>";

            // Bloquer le samedi et le dimanche sans réservation
            if (date('N', strtotime("$selectedYear-$selectedMonth-$day")) >= 6) {
                echo "<div class='inactive-day'>Jour non disponible</div>";
            } else {

                echo "Nom: John Doe<br>";
                echo "Titre: Réunion";
            }

            echo "</td>";
        }

        echo "</tr>";
    }
}

?>