<?php

function debugE($element)
{
    echo '<pre>';
    var_dump($element);
    echo '</pre>';
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Modifier le Profil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets//reservation.css">
</head>


<body>

    <?php
    session_start();
    require_once('functions.php');

    $user['login'] = '';
    $user['password'] = '';

    try {

        $bdd = new mysqli("localhost", "root", "", "reservationssalles");

        if (isset($_COOKIE['id_utilisateur'])) {
            $id_utilisateur = $_COOKIE['id_utilisateur'];

            // Recherche les données liées a l'id utilisateurs
            $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = ?");
            $req->bind_param('i', $id_utilisateur);
            $req->execute();
            $user = $req->get_result()->fetch_assoc();
            $req->close();

            // Verifie que l'utilisateur est bien existant
            if (!$user) {
                echo "Utilisateur trouvé.";
                exit();
            }

            // Si le formulaire est soumis
            if (isset($_POST['login']) && isset($_POST['password'])) {
                $login = $_POST['login'];
                $password = $_POST['password'];



                // Requête de modification d'enregistrement
                $ModifierDisque = "UPDATE utilisateurs SET login=?,  password=? WHERE id_utilisateur=?";
                $stmt = $bdd->prepare($ModifierDisque);
                $stmt->bind_param('ssi', $login, $password, $id_utilisateur);
                $stmt->execute();

                // Contrôle sur la requête
                if (!$stmt) {
                    die('Erreur SQL !' . $ModifierDisque . '<br />' . $bdd->error);
                } else {
                    echo "<div class='alert alert-success'><h1>Requête validée !</h1><p>La mise à jour a bien été effectuée !</p>";
                }

                $stmt->close();
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deconnexion'])) {

            setcookie('id_utilisateur', '');
            header("Location: index.php");
            exit();
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ?>


    <h1>Voici votre Profil</h1>

    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
        <div>
            <label for="login">Login:</label>
            <input name="login" type="text" value="<?= $user['login']; ?>" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input name="password" type="text" value="<?= $user['password']; ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Modifier mon profil</button>
    </form>

    <form method="POST" action="index.php">
        <button type="submit" name="deconnexion" class="btn btn-danger">Deconnexion</button>
    </form>


    //Fin modification de profil
    //Debut reservation de salle

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

    //..............................Affichage du planning

    if ($bdd->connect_error) {
        die("Connection failed: " . $bdd->connect_error);
    }

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

    <script>
        function logout() {

            document.cookie = "id_utilisateur=";
            window.location.href = 'index.php';
        }
    </script>

</body>

</html>