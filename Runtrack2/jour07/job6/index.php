<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

function leetSpeak($str) {
    $result = "";

    for ($i = 0; $i < strlen($str); $i++) {
        $char = strtolower($str[$i]);

        switch ($char) {
            case 'a':
                $result .= '4';
                break;
            case 'b':
                $result .= '8';
                break;
            case 'e':
                $result .= '3';
                break;
            case 'g':
                $result .= '6';
                break;
            case 'l':
                $result .= '1';
                break;
            case 's':
                $result .= '5';
                break;
            case 't':
                $result .= '7';
                break;
            default:
                $result .= $str[$i];
                break;
        }
    }

    return $result;
}

// Exemple d'utilisation de la fonction
$texteOriginal = "Bonjour les Amis, Joyeux Noel a tous ";
$texteLeet = leetSpeak($texteOriginal);

echo "Texte original : $texteOriginal<br>";
echo "Texte Leet Speak : $texteLeet";
?>

</body>
</html>

