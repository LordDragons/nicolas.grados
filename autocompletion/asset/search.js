function search() {
    var searchTerm = document.getElementById('searchInput').value;
    var searchResultsList = document.getElementById('searchResults');

    // Effacer les résultats précédents
    searchResultsList.innerHTML = '';

    // Effectuer une requête AJAX pour obtenir les résultats de la recherche depuis le serveur
    if (searchTerm.trim() !== '') {
        // Utilisez l'objet XMLHttpRequest pour effectuer la requête
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // La requête a réussi, traiter les résultats
                var results = JSON.parse(xhr.responseText);
                displayResults(results);
            }
        };

        // Remplacez "recherche.php" par le chemin correct vers votre script PHP de recherche
        xhr.open('GET', 'scripts/recherche.php?search=' + encodeURIComponent(searchTerm), true);
        xhr.send();
    }
}

// Fonction pour afficher les résultats
function displayResults(results) {
    var searchResultsList = document.getElementById('searchResults');

    results.forEach(function (result) {
        var listItem = document.createElement('li');
        listItem.textContent = result.nom;
        searchResultsList.appendChild(listItem);
    });

    // Ajouter une séparation entre les résultats exacts et partiels
    if (results.exact.length > 0 && results.partial.length > 0) {
        var separator = document.createElement('li');
        separator.textContent = '-------------';
        searchResultsList.appendChild(separator);
    }

    // Afficher les résultats partiels
    results.partial.forEach(function (result) {
        var listItem = document.createElement('li');
        listItem.textContent = result.nom; // Accéder à la propriété 'nom'
        searchResultsList.appendChild(listItem);
    });
}
