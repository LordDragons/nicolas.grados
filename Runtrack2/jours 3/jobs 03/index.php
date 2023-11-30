<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>index.php</title>

</head>
<body>
<?php

$str = "I'm sorry Dave I'm afraid I can't do that";


$str = strtolower($str);


$voyelles = "aeiou";
$resultat = "";

for ($i = 0; $i < strlen($str); $i++) {
    $caractere = $str[$i];
    if (strpos($voyelles, $caractere) !== false) {
        $resultat .= $caractere;
    }
}

echo $resultat;
?>


</table>

</body>
</html>

</body>
</html> 