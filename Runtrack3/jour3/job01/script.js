
document.addEventListener("DOMContentLoaded", function() {
    const afficherTexteButton = document.querySelector('#afficherTexte');
    
    afficherTexteButton.addEventListener('click', function() {
        afficherTexte();
    });
    
    const cacherElementButton = document.querySelector('#cacherElement');

    cacherElementButton.addEventListener('click', function() {
        cacherElement();
    });

    // Fonction pour afficher le texte
    function afficherTexte() {
        const elementACacher = document.querySelector('p');

       console.log (elementACacher);

        if (!elementACacher){

        const texteAffiche = "Les logiciels et les cathédrales, c'est un peu la même chose - d'abord on les construit, ensuite on prie.";
        const paragraphe = document.createElement('p');
        paragraphe.textContent = texteAffiche;

        // Ajoutez le paragraphe à la page
        document.body.appendChild(paragraphe);
        
    }
        else {cacherElement()};
    }

    // Fonction pour cacher l'élément HTML
    function cacherElement() {
        const elementACacher = document.querySelector('p');

        // Vérifiez si l'élément existe avant de le cacher
        
            elementACacher.style.display == 'none' ? elementACacher.style.display = 'block' : elementACacher.style.display = 'none';
        
    }
});

