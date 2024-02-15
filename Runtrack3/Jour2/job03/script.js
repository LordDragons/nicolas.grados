// Initialiser le compteur
var compteur = 0;

// Fonction pour incrémenter le compteur et mettre à jour le contenu du paragraphe
function addone() {
    compteur++;
    document.getElementById("compteur").textContent = compteur;
}

// Associer la fonction à l'événement de clic du bouton
document.getElementById("button").addEventListener("click", addone);
