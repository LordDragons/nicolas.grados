<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counter Example</title>
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

        #resetBtn {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div id="counter">Visites: <span id="visitCount">0</span></div>
    <button id="resetBtn">Réinitialiser</button>

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
            visitCount += 1;
            visitCountElement.textContent = visitCount;
            setCookie('nbvisites', visitCount, 365); 
        }

   
        function resetCounter() {
            setCookie('nbvisites', 0, 365); 
            document.getElementById('visitCount').textContent = 0;
        }

        
        document.addEventListener('DOMContentLoaded', function() {
           
            document.getElementById('visitCount').textContent = getCookie('nbvisites') || 0;

        
            incrementCounter();

           
            document.getElementById('resetBtn').addEventListener('click', resetCounter);
        });
    </script>

</body>
</html>
