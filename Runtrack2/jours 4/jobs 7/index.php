<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de Maison</title>
    <style>
       
        .maison {
            display: inline-block;
            width: 0;
            height: 0;
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            border-bottom: 100px solid red;
            margin-bottom: 20px;
        }

        .toit {
            width: 100px;
            height: 50px;
            background-color: brown;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $largeur = $_POST["largeur"];
    $hauteur = $_POST["hauteur"];


    if (is_numeric($largeur) && is_numeric($hauteur)) {
     
        echo "<div class='maison'></div>";
        echo "<div class='toit'></div>";
    } else {
        echo "Veuillez entrer des valeurs numériques pour la largeur et la hauteur.";
    }
}
?>

<form method="post" action="">
    <label for="largeur">Largeur de la maison :</label>
    <input type="text" name="largeur" id="largeur" required><br>

    <label for="hauteur">Hauteur de la maison :</label>
    <input type="text" name="hauteur" id="hauteur" required><br>

    <input type="submit" value="Créer Maison">
</form>

</body>
</html>

