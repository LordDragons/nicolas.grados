document.addEventListener('DOMContentLoaded', init);

let puzzle = [];
let emptyIndex;
let moves = 0;

function init() {
  createPuzzle();
  renderPuzzle();
}

function createPuzzle() {
  puzzle = [];
  emptyIndex = 8;
  moves = 0;

  for (let i = 0; i < 8; i++) {
    puzzle.push(i + 1);
  }

  puzzle = shuffleArray(puzzle);
}

function renderPuzzle() {
  const puzzleContainer = document.getElementById('puzzle-container');
  puzzleContainer.innerHTML = '';

  for (let i = 0; i < 9; i++) {
    const piece = document.createElement('div');
    piece.classList.add('puzzle-piece');
    piece.style.backgroundImage = "url('https://source.unsplash.com/300x300/?computer')";
    
    if (puzzle[i] !== 9) {
      piece.addEventListener('click', () => movePiece(i));
    }

    puzzleContainer.appendChild(piece);
  }
}

function movePiece(index) {
  if (isMoveValid(index)) {
    swapPieces(index, emptyIndex);
    moves++;
    renderPuzzle();

    if (isPuzzleSolved()) {
      displayMessage('Vous avez gagné!');
    }
  }
}

function isMoveValid(index) {
  const row = Math.floor(index / 3);
  const col = index % 3;

  const emptyRow = Math.floor(emptyIndex / 3);
  const emptyCol = emptyIndex % 3;

  return (
    (Math.abs(row - emptyRow) === 1 && col === emptyCol) ||
    (Math.abs(col - emptyCol) === 1 && row === emptyRow)
  );
}

function swapPieces(index1, index2) {
  const temp = puzzle[index1];
  puzzle[index1] = puzzle[index2];
  puzzle[index2] = temp;

  emptyIndex = index1;
}

function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }

  return array;
}

function isPuzzleSolved() {
  for (let i = 0; i < 8; i++) {
    if (puzzle[i] !== i + 1) {
      return false;
    }
  }

  return true;
}

function displayMessage(message) {
  const puzzleContainer = document.getElementById('puzzle-container');
  const messageElement = document.createElement('div');
  messageElement.id = 'message';
  messageElement.textContent = message;
  puzzleContainer.appendChild(messageElement);

  const restartButton = document.querySelector('button');
  restartButton.disabled = true;
}

function shufflePuzzle() {
  const messageElement = document.getElementById('message');
  if (messageElement) {
    messageElement.remove();
  }

  createPuzzle();
  renderPuzzle();

  const restartButton = document.querySelector('button');
  restartButton.disabled = false;
}
