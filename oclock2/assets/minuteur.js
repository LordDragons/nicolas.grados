let timer;
let timeRemaining;
let isRunningTime = false;

function startStopTimer() {
    const timerInput = document.getElementById('timerInput');
    const startStopBtn = document.getElementById('startStopBtn');

    if (isRunningTime) {
        clearInterval(timer);
        startStopBtn.textContent = 'Démarrer';
        isRunningTime = false;
    } else {
        timeRemaining = parseInt(timerInput.value);
        if (timeRemaining <= 0 || isNaN(timeRemaining)) {
            alert('Veuillez entrer un temps valide supérieur à zéro.');
            return;
        }

        timer = setInterval(updateTimer, 1000);
        startStopBtn.textContent = 'Arrêter';
        isRunningTime = true;
    }
}

function updateTimer() {
    const timerInput = document.getElementById('timerInput');
    timeRemaining--;

    if (timeRemaining <= 0) {
        clearInterval(timer);
        alert('Temps écoulé !');
        document.getElementById('startStopBtn').textContent = 'Démarrer';
        isRunningTime = false;
    }

    timerInput.value = timeRemaining;
}

document.getElementById('startStopBtn').addEventListener('click', startStopTimer);
