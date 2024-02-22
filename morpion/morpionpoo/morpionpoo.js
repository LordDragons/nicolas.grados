class Morpion {
    
    constructor() {
        this.currentPlayer = 'X';
        this.gameBoard = [
            ["-", "-", "-"],
            ["-", "-", "-"],
            ["-", "-", "-"]
        ];
        this.themes = {
            crossCircle: {
                symbols: ['-', '✕', '◯'],
                classes: ['cross', 'circle'],
                backgroundImage: 'url(../images/tapis-de-cartes.jpg)'
            },
            swordShield: {
                symbols: ['-', '🗡️', '🛡️'],
                classes: ['sword', 'shield'],
                backgroundImage: 'url(../images/epeesetbouclier.jpg)'
            },
            catMouse: {
                symbols: ['-', '🐱', '🐭'],
                classes: ['cat', 'mouse'],
                backgroundImage: 'url(../images/chat-souris-fond-vert.avif)'
            },
            dogBone: {
                symbols: ['-', '🐶', '🦴'],
                classes: ['dog', 'bone'],
                backgroundImage: 'url(../images/chien-dessin-anime-os-fond-blanc.jpg)'
            },
            dragon: {
                symbols: ['-', '🐉', '🔥'],
                classes: ['dragon', 'fire'],
                backgroundImage: 'url(../images/dragons.avif)'
            },
            wizard: {
                symbols: ['-', '🧙', '✨'],
                classes: ['wizard', 'magic'],
                backgroundImage: 'url(../images/magicien.png)'
            }
        };
        this.currentTheme = this.themes.crossCircle;
        this.Joueur1 = 0;
        this.Ordinateur = 0;
        this.mancheJoueur1 = 0;
        this.mancheOrdinateur = 0;
        this.init();
    }

    init() {
        this.renderBoard();
        this.addEventListeners();
    }

    renderBoard() {
        const table = document.createElement('table');
        for (let i = 0; i < 3; i++) {
            const row = document.createElement('tr');
            for (let j = 0; j < 3; j++) {
                const cell = document.createElement('td');
                const button = document.createElement('button');
                button.innerText = this.gameBoard[i][j];
                cell.appendChild(button);
                row.appendChild(cell);
            }
            table.appendChild(row);
        }
        document.body.appendChild(table);
    }

    addEventListeners() {
        const buttons = document.querySelectorAll('table button');
        buttons.forEach((button, index) => {
            button.addEventListener('click', () => {
                const row = Math.floor(index / 3);
                const col = index % 3;
                this.placeSymbol(row, col);
            });
        });
    }

    placeSymbol(row, col) {
        if (this.gameBoard[row][col] === "-") {
            this.gameBoard[row][col] = this.currentPlayer;
            const button = document.querySelector(`table tr:nth-child(${row + 1}) td:nth-child(${col + 1}) button`);
            button.innerText = this.currentTheme.symbols[this.currentPlayer === 'X' ? 1 : 2];
            button.classList.remove(...this.currentTheme.classes);
            button.classList.add((this.currentPlayer === 'X') ? this.currentTheme.classes[0] : this.currentTheme.classes[1]);

            if (this.checkWin()) {
                alert(`Player ${this.currentPlayer} wins!`);
                this.updateScore();
                this.resetGame();
            } else if (this.checkTie()) {
                alert("It's a tie!");
                this.resetGame();
            } else {
                this.currentPlayer = (this.currentPlayer === 'X') ? 'O' : 'X';
                if (this.currentPlayer === 'O') {
                    this.playComputerTurn();
                }
            }
        }
    }

    playComputerTurn() {
        const emptyCells = [];
        for (let i = 0; i < 3; i++) {
            for (let j = 0; j < 3; j++) {
                if (this.gameBoard[i][j] === "-") {
                    emptyCells.push({ row: i, col: j });
                }
            }
        }

        if (emptyCells.length > 0) {
            const randomIndex = Math.floor(Math.random() * emptyCells.length);
            const computerMove = emptyCells[randomIndex];
            this.gameBoard[computerMove.row][computerMove.col] = 'O';
            document.querySelector(`table tr:nth-child(${computerMove.row + 1}) td:nth-child(${computerMove.col + 1}) button`).innerText = this.currentTheme.symbols[2];

            if (this.checkWin()) {
                alert(`Computer wins!`);
                this.updateScore();
                this.resetGame();
            } else if (this.checkTie()) {
                alert("It's a tie!");
                this.resetGame();
            } else {
                this.currentPlayer = 'X';
            }
        }
    }

    checkWin() {
        for (let i = 0; i < 3; i++) {
            if (
                (this.gameBoard[i][0] === this.currentPlayer && this.gameBoard[i][1] === this.currentPlayer && this.gameBoard[i][2] === this.currentPlayer) ||
                (this.gameBoard[0][i] === this.currentPlayer && this.gameBoard[1][i] === this.currentPlayer && this.gameBoard[2][i] === this.currentPlayer) ||
                (this.gameBoard[0][0] === this.currentPlayer && this.gameBoard[1][1] === this.currentPlayer && this.gameBoard[2][2] === this.currentPlayer) ||
                (this.gameBoard[0][2] === this.currentPlayer && this.gameBoard[1][1] === this.currentPlayer && this.gameBoard[2][0] === this.currentPlayer)
            ) {
                return true;
            }
        }
        return false;
    }

    checkTie() {
        for (let i = 0; i < 3; i++) {
            for (let j = 0; j < 3; j++) {
                if (this.gameBoard[i][j] === "-") {
                    return false;
                }
            }
        }
        return true;
    }

    updateScore() {
        if (this.currentPlayer === 'X') {
            this.mancheJoueur1++;
            document.getElementById('Joueur1Manche').innerText = this.mancheJoueur1;

            if (this.mancheJoueur1 === 3) {
                this.Joueur1++;
                document.getElementById('Joueur1Partie').innerText = this.Joueur1;
                this.mancheJoueur1 = 0;
            }
        } else {
            this.mancheOrdinateur++;
            document.getElementById('OrdinateurManche').innerText = this.mancheOrdinateur;

            if (this.mancheOrdinateur === 3) {
                this.Ordinateur++;
                document.getElementById('OrdinateurPartie').innerText = this.Ordinateur;
                this.mancheOrdinateur = 0;
            }
        }
    }

    resetGame() {
        this.currentPlayer = 'X';
        this.gameBoard = [
            ["-", "-", "-"],
            ["-", "-", "-"],
            ["-", "-", "-"]
        ];

        const buttons = document.querySelectorAll('table button');
        buttons.forEach(button => {
            button.innerText = "-";
            button.classList.remove(...this.currentTheme.classes);
        });
    }

    resetScores() {
        this.Joueur1 = 0;
        this.Ordinateur = 0;
        this.mancheJoueur1 = 0;
        this.mancheOrdinateur = 0;

        document.getElementById('Joueur1Manche').innerText = this.mancheJoueur1;
        document.getElementById('Joueur1Partie').innerText = this.Joueur1;
        document.getElementById('OrdinateurManche').innerText = this.mancheOrdinateur;
        document.getElementById('OrdinateurPartie').innerText = this.Ordinateur;
    }

    changeBackgroundImage(newImage) {
        document.body.style.backgroundImage = newImage;
    }

    changeTheme(theme) {
        const jeuElement = document.querySelector('.jeu');
        Object.keys(this.themes).forEach(existingTheme => {
            jeuElement.classList.remove(existingTheme + '-theme');
        });

        jeuElement.classList.add(theme + '-theme');
        this.currentTheme = this.themes[theme];

        const buttons = document.querySelectorAll('table button');
        buttons.forEach((button, index) => {
            button.innerText = this.currentTheme.symbols[0];
            button.classList.remove(...this.currentTheme.classes);
            if (this.currentPlayer === 'X') {
                button.classList.add('cross');
            } else {
                button.classList.add('circle');
            }
            if (this.currentPlayer === 'X') {
                button.classList.add('sword');
            } else {
                button.classList.add('shield');
            }
            if (this.currentPlayer === 'X') {
                button.classList.add('cat');
            } else {
                button.classList.add('mouse');
            }
            if (this.currentPlayer === 'X') {
                button.classList.add('dog');
            } else {
                button.classList.add('bone');
            }
            if (this.currentPlayer === 'X') {
                button.classList.add('dragon');
            } else {
                button.classList.add('fire');
            }
            if (this.currentPlayer === 'X') {
                button.classList.add('wizard');
            } else {
                button.classList.add('magic');
            }
        });

        if (this.currentTheme.backgroundImage) {
            this.changeBackgroundImage(this.currentTheme.backgroundImage);
        } else {
            document.body.style.backgroundImage = 'none';
        }
    }
}

// Example usage:
const morpion = new Morpion();
