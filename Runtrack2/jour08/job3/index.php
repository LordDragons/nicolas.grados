<?php
session_start();
?>
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

        input,
        textarea {
            width: 100%;
            padding: 5%;
            margin-bottom: 15px;
        }

        .valider {
            background-color: green;
            color: white;
            padding: 12px 12px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
        }

        .reset {
            background-color: red;
            color: white;
            padding: 12px 12px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>

    <?php
// Pour initialiser le tableau d'affichage des prénoms.
    if (!isset($_SESSION['prenom'])) {
        $_SESSION['prenom'] = array();
    }

//fonctions pour ajouter les prénoms via le formulaires.
    function addNames($add)
    {
        array_push($_SESSION['prenom'], $add);
    }

//fonctions pour vider le tableau mémoires des prénoms.
    function deleteNames()
    {
        $_SESSION['prenom'] = array();
    }

//conditions d'utilisation des fonctions prédéfinies.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['valider'])) {
            $prenom = $_POST['prenom'];
            if (!empty($prenom) && !isset($_POST['reset'])) {
                addNames($prenom);
            }
        } elseif (isset($_POST['reset'])) {
            deleteNames();
        }
    }

    ?>

//formulaire d'ajout des prénoms.

    <form method="post" action="">

        <label for="prenom">Entrez votre prénom</label>
        <input type="text" name="prenom" id="prenom">

//création des boutons valider et reset.

        <button class="valider" type="submit" name="valider">Valider</button>
        <button class="reset" type="submit" name="reset" value="reset">Reset</button>

    </form>

//affichage de la listes avec les différents prénoms.
    <h2>Liste des prénoms :</h2>
    <?php
    if (!empty($_SESSION['prenom'])) {
        echo '<ul>';
        foreach ($_SESSION['prenom'] as $name) {
            echo '<li>' . htmlspecialchars($name) . '</li>';
        }
        echo '</ul>';
    }
    ?>

</body>

</html>