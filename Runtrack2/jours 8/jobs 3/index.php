<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counter and Names Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        #counter {
            font-size: 24px;
            margin-bottom: 20px;
        }

        #namesList {
            font-size: 18px;
            margin-bottom: 20px;
        }

        #resetBtn, #submitBtn {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 5px;
        }
    </style>
</head>
<body>

    <div id="counter">Visites: <span id="visitCount">0</span></div>
    <div id="namesList">Prénoms: <span id="names"></span></div>

   
    <form id="nameForm">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom">
        <button type="submit" id="submitBtn">Valider</button>
    </form>

    <!-- Boutons pour réinitialiser la liste et décrémenter le compteur -->
    
    <button id="decrementBtn">Décrémenter le compteur</button>
    <button id="resetNamesBtn">clique pas sa sert a rien</button>

    <script>
        
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

       
        function setCookie(name, value, days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = `expires=${date.toUTCString()}`;
            document.cookie = `${name}=${value}; ${expires}; path=/`;
        }

       
        function incrementCounter() {
            const visitCountElement = document.getElementById('visitCount');
            let visitCount = parseInt(getCookie('nbvisites')) || 0;
            visitCount += +1;
            visitCountElement.textContent = visitCount;
            setCookie('nbvisites', visitCount, 365); 
        }

      
        function resetCounter() {
            setCookie('nbvisites', 0, 365); 
            document.getElementById('visitCount').textContent = 0;
        }

        
        function addNameToSessionStorage(name) {
            let names = JSON.parse(sessionStorage.getItem('names')) || [];
            names.push(name);
            sessionStorage.setItem('names', JSON.stringify(names));
            updateNamesList();
        }

        
        function resetNamesList() {
            sessionStorage.removeItem('names');
            updateNamesList();
        }

     
        function updateNamesList() {
            const namesListElement = document.getElementById('names');
            let names = JSON.parse(sessionStorage.getItem('names')) || [];
            namesListElement.textContent = names.join(', ');
        }

       
        document.addEventListener('DOMContentLoaded', function() {
           
            document.getElementById('visitCount').textContent = getCookie('nbvisites') || 0;

           
            incrementCounter();

            
            document.getElementById('resetBtn').addEventListener('click', resetCounter);

            
            document.getElementById('nameForm').addEventListener('submit', function(event) {
                event.preventDefault();
                const nameInput = document.getElementById('prenom');
                const name = nameInput.value.trim();
                if (name !== '') {
                    addNameToSessionStorage(name);
                    nameInput.value = '';
                }
            });

           
            document.getElementById('resetNamesBtn').addEventListener('click', resetNamesList);

        
            updateNamesList();
        });
        
        // Fonction pour décrémenter le compteur de visites
        function decrementCounter() {
            const visitCountElement = document.getElementById('visitCount');
            let visitCount = parseInt(getCookie('nbvisites')) || 0;
            visitCount -= 1;
            visitCountElement.textContent = visitCount;
            setCookie('nbvisites', visitCount, 365);
        }

        // Ajoute un gestionnaire d'événements au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            // Ajoute un gestionnaire d'événements pour le bouton de décrémentation du compteur
            document.getElementById('decrementBtn').addEventListener('click', decrementCounter);
        });

        
    </script>

</body>
</html>
