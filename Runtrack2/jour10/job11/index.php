<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP SQL Table</title>
</head>

<body>
    <style>
        table {
            background-color: green;
        }
    </style>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jour09";

    // Creer connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    //  connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // données sql affichées dans le tableau
    $sql = "SELECT AVG(capacite) as capacité_moyenne FROM salles";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data in a table
        echo "<table border='1'>";

        echo "<thead><tr>";
        while ($champ = $result->fetch_field()) {
            echo "<th>{$champ->name}</th>";
        }
        echo "</tr></thead>";


        echo "<tbody>";
        while ($ligne = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($ligne as $valeur) {
                echo "<td>$valeur</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";


        echo "</table>";


        $result->free();
    } else {
        echo "Erreur dans la requête : " . $conn->error;
    }

    // Close the connection
    $conn->close();
    ?>

</body>

</html>