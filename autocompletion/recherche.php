<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>
    <header>
        <form action="recherche.php" method="GET">
            <input type="text" name="search" placeholder="Recherche..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button type="submit">Rechercher</button>
        </form>
    </header>
    <h1>Résultats de recherche</h1>
    <!-- Afficher les résultats de recherche ici -->
</body>
</html>