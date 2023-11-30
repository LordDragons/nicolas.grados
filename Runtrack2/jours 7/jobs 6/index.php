<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leet Speak Converter</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<?php
function leetSpeak($str) {
    $str = str_replace(['A', 'B', 'E', 'G', 'L', 'S', 'T', 'a', 'b', 'e', 'g', 'l', 's', 't'],
                       ['4', '8', '3', '6', '1', '5', '7', '4', '8', '3', '6', '1', '5', '7'], $str);
    return $str;
}

$texte = "Leet Speak is awesome!";
$resultatLeetSpeak = leetSpeak($texte);


echo "<table>";
echo "<tr><th>Texte original</th><td>$texte</td></tr>";
echo "<tr><th>Leet Speak</th><td>$resultatLeetSpeak</td></tr>";
echo "</table>";
?>

</body>
</html>

