<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de Nombre</title>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  
    $nombre = $_GET["nombre"];

   
    if (is_numeric($nombre)) {
        if ($nombre % 2 == 0) {
            echo "Nombre pair";
        } else {
            echo "Nombre impair";
        }
    } else {
        echo "Veuillez entrer un nombre valide.";
    }
}
?>

<form method="get" action="">
    <label for="nombre">Entrez un nombre :</label>
    <input type="text" name="nombre" id="nombre" required><br>

    <input type="submit" value="Valider">
</form>

</body>
</html>
