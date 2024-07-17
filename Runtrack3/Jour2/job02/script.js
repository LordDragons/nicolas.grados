function showhide() {
    var articleElement = document.getElementById("dynamic-article");

    if (!articleElement) {
        // Créer un nouvel élément article
        var newArticle = document.createElement("article");
        newArticle.id = "dynamic-article";
        newArticle.textContent = "L'important n'est pas la chute, mais l'atterrissage.";

        // Ajouter l'article au contenu de la page
        document.body.appendChild(newArticle);
    } else {
        // Supprimer l'article existant
        articleElement.parentNode.removeChild(articleElement);
    }
}
