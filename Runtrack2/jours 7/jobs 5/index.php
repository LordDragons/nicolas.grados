<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Occurrences de caractère</title>
    <style>
        label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<?php
function occurrences($str, $char) {
    return substr_count($str, $char);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $texte = isset($_POST['texte']) ? $_POST['texte'] : '';
    $caractere = isset($_POST['caractere']) ? $_POST['caractere'] : '';

    
    $nombreOccurrences = occurrences($texte, $caractere);

    
    echo "<p>Le nombre d'occurrences de '$caractere' dans '$texte' est : $nombreOccurrences</p>";
}
?>


<form method="post" action="">
    <label for="texte">Texte :</label>
    <input type="text" name="texte" id="texte" value="<?php echo isset($texte) ? htmlspecialchars($texte) : ''; ?>" required>

    <label for="caractere">Caractère :</label>
    <input type="text" name="caractere" id="caractere" value="<?php echo isset($caractere) ? htmlspecialchars($caractere) : ''; ?>" required>

    <button type="submit">Compter les occurrences</button>
</form>

</body>
</html>
