// Fonction pour détecter les frappes clavier et mettre à jour le contenu du textarea
function keyLogger(event) {
    var keyloggerTextarea = document.getElementById("keylogger");

    // Vérifier si le curseur est dans le textarea
    if (document.activeElement === keyloggerTextarea) {
        keyloggerTextarea.value += event.key + event.key; // Ajouter la lettre deux fois
    } else {
        keyloggerTextarea.value += event.key; // Ajouter la lettre une fois
    }
}

// Associer la fonction à l'événement de frappe clavier
document.addEventListener("keydown", keyLogger);
