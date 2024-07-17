// Fonction pour mettre à jour la couleur du footer en fonction du pourcentage de scrolling
function updateFooterColor() {
    var footer = document.getElementById("footer");
    var scrollPercentage = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
    
    // Mettez à jour la couleur du footer en fonction du pourcentage de scrolling
    footer.style.backgroundColor = `hsl(${scrollPercentage}, 50%, 50%)`;
}

// Associer la fonction à l'événement de défilement
document.addEventListener("scroll", updateFooterColor);

// Ajouter une classe "hidden" pour masquer le footer au début
document.addEventListener("DOMContentLoaded", function() {
    var footer = document.getElementById("footer");
    footer.classList.add("hidden");

    // Retirez la classe "hidden" après un court délai pour afficher le footer
    setTimeout(function() {
        footer.classList.remove("hidden");
    }, 500);
});
