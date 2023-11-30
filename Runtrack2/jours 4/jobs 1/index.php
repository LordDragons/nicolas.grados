<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index  GET</title>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $nombre_arguments = count($_GET);

    echo "Le nombre d'arguments GET envoyé est : " . $nombre_arguments;
}
?>

<form method="get" action="">
    <label for="champ1">Champ 1 :</label>
    <input type="text" name="champ1" id="champ1"><br>

    <label for="champ2">Champ 2 :</label>
    <input type="text" name="champ2" id="champ2"><br>

 

    <input type="submit" value="Envoyer">
</form>

</body>
</html>
