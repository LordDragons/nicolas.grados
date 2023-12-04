
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Création d'une Maison</title>
        <style>
            
.mur {
    display: inline-block;
    width: 0;
    height: 0;
    border-left: 50px solid transparent;
    border-right: 50px solid transparent;
    border-bottom: 100px solid green;
    margin-bottom: -5px;
}
            
.toit {
    width: 100px;
    height: 50px;
    background-color: brown;
    margin-bottom: -5px;
}

form {
    max-width: 400px;
    margin: 0 auto;
}
label {
    display: block;
    margin-bottom: 8px;
}
input,
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
}
button {
    background-color: blue;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
            </style>
</head>
<body>
    
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $largeur = $_POST["largeur"];
    $hauteur = $_POST["hauteur"];

    if (is_numeric($largeur) && is_numeric($hauteur)) {
     
        echo "<div class='mur'></div>";
        echo "<div class='toit'></div>";
    } else {
        echo "Veuillez entrer des valeurs numériques pour la largeur et la hauteur.";
    }
}
?>

<form method="post" action="">
    <label for="largeur">Largeur des murs :</label>
    <input type="text" name="largeur" id="largeur" required><br>

    <label for="hauteur">Hauteur des murs:</label>
    <input type="text" name="hauteur" id="hauteur" required><br>

    <button type="submit" >Créer Maison</button>
</form>

</body>
</html>

