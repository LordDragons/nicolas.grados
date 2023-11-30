<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transformations de texte</title>
    <style>
     
        .resultat {
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>

<?php
function gras($str) {
    $mots = explode(' ', $str);
    foreach ($mots as &$mot) {
       
        if (ctype_upper(substr($mot, 0, 1))) {
            $mot = '<b>' . $mot . '</b>';
        }
    }
    return implode(' ', $mots);
}


function cesar($str, $decalage = 2) {
    $resultat = '';
    for ($i = 0; $i < strlen($str); $i++) {
        $caractere = $str[$i];
     
        if (ctype_alpha($caractere)) {
            $minuscule = (ord($caractere) >= 97);
            $caractere = chr((ord($caractere) + $decalage - ($minuscule ? 97 : 65)) % 26 + ($minuscule ? 97 : 65));
        }
        $resultat .= $caractere;
    }
    return $resultat;
}


function plateforme($str) {
    $mots = explode(' ', $str);
    foreach ($mots as &$mot) {
        if (substr($mot, -2) === 'me') {
            $mot = $mot . '_';
        }
    }
    return implode(' ', $mots);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $inputStr = isset($_POST['str']) ? $_POST['str'] : '';
    $selectedFunction = isset($_POST['fonction']) ? $_POST['fonction'] : '';

    
    switch ($selectedFunction) {
        case 'gras':
            $resultat = gras($inputStr);
            break;
        case 'cesar':
            $resultat = cesar($inputStr, 2); 
            break;
        case 'plateforme':
            $resultat = plateforme($inputStr);
            break;
        default:
            $resultat = $inputStr; 
            break;
    }
}
?>

<form method="post" action="">
    <label for="str">Texte :</label>
    <input type="text" name="str" id="str" value="<?php echo isset($inputStr) ? htmlspecialchars($inputStr) : ''; ?>" required>
    
    <label for="fonction">Choisissez une transformation :</label>
    <select name="fonction" id="fonction">
        <option value="gras">Mots en gras</option>
        <option value="cesar">Chiffrement de César</option>
        <option value="plateforme">Ajouter "_" aux mots finissant par "me"</option>
    </select>
    
    <button type="submit">Appliquer la transformation</button>
</form>

<?php

if (isset($resultat)) {
    echo '<p>Résultat : <span class="resultat">' . htmlspecialchars($resultat) . '</span></p>';
}
?>

</body>
</html>
