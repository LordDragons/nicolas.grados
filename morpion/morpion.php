<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="morpion.css" rel="stylesheet">

    <title>Morpion</title>
</head>

<body>

    <h1><span class="title-text">Morpion</span></h1>
    


    <div class="themes-container">
        <h2>Chois du théme</h2>
        <button class="theme-btn" onclick="changeTheme('crossCircle')">Croix/Rond</button>
        <button class="theme-btn" onclick="changeTheme('swordShield')">Épée/Bouclier</button>
        <button class="theme-btn" onclick="changeTheme('catMouse')">Chat/Souris</button>
        <button class="theme-btn" onclick="changeTheme('dogBone')">Chien/Os</button>
        <button class="theme-btn" onclick="changeTheme('dragon')">Dragon/Feu</button>
        <button class="theme-btn" onclick="changeTheme('wizard')">Magicien/Sort</button>
    </div>
    <div class="jeu">
        <table class="plateau">
            <tr>
                <td><button onclick="placeSymbol(0, 0)">-</button></td>
                <td><button onclick="placeSymbol(0, 1)">-</button></td>
                <td><button onclick="placeSymbol(0, 2)">-</button></td>
            </tr>
            <tr>
                <td><button onclick="placeSymbol(1, 0)">-</button></td>
                <td><button onclick="placeSymbol(1, 1)">-</button></td>
                <td><button onclick="placeSymbol(1, 2)">-</button></td>
            </tr>
            <tr>
                <td><button onclick="placeSymbol(2, 0)">-</button></td>
                <td><button onclick="placeSymbol(2, 1)">-</button></td>
                <td><button onclick="placeSymbol(2, 2)">-</button></td>
            </tr>
        </table>

        <p class="reset">
            <button onclick="resetScores()">Réinitialiser les scores</button>
        </p>
        <table id="score">
            <tr>
                <th>Joueur</th>
                <th>Manche</th>
                <th>Partie</th>
            </tr>
            <tr>
                <td>joueur</td>
                <td id="Joueur1Manche">0</td>
                <td id="Joueur1Partie">0</td>

            </tr>
            <tr>
                <td>Ordinateur</td>
                <td id="OrdinateurManche">0</td>
                <td id="OrdinateurPartie">0</td>
            </tr>
        </table>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="morpion.js"></script>
</html>