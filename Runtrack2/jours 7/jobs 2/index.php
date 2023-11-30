<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salutation</title>
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

        label, input, button {
            margin: 10px;
        }
    </style>
</head>
<body>

<?php
function bonjour($jour) {
    if ($jour === true) {
        echo "Bonjour";
    } else {
        echo "Bonsoir";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $choixBonjour = isset($_POST['choixBonjour']) ? $_POST['choixBonjour'] : 'false';
    $estMatin = $choixBonjour === 'true';
    bonjour($estMatin);
}
?>

<form method="post" action="">
    <label>
        <input type="radio" name="choixBonjour" value="true" checked> Bonjour
    </label>
    <label>
        <input type="radio" name="choixBonjour" value="false"> Bonsoir
    </label>
    <button type="submit">Valider</button>
</form>

</body>
</html>

