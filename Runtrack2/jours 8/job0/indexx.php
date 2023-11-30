<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tic Tac Toe</title>
    <style>
        
        table {
            border-collapse: collapse;
        }
        td {
            width: 50px;
            height: 50px;
            border: 1px solid black;
            text-align: center;
            font-size: 24px;
        }
        input[type="submit"] {
            width: 100%;
            height: 100%;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <h2>Tic Tac Toe</h2>
    <form method="post">
        <table>
            <?php
            // Check if the game is reset
            if (isset($_POST['reset'])) {
                setcookie('grid', '', time() - 3600); // Remove the grid cookie
            }

            // Initialize or get the current grid state
            $grid = isset($_COOKIE['grid']) ? $_COOKIE['grid'] : '---------';

            // Display the grid
            for ($i = 0; $i < 3; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 3; $j++) {
                    $index = $i * 3 + $j;
                    $value = $grid[$index] === '-' ? '' : $grid[$index];
                    echo "<td><input type='submit' name='cell' value='$value' /></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
        <input type="submit" name="reset" value="Réinitialiser la partie">
    </form>
</body>
</html>

