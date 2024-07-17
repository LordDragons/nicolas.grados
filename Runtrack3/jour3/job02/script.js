document.addEventListener("DOMContentLoaded", function() {
    const melangerButton = document.getElementById('melangerImages');
    const conteneurImages = document.getElementById('conteneurImages');
    const message = document.getElementById('message');

    // Ajoute un gestionnaire d'événements pour le bouton "Mélanger les images"
    melangerButton.addEventListener('click', melangerImages);

    // Ajoute des gestionnaires d'événements pour les images
    const images = document.querySelectorAll('.image');
    images.forEach(image => {
        image.addEventListener('dragstart', dragstart);
        image.addEventListener('dragover', dragover);
        image.addEventListener('drop', drop);
    });

    // Fonction pour mélanger les images
    function melangerImages() {
        const imagesArray = Array.from(images);
        imagesArray.sort(() => Math.random() - 0.5);

        // Remplace les images dans le conteneur
        imagesArray.forEach(image => {
            conteneurImages.appendChild(image);
        });

        // Réinitialise le message
        message.textContent = '';
        message.className = 'message';
    }

    // Fonctions pour le glisser-déposer des images
    let imageEnCoursDeDeplacement = null;

    function dragstart(e) {
        imageEnCoursDeDeplacement = e.target;
    }

    function dragover(e) {
        e.preventDefault();
    }

    function drop(e) {
        e.preventDefault();

        // Échange les positions des images
        const dropTarget = e.target;
        const conteneur = dropTarget.parentElement;

        if (conteneur === conteneurImages && dropTarget.tagName === 'IMG') {
            conteneur.insertBefore(imageEnCoursDeDeplacement, dropTarget.nextSibling);
            verifierOrdreImages();
        }
    }

    // Fonction pour vérifier si les images sont dans le bon ordre
    function verifierOrdreImages() {
        const imagesOrdre = Array.from(conteneurImages.children).map(image => image.alt);

        const ordreCorrect = imagesOrdre.every((image, index) => image === `Image ${index + 1}`);

        if (ordreCorrect) {
            message.textContent = 'Vous avez gagné';
            message.classList.add('gagne');
        } else {
            message.textContent = 'Vous avez perdu';
            message.classList.add('perdu');
        }
    }
});
