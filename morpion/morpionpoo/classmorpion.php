<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="morpionpoo.css" rel="stylesheet">

    <title>Morpion</title>
</head>
<body>
    
<h1><span class="title-text">Morpion</span></h1>

    <div class="themes-container">
        <h2>Chois du théme</h2>
        <button class="theme-btn" onclick="changeTheme('crossCircle')">Croix/Rond</button>
        <button class="theme-btn" onclick="changeTheme('swordShield')">Épée/Bouclier</button>
        <button class="theme-btn" onclick="changeTheme('catMouse')">Chat/Souris</button>
        <button class="theme-btn" onclick="changeTheme('dogBone')">Chien/Os</button>
        <button class="theme-btn" onclick="changeTheme('dragon')">Dragon/Feu</button>
        <button class="theme-btn" onclick="changeTheme('wizard')">Magicien/Sort</button>
    </div>

<p class="reset">
    <button onclick="resetGame()">Réinitialiser la partie</button>
    <button onclick="resetScores()">Réinitialiser les scores</button>
</p>
<table id="score">
    <tr>
        <th>Joueur</th>
        <th>Manche</th>
        <th>Partie</th>
    </tr>
    <tr>
        <td>joueur</td>
        <td id="Joueur1Manche">0</td>
        <td id="Joueur1Partie">0</td>

    </tr>
    <tr>
        <td>Ordinateur</td>
        <td id="OrdinateurManche">0</td>
        <td id="OrdinateurPartie">0</td>
    </tr>
</table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="classmorpion.js"></script>
</html>

<?php

class Morpion {
    public $currentPlayer;
    public $gameBoard;
    public $themes;
    public $currentTheme;

    public $Joueur1;
    public $Ordinateur;
    public $mancheJoueur1;
    public $mancheOrdinateur;

    public $table;


    public function __construct() {
        $this->currentPlayer = 'X';
        $this->gameBoard = [
            ["-", "-", "-"],
            ["-", "-", "-"],
            ["-", "-", "-"]
        ];
        $this->themes = json_decode('{
            "crossCircle": {
                "symbols": ["-", "✕", "◯"],
                "classes": ["cross", "circle"],
                "backgroundImage": "url(../images/tapis-de-cartes.jpg)"
            },
            "swordShield": {
                "symbols": ["-", "🗡️", "🛡️"],
                "classes": ["sword", "shield"],
                "backgroundImage": "url(../images/epeesetbouclier.jpg)"
            },
            "catMouse": {
                "symbols": ["-", "🐱", "🐭"],
                "classes": ["cat", "mouse"],
                "backgroundImage": "url(../images/chat-souris-fond-vert.avif)"
            },
            "dogBone": {
                "symbols": ["-", "🐶", "🦴"],
                "classes": ["dog", "bone"],
                "backgroundImage": "url(../images/chien-dessin-anime-os-fond-blanc.jpg)"
            },
            "dragon": {
                "symbols": ["-", "🐉", "🔥"],
                "classes": ["dragon", "fire"],
                "backgroundImage": "url(../images/dragons.avif)"
            },
            "wizard": {
                "symbols": ["-", "🧙", "✨"],
                "classes": ["wizard", "magic"],
                "backgroundImage": "url(../images/magicien.png)"
            }
        }');

        $this->currentTheme = $this->themes->crossCircle;
        $this->Joueur1 = 0;
        $this->Ordinateur = 0;
        $this->mancheJoueur1 = 0;
        $this->mancheOrdinateur = 0;
        //$this->init();
    }

    //init() {
    //    $this->renderBoard();
    //    $this->addEventListeners();
    //}

    public function renderBoard() {
     /*  
      const table = document.createElement('table');
        for (let i = 0; i < 3; i++) {
            const row = document.createElement('tr');
            for (let j = 0; j < 3; j++) {
                const cell = document.createElement('td');
                const button = document.createElement('button');
                button.innerText = $this->gameBoard[i][j];
                cell.appendChild(button);
                row.appendChild(cell);
            }
            table.appendChild(row);
        }
        document.body.appendChild(table);
    }*/

    $boucleFor ="";       
for($i = 0; $i < 3; $i++){
    $boucleFor .="<tr>";
    for($j = 0; $j < 3; $j++){
        $boucleFor .="<td>";
        $boucleFor .="<button>{$this->gameBoard[$i][$j]}</button>";
     $boucleFor .="</td>";
}; 
     $boucleFor .="</tr>";
};

    return "<table>{$boucleFor}</table>";
    }
 /*   
 addEventListeners() {
        const buttons = document.querySelectorAll('table button');
        buttons.forEach((button, index) => {
            button.addEventListener('click', () => {
                const row = Math.floor(index / 3);
                const col = index % 3;
                $this->placeSymbol(row, col);
            });
        });
    }
*/
    public function placeSymbol($row, $col) {
        if ($this->gameBoard[$row][$col] === "-") {
            $this->gameBoard[$row][$col] = $this->currentPlayer;

           /* 
            const button = document.querySelector(`table tr:nth-child(${row + 1}) td:nth-child(${col + 1}) button`);
            button.innerText = $this->currentTheme.symbols[$this->currentPlayer === 'X' ? 1 : 2];
            button.classList.remove(...$this->currentTheme.classes);
            button.classList.add(($this->currentPlayer === 'X') ? $this->currentTheme.classes[0] : $this->currentTheme.classes[1]);
            */


            if ($this->checkWin()) {
             echo "<script>alert(`Player $this->currentPlayer wins!`);</script>";
                $this->updateScore();
                $this->resetGame();
            } else if ($this->checkTie()) {
                echo "<script>alert(`It's a tie!`);</script>";
                $this->resetGame();
            } else {
                $this->currentPlayer = ($this->currentPlayer === 'X') ? 'O' : 'X';
                if ($this->currentPlayer === 'O') {
                    $this->playComputerTurn();
                }
            }
        }
    }

    public function playComputerTurn() {
        /*
        const emptyCells = [];
        for (let i = 0; i < 3; i++) {
            for (let j = 0; j < 3; j++) {
                if ($this->gameBoard[i][j] === "-") {
                    emptyCells.push({ row: i, col: j });
                }
            }
        }

        if (emptyCells.length > 0) {
            const randomIndex = Math.floor(Math.random() * emptyCells.length);
            const computerMove = emptyCells[randomIndex];
            $this->gameBoard[computerMove.row][computerMove.col] = 'O';
            document.querySelector(`table tr:nth-child(${computerMove.row + 1}) td:nth-child(${computerMove.col + 1}) button`).innerText = $this->currentTheme.symbols[2];
*/
            if ($this->checkWin()) {
                echo "<script>alert(`Computer wins!`);</script>";
                $this->updateScore();
                $this->resetGame();
            } else if ($this->checkTie()) {
                echo "<script>alert(`It's a tie!`);</script>";
                $this->resetGame();
            } else {
                $this->currentPlayer = 'X';
            }
        }

    public function checkWin() {
        for ($i = 0; $i < 3; $i++) {
            if (
                ($this->gameBoard[$i][0] === $this->currentPlayer && $this->gameBoard[$i][1] === $this->currentPlayer && $this->gameBoard[$i][2] === $this->currentPlayer) ||
                ($this->gameBoard[0][$i] === $this->currentPlayer && $this->gameBoard[1][$i] === $this->currentPlayer && $this->gameBoard[2][$i] === $this->currentPlayer) ||
                ($this->gameBoard[0][0] === $this->currentPlayer && $this->gameBoard[1][1] === $this->currentPlayer && $this->gameBoard[2][2] === $this->currentPlayer) ||
                ($this->gameBoard[0][2] === $this->currentPlayer && $this->gameBoard[1][1] === $this->currentPlayer && $this->gameBoard[2][0] === $this->currentPlayer)
            ) {
                return true;
            } // end if
        } //Boucle for
        return false;
    }


    public function checkTie() {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($this->gameBoard[$i][$j] === "-") {
                    return false;
                }
            }
        }
        return true;
    }


    public function updateScore() {
        if ($this->currentPlayer === 'X') {
            $this->mancheJoueur1++;

/*
            document.getElementById('Joueur1Manche').innerText = $this->mancheJoueur1;
            if ($this->mancheJoueur1 === 3) {
                $this->Joueur1++;
                document.getElementById('Joueur1Partie').innerText = $this->Joueur1;
                $this->mancheJoueur1 = 0;
            }

        } else {
            $this->mancheOrdinateur++;
            document.getElementById('OrdinateurManche').innerText = $this->mancheOrdinateur;
            if ($this->mancheOrdinateur === 3) {
                $this->Ordinateur++;
                document.getElementById('OrdinateurPartie').innerText = $this->Ordinateur;
                $this->mancheOrdinateur = 0;
            }
            */
        }
    }



    public function resetGame() {
        $this->currentPlayer = 'X';
        $this->gameBoard = [
            ["-", "-", "-"],
            ["-", "-", "-"],
            ["-", "-", "-"]
        ];

        /*
        const buttons = document.querySelectorAll('table button');
        buttons.forEach(button => {
            button.innerText = "-";
            button.classList.remove(...$this->currentTheme.classes);
        });
        */
    }


    public function resetScores() {
        $this->Joueur1 = 0;
        $this->Ordinateur = 0;
        $this->mancheJoueur1 = 0;
        $this->mancheOrdinateur = 0;
    }
        /*
        document.getElementById('Joueur1Manche').innerText = $this->mancheJoueur1;
        document.getElementById('Joueur1Partie').innerText = $this->Joueur1;
        document.getElementById('OrdinateurManche').innerText = $this->mancheOrdinateur;
        document.getElementById('OrdinateurPartie').innerText = $this->Ordinateur;
    }

    changeBackgroundImage(newImage) {
        document.body.style.backgroundImage = newImage;
    }

    changeTheme(theme) {
        const jeuElement = document.querySelector('.jeu');
        Object.keys($this->themes).forEach(existingTheme => {
            jeuElement.classList.remove(existingTheme + '-theme');
        });

        jeuElement.classList.add(theme + '-theme');
        $this->currentTheme = $this->themes[theme];

        const buttons = document.querySelectorAll('table button');
        buttons.forEach((button, index) => {
            button.innerText = $this->currentTheme.symbols[0];
            button.classList.remove(...$this->currentTheme.classes);
            if ($this->currentPlayer === 'X') {
                button.classList.add('cross');
            } else {
                button.classList.add('circle');
            }
            if ($this->currentPlayer === 'X') {
                button.classList.add('sword');
            } else {
                button.classList.add('shield');
            }
            if ($this->currentPlayer === 'X') {
                button.classList.add('cat');
            } else {
                button.classList.add('mouse');
            }
            if ($this->currentPlayer === 'X') {
                button.classList.add('dog');
            } else {
                button.classList.add('bone');
            }
            if ($this->currentPlayer === 'X') {
                button.classList.add('dragon');
            } else {
                button.classList.add('fire');
            }
            if ($this->currentPlayer === 'X') {
                button.classList.add('wizard');
            } else {
                button.classList.add('magic');
            }
        });

        if ($this->currentTheme.backgroundImage) {
            $this->changeBackgroundImage($this->currentTheme.backgroundImage);
        } else {
            document.body.style.backgroundImage = 'none';
        }
    }
*/

}
// Example usage:
$morpion = new Morpion();
echo $morpion->renderBoard();
