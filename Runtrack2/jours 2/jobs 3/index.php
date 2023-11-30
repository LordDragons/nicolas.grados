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

for ($i = 0; $i <= 100; $i++) {
    
    if ($i >= 0 && $i <= 20) {
        echo "<i>{$i}</i><br />";
    } elseif ($i >= 25 && $i <= 50) {
        echo "<u>{$i}</u><br />";
    } elseif ($i == 42) {
        echo "La Plateforme_<br />";
    } else {
        echo "{$i}<br />";
    }
}
?>

</body>
</html>


   
        