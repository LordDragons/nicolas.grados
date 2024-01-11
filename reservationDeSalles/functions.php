<?php

function displayWeekDaysFrench() {
    $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
   
    foreach ($days as $day) {
        echo "<th>$day</th>";
    }
}

function displayTimeSlots($selectedMonth, $selectedYear) {
    $hours = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];

    // Utiliser date_parse pour extraire le mois et l'année
    $parsedDate = date_parse($selectedMonth);
    $month = $parsedDate['month'];
    $year = $parsedDate['year'];
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    for ($hourIndex = 0; $hourIndex < count($hours); $hourIndex++) {
        echo "<tr>";
        echo "<td>{$hours[$hourIndex]}</td>";

        for ($day = 1; $day <= $daysInMonth; $day++) {
            echo "<td>";

            // Bloquer le samedi et le dimanche sans réservation
            $currentDate = "$year-$month-$day";
            if (date('N', strtotime($currentDate)) >= 6) {
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


function validerReservation($planning, $debut, $fin) {
    // Convertir les dates en objets DateTime
    $debutDt = new DateTime($debut);
    $finDt = new DateTime($fin);
    

    // Formater les dates dans le format souhaité
    $debutFormate = $debutDt->format('Y-m-d H:i:s');
    $finFormatee = $finDt->format('Y-m-d H:i:s');

    // Vérifier si la plage horaire est déjà réservée dans le planning
    foreach ($planning as $date => $plage) {
        $plageDebut = new DateTime("$date {$plage[0]}");
        $plageFin = new DateTime("$date {$plage[1]}");

        // Vérifier les conflits
        if ($debutDt < $plageFin && $finDt > $plageDebut || $debutDt >= $finDt) {
            echo "La réservation est en conflit avec une autre réservation.\n";
            return false;
        }
    }

    echo "La réservation est valide.\n";
    return true;
}

// Fonction pour vérifier la disponibilité de la salle
function isAvailable($salle, $debut, $fin, $description) {
    
    $conn = new mysqli("localhost", "root", "", "reservationssalles");

    // Vérifiez la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Préparez la requête SQL pour vérifier la disponibilité
    $stmt = $conn->prepare("SELECT * FROM reservations WHERE salle = ? AND debut < ? AND fin > ? AND description = ?");
    $stmt->bind_param("sdds",$salle, $debut, $fin, $description);
    $stmt->execute();

    // Si une réservation existe, la salle n'est pas disponible
    $stmt->store_result();
    $count = $stmt->num_rows;
    $stmt->close();
    $conn->close();

    return $count === 0;
}

// Fonction pour enregistrer une réservation dans la base de données


function saveReservation($salle, $debut, $fin, $description) {
    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "reservationssalles");

    // Vérifiez la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Convertir le format de la date
    $debut = date('Y-m-d H:i:s', strtotime($debut));
    $fin = date('Y-m-d H:i:s', strtotime($fin));

    // Préparez la requête SQL pour enregistrer la réservation
    if (isset($_COOKIE['id_utilisateur'])) {
        $id_utilisateur = $_COOKIE['id_utilisateur'];

        $stmt = $conn->prepare("INSERT INTO reservations (salle, debut, fin, description, id_utilisateur) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $salle, $debut, $fin, $description, $id_utilisateur);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<p>Réservation réussie!</p>";
        } else {
            echo "<p>Erreur lors de l'enregistrement de la réservation: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Erreur: Session utilisateur non définie.</p>";
    }

    $conn->close();
}

//gérer la demande

function handleRequest()
{
    global $conn;

    if (isset($_GET['description'])) {
        $nouvelleReservation = $_GET['description'];
        $debut = $_GET['debut'];
        $fin = $_GET['fin'];

        if (!empty($nouvelleReservation) && isset($_SESSION['id_utilisateur'])) {
            $id_utilisateur = $_SESSION['id_utilisateur'];

            $requeteNouveau = $conn->prepare("INSERT INTO reservations (salle, debut, id_utilisateur, description, fin) VALUES (?, ?, ?, ?, ?)");
            $requeteNouveau->bind_param('isiss', $salle, $debut, $id_utilisateur, $nouvelleReservation, $fin);
            $requeteNouveau->execute();

            if ($requeteNouveau->error) {
                die('Erreur SQL !' . $requeteNouveau->error);
            } elseif ($requeteNouveau->affected_rows === 0) {
                echo "<div class='alert alert-danger'><h2>Erreur !</h2><p>La requête n'a eu aucun impact sur la base de données.</p></div>";
            } else {
                echo "<div class='alert alert-success'><h2>Requête validée !</h2><p>Le commentaire a bien été mis en ligne !</p></div>";
            }

            $requeteNouveau->close();
        }
    }
}
//afficher le calendrier
function displaySchedule()
{
    global $bdd;
        $joursSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];

    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Heure</th>";

    foreach ($joursSemaine as $jour) {
        echo "<th>$jour</th>";
    }

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    for ($heure = 9; $heure <= 17; $heure++) {
        $heureFormat = sprintf('%02d', $heure);
        echo "<tr><td>$heureFormat:00 - $heureFormat:59</td>";

        foreach ($joursSemaine as $jour) {
            echo "<td>";
            $slotKey = "{$jour}_{$heureFormat}";
            $isReserved = isset($_GET['reservations'][$slotKey]) ? 'checked' : '';
            echo "<input class='reserved' name='reservations[$slotKey]' value='$isReserved' readonly>";
            echo "</td>";
        }

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}


//afficher le tableau de réservation
function displayReservationTable()
{
    global $conn;
        echo "<h2>Table des Réservations</h2>";

    // selon la structure de table de réservation avec des colonnes id, salle, debut, fin, description
    $sql = "SELECT id, salle, debut, fin, description FROM reservations";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Salle</th>";
        echo "<th>Date et Heure de Début</th>";
        echo "<th>Date et Heure de Fin</th>";
        echo "<th>Description</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['salle']}</td>";
            echo "<td>{$row['debut']}</td>";
            echo "<td>{$row['fin']}</td>";
            echo "<td>{$row['description']}</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Aucune réservation trouvée.</p>";
    }
}


//Cela vérifie si l'emplacemenr est déjé réservé

function isSlotReserved($slotKey, $reservationsFromPost, $reservationsFromDatabase) {
    if (isset($reservationsFromPost[$slotKey])) {
        return true;
    }

    foreach ($reservationsFromDatabase as $row) {
        if ($row['id_reservation'] == $reservationsFromPost[$slotKey]) {
            return true;
        }
    }

    return false;
}

//Fonction pour récupérer les réservations de la base de données
function getReservationsFromDatabase($bdd) {
    $query = "SELECT id_reservation, salle, debut, fin, description FROM reservations";
    $result = $bdd->query($query);
    $reservations = [];

    while ($row = $result->fetch_assoc()) {
        $reservations[] = $row;
    }

    return $reservations;
}