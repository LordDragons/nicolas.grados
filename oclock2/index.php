<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minuteur</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="assets/oclock.css">


</head>

<body>

    <div id="radio-container">
        <div id="horloge">
            <label for="horloge">Heure de Paris</label>
            <div class="horloge" id="clockDisplay">00 :00 :00</div>
        </div>

        <div id="timer">
            <label for="timer">Temps <br>(en secondes):</label><br>
            <input type="number" id="timerInput" placeholder="Entrez le temps en secondes">
        </div>

        <div id="alarme">
            <label for="alarme">Réveil</label><br>
            <input type="time" id="alarmTime" placeholder="Heure de l’alarme">
            <input type="text" id="alarmMessage" placeholder="Message de l’alarme">
        </div>

        <div id="chronometre">
            <label for="chronometre"></label>
            <div id="stopwatchDisplay">00 :00 :00</div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1750 1200" width="100%" height="100%">
            <!-- Corps de la radio  -->
            <!-- Bois moyen -->
            <rect x="291.67" y="200" width="1166.67" height="800" rx="58.33" ry="58.33" fill="#966F33" />

            <!-- Nervures bois foncé -->
            <line x1="600" y1="200" x2="600" y2="1000" stroke="#78501E" stroke-width="20" />
            <line x1="700" y1="200" x2="700" y2="1000" stroke="#78501E" stroke-width="20" />

            <!-- Dégradé pour simuler la profondeur -->
            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" style="stop-color:#8B4513;stop-opacity:0" />
                <stop offset="100%" style="stop-color:#4D2600;stop-opacity:0.3" />
            </linearGradient>

            <!-- Cadran  -->
            <path id="startStopBtn" d="M400 950 
            A60 60, 0, 1, 1, 400.001 949.999 Z" fill="black" />
            <text fill="goldenrod">
                <textPath xlink:href="#startStopBtn" startOffset="50%" style="cursor: grab;" >
                    Minuteur
                </textPath>
            </text>

            <!-- Boutons -->
           <path id="setAlarm" onclick="setAlarm()" d="M900 950 
        A60 60, 0, 1, 1, 900.001 949.999 Z" fill="goldenrod" />
            <text>
                <textPath xlink:href="#setAlarm" startOffset="50%" style="cursor: grab;">
                    Alarme
                </textPath>
            </text>

            <path id="startStopStopwatch" d="M1050 950
        A60 60, 0, 1, 1, 1050.001 949.999 Z" fill="goldenrod" />
            <text>
                <textPath xlink:href="#startStopStopwatch" startOffset="50%" style="cursor: grab;">
                   Chronometre
                </textPath>
            </text>

            <path id="recordTime" d="M1200 950
        A60 60, 0, 1, 1, 1200.001 949.999 Z" fill="goldenrod" />
            <text>
                <textPath xlink:href="#recordTime" startOffset="50%" style="cursor: grab;">
                    Tour 
                </textPath>
            </text>

            <path id="resetStopwatch" d="M1350 950
        A60 60, 0, 1, 1, 1350.001 949.999 Z" fill="goldenrod" style="cursor: grab;" />
            <text>
                <textPath xlink:href="#resetStopwatch" startOffset="50%">
                    Réinitialiser
                </textPath>
            </text>

            <!-- Détails décoratifs -->
            <line x1="525" y1="200" x2="525" y2="1000" stroke="#C0C0C0" stroke-width="29.17" />
            <line x1="633.33" y1="200" x2="633.33" y2="1000" stroke="#C0C0C0" stroke-width="29.17" />
            <line x1="741.67" y1="200" x2="741.67" y2="1000" stroke="#C0C0C0" stroke-width="29.17" />
        </svg>

    </div>

    <ul id="alarmList"></ul>

    <div id="lapTimesContainer"></div>

    <script src="assets/horloge.js"></script>
    <script src="assets/minuteur.js"></script>
    <script src="assets/reveil.js"></script>
    <script src="assets/chronometre.js"></script>

</body>

</html>