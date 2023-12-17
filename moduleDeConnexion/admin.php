<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: goldenrod;
            text-align: center;
            display: flex;
            justify-content: center;
        }

        table {
            background-color: #28a745;
            color: black;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid white;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #218838;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "moduleconnexion";

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifie la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Vérifie si les login et les password sont bons
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        // Vérifie si c'est bien l'admin qui tente une connexion
        if ($login === "admin" && $password === "admin") {
            $sql = "SELECT * FROM utilisateurs";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Créer un tableau avec toutes les données
                echo "<h1>Liste des utilisateurs</h1>";
                echo "<table>";

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
                echo "Login ou password incorrect";
            }
        } else {
            echo "Login ou password incorrect";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deconnexion'])) {
        // Si oui, supprime le cookie et recharge la page
        setcookie('id', null);
        header("Location:" . $_SERVER['PHP_SELF']);
        exit();
    }

    $conn->close();
    ?>

    <form class="mt-5 w-75 mx-auto" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="login">Login</label>
            <input name="login" type="text" id="login" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password">Mot de passe</label>
            <input name="password" type="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Login</button>
    </form>

    <form method="POST" action="index.php">
        <button type="submit" name="deconnexion" class="btn btn-danger mt-3">Deconnexion</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>