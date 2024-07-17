<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formule de compte</title>
</head>
<body>

    <header>
        <h1>Mon Site Web</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php">Inscription</a></li>
                <li><a href="index.php">Connexion</a></li>
                <li><a href="index.php">Rechercher</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Création de Compte</h2>
        <form action="traitement.php" method="post">

            <!-- Civilité -->
            <label for="civilite">Civilité :</label>
            <input type="radio" name="civilite" value="Monsieur" id="civilite_monsieur"><label for="civilite_monsieur">Monsieur</label>
            <input type="radio" name="civilite" value="Madame" id="civilite_madame"><label for="civilite_madame">Madame</label>
            <br>

            <!-- Prénom -->
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" required>
            <br>

            <!-- Nom -->
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" required>
            <br>

            <!-- Adresse -->
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" id="adresse" required>
            <br>

            <!-- Adresse Email -->
            <label for="email">Adresse Email :</label>
            <input type="email" name="email" id="email" required>
            <br>

            <!-- Mot de passe -->
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>
            <br>

            <!-- Validation du mot de passe -->
            <label for="password_confirm">Confirmer le mot de passe :</label>
            <input type="password" name="password_confirm" id="password_confirm" required>
            <br>

            <!-- Passions -->
            <label>Passions :</label>
            <input type="checkbox" name="passion[]" value="informatique" id="passion_informatique"><label for="passion_informatique">Informatique</label>
            <input type="checkbox" name="passion[]" value="voyages" id="passion_voyages"><label for="passion_voyages">Voyages</label>
            <input type="checkbox" name="passion[]" value="sport" id="passion_sport"><label for="passion_sport">Sport</label>
            <input type="checkbox" name="passion[]" value="lecture" id="passion_lecture"><label for="passion_lecture">Lecture</label>
            <br>

            <!-- Bouton de validation -->
            <input type="submit" value="Valider">

        </form>
    </section>

    <footer>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php">Inscription</a></li>
            <li><a href="index.php">Connexion</a></li>
            <li><a href="index.php">Rechercher</a></li>
        </ul>
    </footer>

</body>
</html>
