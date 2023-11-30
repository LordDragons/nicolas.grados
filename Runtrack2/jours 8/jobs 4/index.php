<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        #greeting, #loginForm, #logoutBtn {
            display: none;
            margin-bottom: 20px;
        }

        #loginForm label, #loginForm input, #loginForm button {
            margin: 5px;
        }

        #logoutBtn {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div id="greeting">Bonjour <span id="userName"></span> !</div>


    <form id="loginForm">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom">
        <button type="submit" id="connexionBtn">Connexion</button>
    </form>

  
    <button id="logoutBtn">Déconnexion</button>

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

      
        function hideElement(elementId) {
            document.getElementById(elementId).style.display = 'none';
        }

        
        function showElement(elementId) {
            document.getElementById(elementId).style.display = 'block';
        }

      
        function handleLogin() {
            const userName = document.getElementById('prenom').value.trim();
            if (userName !== '') {
                setCookie('user', userName, 365);
                hideElement('loginForm');
                showElement('greeting');
                document.getElementById('userName').textContent = userName;
            }
        }

       
        function handleLogout() {
            document.cookie = 'user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            hideElement('greeting');
            hideElement('logoutBtn');
            showElement('loginForm');
        }

        
        document.addEventListener('DOMContentLoaded', function() {
            const userName = getCookie('user');
            if (userName) {
                hideElement('loginForm');
                showElement('greeting');
                document.getElementById('userName').textContent = userName;
                showElement('logoutBtn');
            } else {
                showElement('loginForm');
                hideElement('greeting');
                hideElement('logoutBtn');
            }

            
            document.getElementById('loginForm').addEventListener('submit', function(event) {
                event.preventDefault();
                handleLogin();
            });

          
            document.getElementById('logoutBtn').addEventListener('click', handleLogout);
        });
    </script>

</body>
</html>
