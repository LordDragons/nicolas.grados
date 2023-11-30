<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Morpion</title>
    <style>
        button {
            width: 50px;
            height: 100%;
            font-size: 20px;}
        
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
        table {
            margin-top: 90px;
        }

        #score {
            margin-top: 60px;
        }
    </style>
</head>
<body>

<h1>Morpion</h1>

<table>
    <tr>
        <td><button onclick="placeSymbol(0, 0)">-</button></td>
        <td><button onclick="placeSymbol(0, 1)">-</button></td>
        <td><button onclick="placeSymbol(0, 2)">-</button></td>
    </tr>
    <tr>
        <td><button onclick="placeSymbol(1, 0)">-</button></td>
        <td><button onclick="placeSymbol(1, 1)">-</button></td>
        <td><button onclick="placeSymbol(1, 2)">-</button></td>
    </tr>
    <tr>
        <td><button onclick="placeSymbol(2, 0)">-</button></td>
        <td><button onclick="placeSymbol(2, 1)">-</button></td>
        <td><button onclick="placeSymbol(2, 2)">-</button></td>
    </tr>
</table>

<p>
<button onclick="resetGame()">Réinitialiser</button>
</p>
<table id="score">
    <tr>
        <th>Joueur</th>
        <th>Score</th>
    </tr>
    <tr>
        <td>X</td>
        <td id="scoreX">0</td>
    </tr>
    <tr>
        <td>O</td>
        <td id="scoreO">0</td>
    </tr>
</table>

<script>
    let currentPlayer = 'X';
    let gameBoard = [
        ["-", "-", "-"],
        ["-", "-", "-"],
        ["-", "-", "-"]
    ];
    let scoreX = 0;
    let scoreO = 0;

    function placeSymbol(row, col) {
        if (gameBoard[row][col] === "-") {
            gameBoard[row][col] = currentPlayer;
            document.querySelector(`table tr:nth-child(${row + 1}) td:nth-child(${col + 1}) button`).innerText = currentPlayer;
            if (checkWin()) {
                alert(`${currentPlayer} a gagné !`);
                updateScore();
                resetGame();
            } else if (checkTie()) {
                alert("Match nul !");
                resetGame();
            } else {
                currentPlayer = (currentPlayer === 'X') ? 'O' : 'X';
            }
        }
    }

    function checkWin() {
        // Vérification des lignes, colonnes et diagonales
        for (let i = 0; i < 3; i++) {
            if (
                (gameBoard[i][0] === currentPlayer && gameBoard[i][1] === currentPlayer && gameBoard[i][2] === currentPlayer) ||
                (gameBoard[0][i] === currentPlayer && gameBoard[1][i] === currentPlayer && gameBoard[2][i] === currentPlayer) ||
                (gameBoard[0][0] === currentPlayer && gameBoard[1][1] === currentPlayer && gameBoard[2][2] === currentPlayer) ||
                (gameBoard[0][2] === currentPlayer && gameBoard[1][1] === currentPlayer && gameBoard[2][0] === currentPlayer)
            ) {
                return true;
            }
        }
        return false;
    }

    function checkTie() {
        // Vérification si toutes les cases ont été remplies
        for (let i = 0; i < 3; i++) {
            for (let j = 0; j < 3; j++) {
                if (gameBoard[i][j] === "-") {
                    return false;
                }
            }
        }
        return true;
    }

    function updateScore() {
        if (currentPlayer === 'X') {
            scoreX++;
            document.getElementById('scoreX').innerText = scoreX;
        } else {
            scoreO++;
            document.getElementById('scoreO').innerText = scoreO;
        }
    }

    function resetGame() {
        // Réinitialisation du jeu
        currentPlayer = 'X';
        gameBoard = [
            ["-", "-", "-"],
            ["-", "-", "-"],
            ["-", "-", "-"]
        ];

        // Réinitialisation des boutons dans le tableau
        const buttons = document.querySelectorAll('table button');
        buttons.forEach(button => {
            button.innerText = "-";
        });
    }
</script>

</body>
</html>
