function logout() {
    document.cookie = "id_user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    window.location.href = 'index.php';
}

document.getElementById('search-button').addEventListener('click', function() {
        var searchTerm = document.getElementById('search-input').value;
        // Effectuer une action en fonction de la recherche (redirection, affichage de résultats, etc.)
        alert('Recherche pour : ' + searchTerm);
    });

    function showMore(containerId, buttonId) {
        var container = document.getElementById(containerId);
        var button = document.getElementById(buttonId);

        // Si le conteneur est actuellement caché, affichez-le et changez le texte du bouton
        if (container.style.maxHeight === '600px') {
            container.style.maxHeight = '100%';
            button.innerText = 'Afficher moins';
        } else {
            // Sinon, réinitialisez la hauteur maximale et changez le texte du bouton
            container.style.maxHeight = '600px';
            button.innerText = 'Afficher plus';
        }
    }
    document.addEventListener("DOMContentLoaded", function() {
        
        $(document).ready(function() {
            // Gestionnaire d'événements pour les boutons "+"
            $(".addToFavorites").click(function() {
                var title = $(this).data('title');
                var poster = $(this).data('poster');
                
                // Envoi des données au serveur via AJAX
                $.ajax({
                    type: "POST",
                    url: "favoris.php", 
                    data: {
                        title: title,
                        poster: poster
                    },
                    success: function(response) {
                        alert(response); 
                    }
                });
            });
        });
    });
        
        // JavaScript function to handle adding to favorites
        $('.addToFavorites').click(function() {
            var title = $(this).data('title');
            var poster = $(this).data('poster');
            $('#title').val(title);
            $('#poster').val(poster);
            $('form').submit();
        });

function getSuggestions() {
    var searchInput = document.getElementById("search-input").value;
    var suggestionsList = document.getElementById("suggestions-list");

    // Effacer la liste des suggestions
    suggestionsList.innerHTML = "";

    // Vérifier si le champ de recherche est vide
    if (searchInput.trim() === "") {
        return;
    }

    // Appel à une API pour obtenir des suggestions de titres basées sur la recherche
    // Remplacez l'URL par l'URL de votre API
    var apiUrl = "https://api.themoviedb.org/3/suggestions?q=" + encodeURIComponent(searchInput);

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            data.forEach(suggestion => {
                // Créer un élément de liste pour chaque suggestion
                var listItem = document.createElement("li");
                listItem.textContent = suggestion.title;

                // Ajouter un événement de clic pour remplir le champ de recherche avec la suggestion sélectionnée
                listItem.addEventListener("click", function() {
                    document.getElementById("search-input").value = suggestion.title;
                    suggestionsList.innerHTML = ""; // Effacer la liste des suggestions après avoir sélectionné une suggestion
                });

                suggestionsList.appendChild(listItem); // Ajouter la suggestion à la liste
            });
        })
        .catch(error => {
            console.error("Une erreur s'est produite lors de la récupération des suggestions:", error);
        });
}

function searchMoviesAndSeries() {
    var searchInput = document.getElementById("search-input").value;

    // Vérifier si le champ de recherche est vide
    if (searchInput.trim() === "") {
        return;
    }

    // Clé d'API pour l'accès à l'API de TMDb
    $api_key = "0933e801b72985dce80748e928bbf524";

    // URL de l'API de recherche de films
    var apiUrl = "https://api.themoviedb.org/3/search/multi?api_key=" + apiKey + "&query=" + encodeURIComponent(searchInput);

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            // Affichage des résultats de la recherche
            displaySearchResults(data);
        })
        .catch(error => {
            console.error("Une erreur s'est produite lors de la recherche de films et de séries:", error);
        });
}

function displaySearchResults(data) {
    var searchResultsContainer = document.getElementById("search-results");

    // Effacer les résultats précédents
    searchResultsContainer.innerHTML = "";

    // Vérifier s'il y a des résultats de recherche
    if (data.results && data.results.length > 0) {
        // Parcourir les résultats de la recherche
        data.results.forEach(result => {
            var title = result.title || result.name; // Utiliser le titre ou le nom en fonction du type (film ou série)
            var overview = result.overview || "Aucun résumé disponible";
            var posterPath = result.poster_path ? "https://image.tmdb.org/t/p/w300" + result.poster_path : "placeholder.jpg";

            // Créer un élément HTML pour afficher le résultat
            var resultItem = document.createElement("div");
            resultItem.classList.add("result-item");
            resultItem.innerHTML = `
                <img src="${posterPath}" alt="${title}" class="result-poster">
                <div class="result-details">
                    <h3 class="result-title">${title}</h3>
                    <p class="result-overview">${overview}</p>
                </div>
            `;

            searchResultsContainer.appendChild(resultItem); // Ajouter le résultat à la liste des résultats
        });
    } else {
        // Afficher un message si aucun résultat n'est trouvé
        searchResultsContainer.innerHTML = "<p>Aucun résultat trouvé pour cette recherche.</p>";
    }
}

