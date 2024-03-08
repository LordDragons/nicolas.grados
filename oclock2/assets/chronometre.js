let isRunning = false;
let startTime;
let intervalId;
let lapTimes = [];

function startStop() {
    if (isRunning) {
        stopStopwatch();
    } else {
        startStopwatch();
    }
}

function startStopwatch() {
    isRunning = true;
    startTime = new Date().getTime() - (document.getElementById("stopwatchDisplay").textContent.replace(/\s/g, '').split(':').reduce((acc, time) => (acc * 60) + parseInt(time), 0) * 1000);
    intervalId = setInterval(updateStopwatch, 1000);
    document.getElementById("startStopStopwatch").textContent = "Démarrer";
}

function stopStopwatch() {
    isRunning = false;
    clearInterval(intervalId);
    document.getElementById("startStopStopwatch").textContent = "Arrêter";
}

function updateStopwatch() {
    const currentTime = new Date().getTime();
    const elapsedTime = new Date(currentTime - startTime);
    const hours = elapsedTime.getUTCHours();
    const minutes = elapsedTime.getUTCMinutes();
    const seconds = elapsedTime.getUTCSeconds();

    document.getElementById("stopwatchDisplay").textContent =
        `${hours.toString().padStart(2, '0')} : ${minutes.toString().padStart(2, '0')} : ${seconds.toString().padStart(2, '0')}`;
}

function recordTime() {
    if (isRunning) {
        const currentTime = new Date().getTime();
        const lapTime = new Date(currentTime - startTime);
        const formattedTime = lapTime.toISOString().substr(11, 8); // Format HH:mm:ss

        lapTimes.push(formattedTime);

        // Mise à jour de l'affichage des temps enregistrés (facultatif)
        displayLapTimes();
    }
}

function displayLapTimes() {
    const lapTimesContainer = document.getElementById("lapTimesContainer");

    // Supprimer tous les éléments enfants du conteneur
    while (lapTimesContainer.firstChild) {
        lapTimesContainer.removeChild(lapTimesContainer.firstChild);
    }

    // Ajouter chaque temps enregistré au conteneur
    lapTimes.forEach((lap, index) => {
        const lapElement = document.createElement("div");
        lapElement.textContent = `Tour ${index + 1}: ${lap}`;
        lapTimesContainer.appendChild(lapElement);
    });
}

function resetStopwatch() {
    stopStopwatch();
    startTime = 0;
    document.getElementById("stopwatchDisplay").textContent = "00:00:00";
}

// Attach event listeners to buttons
document.getElementById("startStopStopwatch").addEventListener("click", startStop);
document.getElementById("recordTime").addEventListener("click", recordTime);
document.getElementById("resetStopwatch").addEventListener("click", resetStopwatch);
