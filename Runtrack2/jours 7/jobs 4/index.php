<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        label, select, input, button {
            margin: 10px;
        }
    </style>
</head>
<body>

<?php
function calcule($a, $operation, $b) {
    switch ($operation) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            if ($b != 0) {
                return $a / $b;
            } else {
                return "Division par zéro impossible";
            }
        case '%':
            if ($b != 0) {
                return $a % $b;
            } else {
                return "Division par zéro impossible";
            }
        default:
            return "Opération non valide";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre1 = isset($_POST['nombre1']) ? $_POST['nombre1'] : 0;
    $operation = isset($_POST['operation']) ? $_POST['operation'] : '+';
    $nombre2 = isset($_POST['nombre2']) ? $_POST['nombre2'] : 0;
    $resultat = calcule($nombre1, $operation, $nombre2);
    echo "<p>Résultat de l'opération : $resultat</p>";
}
?>

<form method="post" action="">
    <label for="nombre1">NombreX:</label>
    <input type="text" name="nombre1" id="nombre1" value="<?php echo isset($nombre1) ? htmlspecialchars($nombre1) : ''; ?>" required>

    <label for="operation">Opération :</label>
    <select name="operation" id="operation">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
        <option value="%">%</option>
    </select>

    <label for="nombre2">NombreX:</label>
    <input type="text" name="nombre2" id="nombre2" value="<?php echo isset($nombre2) ? htmlspecialchars($nombre2) : ''; ?>" required>

    <button type="submit">Calculer</button>
</form>

</body>
</html>
