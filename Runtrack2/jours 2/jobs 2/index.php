<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$un=1;
$deux=1337;

// Boucle pour générer les nombres de 0 à 1337
for ($i = 0; $i <= 1337; $i++) {
    // Vérifier si le nombre est exclu
    if ($i != 26 && $i != 37 && $i != 88 && $i != 1111 && $i != 3233) {
        echo $i . "<br />";
    }
}
     for ($i = $un; $i <= $deux; $i++) 
     { 
        echo"$i<br>\n";
        if ($i == 42)   
    {echo"<b>$i</b><br>";}

     }

     ?>
</body>
</html>


   
        