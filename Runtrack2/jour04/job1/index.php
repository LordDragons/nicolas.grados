<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="formulaire">

        <form action="traitement.php" method="get">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="adresse">Adresse :</label>
            <textarea id="adresse" name="adresse" rows="4" required></textarea>

            <label for="telephone">Numéro de téléphone :</label>
            <input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" required>

            <label for="motivation">Motivation :</label>
            <textarea type="text" id="motivation" name="motivation" required></textarea>
           
            <button type="submit">Envoyer</button>
        </form>
    </div>

    
</body>
</html>