document.addEventListener("DOMContentLoaded", function () {
    const board = document.getElementById("board");
    const message = document.getElementById("message");
    const restartButton = document.getElementById("restartButton");

    let tiles = [];
    let emptyIndex;

    function initializeBoard() {
        tiles = Array.from({ length: 8 }, (_, index) => index + 1);
        emptyIndex = 8;
        shuffleTiles();
        renderBoard();
        message.textContent = "";
    }

    function shuffleTiles() {
        for (let i = tiles.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [tiles[i], tiles[j]] = [tiles[j], tiles[i]];
        }
    }

    function renderBoard() {
        board.innerHTML = "";
        tiles.forEach((tile, index) => {
            const tileElement = document.createElement("div");
            tileElement.classList.add("tile");
            tileElement.textContent = tile;
            tileElement.addEventListener("click", () => handleTileClick(index));
            board.appendChild(tileElement);
        });
    }

    function handleTileClick(index) {
        if (isMoveValid(index)) {
            swapTiles(index, emptyIndex);
            renderBoard();
            if (isPuzzleSolved()) {
                message.textContent = "Vous avez gagné!";
                message.style.color = "green";
            }
        }
    }

    function isMoveValid(index) {
        const rowDiff = Math.floor(Math.abs(index / 3) - Math.abs(emptyIndex / 3));
        const colDiff = Math.floor(index % 3 - emptyIndex % 3);
        return (rowDiff === 0 && Math.abs(colDiff) === 1) || (colDiff === 0 && Math.abs(rowDiff) === 1);
    }

    function swapTiles(index1, index2) {
        [tiles[index1], tiles[index2]] = [tiles[index2], tiles[index1]];
        emptyIndex = index1;
    }

    function isPuzzleSolved() {
        return tiles.every((tile, index) => tile === index + 1);
    }

    restartButton.addEventListener("click", initializeBoard);

    initializeBoard();
});
