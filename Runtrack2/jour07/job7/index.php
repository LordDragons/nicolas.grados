<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de Texte</title>
</head>

<style>
    form {
        max-width: 400px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input,
    textarea {
        width: 100%;
        padding: 5%;
        margin-bottom: 15px;
    }

    button {
        background-color: green;
        color: white;
        padding: 12px 12px;
        border: none;
        border-radius: 50%;
        cursor: pointer;
    }
</style>

<body>

    <?php

    function gras($str)
    {
        $mots = explode(' ', $str);
        foreach ($mots as $mot) {

            if (ctype_upper(substr($mot, 0, 1))) {
                $mot = '<b>' . $mot . '</b>';
            }
        }
        return implode(' ', $mots);
    }

    function cesar($str, $decalage = 3)
    {
        $resultat = '';
        for ($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];

            if (ctype_alpha($char)) {
                $minuscule = (ord($char) >= 97);
                $char = chr((ord($char) + $decalage - ($minuscule ? 97 : 65)) % 26 + ($minuscule ? 97 : 65));
            }
            $resultat .= $char;
        }
        return $resultat;
    }

    function plateforme($str)
    {
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
                $resultat = cesar($inputStr, $decalage = 3);
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

    <div>

        <form method="post" action="">
            <label for="str">Texte :</label>
            <input type="text" name="str" id="str" value="<?php echo isset($inputStr) ? htmlspecialchars($inputStr) : ''; ?>" required>

            <label for="fonction">Choisissez une transformation :</label>
            <select name="fonction" id="fonction">
                <option value="gras">Mots en gras</option>
                <option value="cesar">Chiffrement de César</option>
                <option value="plateforme">Ajouter "_" aux mots finissant par "me"</option>
            </select>

            <button type="submit">Appliquer le choix</button>
        </form>

    </div>

    <?php

    if (isset($resultat)) {
        echo '<p>Résultat : <span class="resultat">' . htmlspecialchars($resultat) . '</span></p>';
    }
    ?>
</body>

</html>