function citation() {
    // Récupérer l'élément avec l'id "citation"
    var citationElement = document.getElementById("citation");

    // Inverser la visibilité de l'élément
    citationElement.style.display = (citationElement.style.display === 'none') ? 'block' : 'none';

    // Si vous voulez afficher le contenu dans la console, décommentez la ligne suivante :
    // console.log(citationElement.innerText);
}

// Associer la fonction à l'événement de clic du bouton
document.getElementById("button").addEventListener("click", citation);
