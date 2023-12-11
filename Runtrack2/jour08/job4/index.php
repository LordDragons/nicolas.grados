<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    // Vérifie si le prénom est déjà stocké dans un cookie
    if (isset($_COOKIE['prenom'])) {
        // Si le prénom est présent, affiche le message de bienvenue et le bouton de déconnexion
        echo "Bonjour " . $_COOKIE['prenom'] . " ! ";
        echo '<form method="post" action="">
            <button class="deconnexion" type="submit" name="deconnexion">Déconnexion</button>
          </form>';

        // Vérifie si le formulaire de déconnexion est soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deconnexion'])) {
            // Si oui, supprime le cookie et recharge la page
            setcookie('prenom', ''); 
            header("Location:" . $_SERVER['PHP_SELF']);
        }
    } else {
        // Si le prénom n'est pas stocké, affiche le formulaire de connexion
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['connexion'])) {
            // Si le formulaire est soumis, stocke le prénom dans un cookie et recharge la page
            $prenom = $_POST['prenom'];
            setcookie('prenom', $prenom);
            header("Location:" . $_SERVER['PHP_SELF']);
        }

        echo '<form method="post" action="">
            <label for="prenom">Entrez votre prénom</label>
            <input type="text" name="prenom" id="prenom">
            <button class="connexion" type="submit" name="connexion">Connexion</button>
          </form>';
    }
    ?>


</body>

</html>