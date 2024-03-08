function updateClock() {
    // Obtenir la date actuelle pour Paris
    const parisTime = new Date().toLocaleString("fr-FR", { timeZone: "Europe/Paris" });

    // Mettre à jour l'élément avec l'ID "clockDisplay" avec l'heure de Paris
    document.getElementById("clockDisplay").textContent = parisTime.split(' ')[1];
}

// Mettre à jour l'horloge toutes les secondes
setInterval(updateClock, 1000);

// Appeler la fonction une fois au chargement de la page pour afficher l'heure initiale
updateClock();