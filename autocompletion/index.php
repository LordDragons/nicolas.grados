<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>

    <!-- Ajoutez ce script pour inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Ajoutez ce script pour gérer les suggestions de recherche -->
    <script>
        $(document).ready(function() {
            function getSuggestions(searchTerm) {
                $.ajax({
                    url: 'suggestions.php',
                    type: 'GET',
                    data: { search: searchTerm },
                    success: function(response) {
                        $('#suggestions-list').html(response);
                    }
                });
            }

            $('#search-input').on('input', function() {
                var searchTerm = $(this).val();
                getSuggestions(searchTerm);
            });

            // Gérez le clic sur une suggestion
            $(document).on('click', '#suggestions-list li', function() {
                var selectedTerm = $(this).text();
                $('#search-input').val(selectedTerm);
                
                // Charger les informations correspondantes depuis la base de données
                $.ajax({
                    url: 'get_info.php', // Le script PHP qui renvoie les informations
                    type: 'GET',
                    data: { search: selectedTerm },
                    success: function(response) {
                        // Afficher les informations dans un élément dédié
                        $('#result-info').html(response);
                    }
                });
            });
        });
    </script>

    <!-- Ajoutez ces styles CSS -->
    <style>

        body {
background-image: url(./asset/foodtruck.jpg);
background-size: cover;
color: goldenrod;
        }
        #suggestions-list li {
            cursor: pointer;
            transition: background-color 0.3s ease;
            list-style-type: none;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 5px;
            border-radius: 8px;
        }

        #suggestions-list li:hover {
            background-color: #e6e6e6;
        }

        #result-info {
            background-color: #f9f9f9;
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <!-- Formulaire de recherche avec barre de suggestions -->
        <form action="recherche.php" method="GET">
            <input type="text" id="search-input" name="search" placeholder="Recherche...">
            <button type="submit">Rechercher</button>
            <div id="suggestions-list"></div>
        </form>
    </header>
    <h2>Votre plat</h2>
    
    <div id="result-info"></div> 
</body>
</html>
