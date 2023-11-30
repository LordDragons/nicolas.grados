<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>index.php</title>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Résultat</th>
    </tr>
</head>
<body>
<?php


  
    // Tableau des nombres
    $nombres = array(200, 204, 173, 98, 171, 404, 459);

    // Parcourir le tableau
    foreach ($nombres as $nombre) {
        // Vérifier si le nombre est pair ou impair
        echo "<tr>";
        echo "<td>$nombre</td>";
        echo "<td>";
        if ($nombre % 2 == 0) {
            echo "est Paire";
        } else {
            echo "est Impaire";
        }
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

</body>
</html> 