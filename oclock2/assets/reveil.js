let audioElement;

function setAlarm() {
    // Récupérer les valeurs des champs
    const alarmTime = document.getElementById("alarmTime").value;
    const alarmMessage = document.getElementById("alarmMessage").value;

    // Créer un élément de liste pour afficher l'alarme
    const listItem = document.createElement("li");
    listItem.textContent = `${alarmTime} - ${alarmMessage}`;

    // Créer un élément pour afficher le décompte
    const countdownElement = document.createElement("span");
    listItem.appendChild(countdownElement);

    // Créer un élément audio pour le son de l'alarme
    audioElement = new Audio('assets/HORNTrad_Trompe ou corne 5 (ID 2524)_LS.wav');
    listItem.appendChild(audioElement);

    // Ajouter l'élément de liste à la liste d'alarmes
    document.getElementById("alarmList").appendChild(listItem);

    // Définir une fonction de rappel pour déclencher l'alarme
    scheduleAlarm(alarmTime, alarmMessage, countdownElement);
}

function scheduleAlarm(time, message, countdownElement) {
    // Obtenir la date actuelle et extraire l'heure et les minutes
    const currentDate = new Date();
    const currentHours = currentDate.getHours();
    const currentMinutes = currentDate.getMinutes();

    // Diviser l'heure de l'alarme en heures et minutes
    const [alarmHours, alarmMinutes] = time.split(':').map(Number);

    // Calculer le temps jusqu'à l'alarme en millisecondes
    let timeUntilAlarm = new Date();
    timeUntilAlarm.setHours(alarmHours, alarmMinutes, 0, 0);
    timeUntilAlarm = timeUntilAlarm.getTime() - currentDate.getTime();

    // Si l'alarme est prévue pour le lendemain, ajouter 24 heures
    if (timeUntilAlarm <= 0) {
        timeUntilAlarm += 24 * 60 * 60 * 1000;
    }

    // Mettre à jour le décompte à intervalles réguliers
    const intervalId = setInterval(() => {
        const timeRemaining = timeUntilAlarm - (new Date().getTime() - currentDate.getTime());
        updateCountdown(countdownElement, timeRemaining);

        if (timeRemaining <= 0) {
            clearInterval(intervalId); 
            showAlert(message);
        }
    }, 1000); 
}

function updateCountdown(countdownElement, timeRemaining) {
    const hours = Math.floor(timeRemaining / (1000 * 60 * 60));
    const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

    countdownElement.textContent = `Temps restant : ${hours}h ${minutes}m ${seconds}s`;
}

function showAlert(message) {
    // Afficher une alerte avec le message pré-rempli
    const alertMessage = `Alarme: ${message}`;
    alert(alertMessage);
    audioElement.play();

    // Ajouter un bouton "Fermer"
    const closeBtn = document.createElement("button");
    closeBtn.textContent = "Fermer l'alerte";
    closeBtn.addEventListener("click", () => {
        audioElement.pause(); 
        audioElement.currentTime = 0; 
        document.body.removeChild(alertDiv);
    });

    // Créer un élément div pour contenir l'alerte et le bouton de fermeture
    const alertDiv = document.createElement("div");
    alertDiv.appendChild(document.createTextNode(alertMessage));
    alertDiv.appendChild(closeBtn);

    // Ajouter l'élément div à body
    document.body.appendChild(alertDiv);
}
