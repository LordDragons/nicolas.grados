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
// Boucle pour générer les nombres de 1 à 100
for ($i = 1; $i <= 100; $i++) {
    // Conditions pour l'affichage spécial
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz<br />";
    } elseif ($i % 3 == 0) {
        echo "Fizz<br />";
    } elseif ($i % 5 == 0) {
        echo "Buzz<br />";
    } else {
        echo "{$i}<br />";
    }
}
?>


</body>
</html>


   
        