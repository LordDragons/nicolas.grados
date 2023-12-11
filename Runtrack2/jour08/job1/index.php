<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

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

    <?php
/*echo '<pre>';
var_dump($_SESSION);
echo '</pre>';*/

    if (isset($_SESSION)) {
        $_SESSION['nbvisite'] += 1;

        echo 'Vous avez visité cette page ', $_SESSION['nbvisite'] , ' fois';
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $_SESSION['nbvisite'] = -1;
        header("Location:" . $_SERVER['PHP_SELF']);
        exit();

        echo 'Le compteur a été réinitialisé.';
    }
    ?>

    <form method="POST" action="">
        <div class="controls">

            <button type="submit">Reset</button>

        </div>
    </form>

</body>

</html>