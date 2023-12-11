<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <style>
        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        .connexion {
            background-color: green;
            color: white;
            padding: 12px 12px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
        }

        .deconnexion {
            background-color: red;
            color: white;
            padding: 12px 12px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>

    <?php
    if (!isset($_COOKIE['prenom'])) {
        $_COOKIE['prenom'] = array();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $prenom = $_POST['prenom'];
        setcookie('prenom', $prenom);
        echo "Bonjour, $prenom ";
    }
    ?>

    <form method="post" action="">

        <label for="prenom">Entrez votre prénom</label>
        <input type="text" name="prenom" id="prenom">

        <button class="connexion" type="submit" name="connexion">connexion</button>
        <button class="deconnexion" type="submit" name="deconnexion">deconnexion</button>

    </form>
</body>

</html>