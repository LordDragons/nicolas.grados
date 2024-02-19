<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>
<body>
    <div id="content">
        <?php
        
    
        // Vérifiez si l'utilisateur est connecté
        if(isset($_SESSION['id'])) {
    
            // Accédez à la base de données
            $mysqlConnection = new mysqli(
                'localhost',  // Serveur 
                'root',       // Identifiant phpmyadmin
                '',           // Mot de passe phpmyadmin
                'utilisateurs' // Nom de la base de données
            );
    
            // Vérifiez la connexion à la base de données
            if ($mysqlConnection->connect_error) {
                die("Erreur de connexion à la base de données : " . $mysqlConnection->connect_error);
            }
    
            // Récupérez le prénom de l'utilisateur depuis la base de données
            $userId = $_SESSION['id'];
            $sql = "SELECT prenom FROM utilisateurs WHERE id= ?";
            $stmt = $mysqlConnection->prepare($sql);
            
            if (!$stmt) {
                die("Erreur de préparation de la requête : " . $mysqlConnection->error);
            }
            
            $stmt->bind_param('i', $userId);
            $stmt->execute();
            $stmt->bind_result($prenom);
            
            // Affichez le prénom si l'utilisateur est trouvé
            if ($stmt->fetch()) {
                echo "<p>Bonjour " . $prenom . "</p>";
            } else {
                echo "Erreur lors de la récupération des informations de l'utilisateur.";
            }
    
            $stmt->close();
            $mysqlConnection->close();
            
        } else {
            // Si l'utilisateur n'est pas connecté, affichez les liens d'inscription et de connexion
            echo '<a href="inscription.php">Inscription</a>';
            echo '<a href="connexion.php">Connexion</a>';
        }
    
        ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
