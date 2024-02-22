let currentPlayer = 'X';

   
        let gameBoard = [
            ["-", "-", "-"],
            ["-", "-", "-"],
            ["-", "-", "-"]
        ];

//******************Liste de thémes et des symboles associés

const themes = {
    crossCircle: {
        symbols: ['-', '✕', '◯'],
        classes: ['cross', 'circle'],
        backgroundImage: 'url(images/tapis-de-cartes.jpg)'
    },
    swordShield: {
        symbols: ['-', '🗡️', '🛡️'],
        classes: ['sword', 'shield'],
        backgroundImage: 'url(images/epeesetbouclier.jpg)'
    },
    catMouse: {
        symbols: ['-', '🐱', '🐭'],
        classes: ['cat', 'mouse'],
        backgroundImage: 'url(images/chat-souris-fond-vert.avif)'
    },
    dogBone: {
        symbols: ['-', '🐶', '🦴'],
        classes: ['dog', 'bone'],
        backgroundImage: 'url(images/chien-dessin-anime-os-fond-blanc.jpg)'
    },
    dragon: {
        symbols: ['-', '🐉', '🔥'],
        classes: ['dragon', 'fire'],
        backgroundImage: 'url(images/dragons.avif)'
    },
    wizard: {
        symbols: ['-', '🧙', '✨'],
        classes: ['wizard', 'magic'],
        backgroundImage: 'url(images/magicien.png)'
    }
};

let currentTheme = themes.crossCircle; // Thème par défaut


//************************Calcul du score selon le placement des symboles

function placeSymbol(row, col) {
    if (gameBoard[row][col] === "-") {
        gameBoard[row][col] = currentPlayer;
        //Pour le changement de symbole
        let button = document.querySelector(`table tr:nth-child(${row + 1}) td:nth-child(${col + 1}) button`);
        button.innerText = currentTheme.symbols[currentPlayer === 'X' ? 1 : 2];
        button.classList.remove(...currentTheme.classes);
        button.classList.add((currentPlayer === 'X') ? currentTheme.classes[0] : currentTheme.classes[1]);


        if (checkWin()) {
            alert(`Vous avez Gagné $$$$`);
            updateScore();
            resetGame();
        } else if (checkTie()) {
            alert("Match nul !");
            resetGame();
        } else {
            currentPlayer = (currentPlayer === 'X') ? 'O' : 'X';
            if (currentPlayer === 'O') {
            playComputerTurn();
        }
    }
    }
}

function playComputerTurn() {
    // Logique de jeu pour l'ordinateur
    // Cette implémentation choisit une case vide au hasard
    let emptyCells = [];
    for (let i = 0; i < 3; i++) {
        for (let j = 0; j < 3; j++) {
            if (gameBoard[i][j] === "-") {
                emptyCells.push({ row: i, col: j });
            }
        }
    }

    if (emptyCells.length > 0) {
        let randomIndex = Math.floor(Math.random() * emptyCells.length);
        let computerMove = emptyCells[randomIndex];
        gameBoard[computerMove.row][computerMove.col] = 'O';
        //Pour le changement de symbole 
        document.querySelector(`table tr:nth-child(${computerMove.row + 1}) td:nth-child(${computerMove.col + 1}) button`).innerText = currentTheme.symbols[2];

        if (checkWin()) {
            alert(`L'ordinateur a Gagné !!!!`);
            updateScore();
            resetGame();
        } else if (checkTie()) {
            alert("Match nul !");
            resetGame();
        } else {
            currentPlayer = 'X'; // Tour du joueur
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

//*************************Pour le comptage des points

let Joueur1 = 0;
let Ordinateur = 0;
let mancheJoueur1 = 0;
let mancheOrdinateur = 0;

function updateScore() {
    if (currentPlayer === 'X') {
        mancheJoueur1++;
        document.getElementById('Joueur1Manche').innerText = mancheJoueur1;

        if (mancheJoueur1 === 3) {
            Joueur1++;
            document.getElementById('Joueur1Partie').innerText = Joueur1;
            mancheJoueur1 = 0;
        }
    } else {
        mancheOrdinateur++;
        document.getElementById('OrdinateurManche').innerText = mancheOrdinateur;

        if (mancheOrdinateur === 3) {
            Ordinateur++;
            document.getElementById('OrdinateurPartie').innerText = Ordinateur;
            mancheOrdinateur = 0;
        }
    }
}

//*****************Bouton Réinitialisation



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
        button.classList.remove(...currentTheme.classes);
    });
}

//***************Mettre le score à zéro
function resetScores() {
    Joueur1 = 0;
    Ordinateur = 0;
    mancheJoueur1 = 0;
    mancheOrdinateur = 0;

    document.getElementById('Joueur1Manche').innerText = mancheJoueur1;
    document.getElementById('Joueur1Partie').innerText = Joueur1;
    document.getElementById('OrdinateurManche').innerText = mancheOrdinateur;
    document.getElementById('OrdinateurPartie').innerText = Ordinateur;

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
            button.classList.remove(...currentTheme.classes);
        });
}


//****************************Pour choisir le théme

function changeBackgroundImage(newImage) {
    document.body.style.backgroundImage = newImage;
}

function changeTheme(theme) {
    // Supprimer la classe de thème précédente
    const jeuElement = document.querySelector('.jeu');
    Object.keys(themes).forEach(existingTheme => {
        jeuElement.classList.remove(existingTheme + '-theme');
    });

    // Appliquer la nouvelle classe de thème
    jeuElement.classList.add(theme + '-theme');
    currentTheme = themes[theme];

    // Mettre à jour les boutons du tableau
    const buttons = document.querySelectorAll('table button');
    buttons.forEach((button, index) => {
        button.innerText = currentTheme.symbols[0];
        button.classList.remove(...currentTheme.classes);
        if (currentPlayer === 'X') {
            button.classList.add(currentTheme.classes[0]);
        } else {
            button.classList.add(currentTheme.classes[1]);
        }
    });

    // Mettre à jour le fond de la page
    if (currentTheme.backgroundImage) {
        changeBackgroundImage(currentTheme.backgroundImage);
    } else {
        document.body.style.backgroundImage = 'none'; // Si le thème ne spécifie pas d'image de fond
    }
    ""
}
