<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

h1 {
    text-align: center;
}

.inactive-day {
    color: #888;
}
</style>
<body>
<h1>Planning de la salle</h1>

<form action="planning.php" method="get">
    <label for="month">Mois :</label>
    <select name="month" id="month">
        <?php
        // Afficher les options pour les mois en français
        $months = [
            1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin',
            7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'
        ];
       
        foreach ($months as $key => $monthName) {
            $selected = (isset($_GET['month']) && $_GET['month'] == $key) ? 'selected' : '';
            echo "<option value='$key' $selected>$monthName</option>";
        }
        ?>
    </select>

    <label for="year">Année :</label>
    <input type="number" name="year" id="year" value="<?php echo (isset($_GET['year'])) ? $_GET['year'] : date('Y'); ?>" min="2022" max="2050">

    <input type="submit" value="Afficher le planning">
</form>

<?php
// Afficher le planning seulement si le formulaire est soumis
if (isset($_GET['month']) && isset($_GET['year'])) {
    $selectedMonth = $_GET['month'];
    $selectedYear = $_GET['year'];

    include_once('functions.php');
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Heure</th>";
    displayWeekDaysFrench();
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    displayTimeSlots($selectedMonth, $selectedYear);
    echo "</tbody>";
    echo "</table>";
}
?>
</body>
</html>
