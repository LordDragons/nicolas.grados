<?php
session_start();

include "header.php";
require_once "basededonnée.php";

if (isset($_POST['ajouter_commentaire'])) {
    $nouveauCommentaire = $_POST['commentaire'];
    $id_commentaire_parent = isset($_POST['commentaire_parent']) ? $_POST['commentaire_parent'] : null;

    if (!empty($nouveauCommentaire)) {
        $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;

        if ($id_user !== null) {
            try {
                // Insérer le nouveau commentaire dans la base de données
                $requeteNouveau = $pdo->prepare("INSERT INTO commentaires (id_user, commentaire, date) VALUES (?, ?, CURRENT_TIMESTAMP)");
                $requeteNouveau->execute([$id_user, $nouveauCommentaire]);

                // Si c'est une réponse à un commentaire existant, insérer aussi dans la table des réponses
                if ($id_commentaire_parent !== null) {
                    $requeteReponse = $pdo->prepare("INSERT INTO reponses_commentaires (id_commentaire_parent, id_user, commentaire, date) VALUES (?, ?, ?, CURRENT_TIMESTAMP)");
                    $requeteReponse->execute([$id_commentaire_parent, $id_user, $nouveauCommentaire]);
                }

                echo "<div class='alert alert-success'><h2>Requête validée !</h2><p>Le commentaire a bien été mis en ligne !</p></div>";
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger'><h2>Erreur !</h2><p>Erreur SQL: " . $e->getMessage() . "</p></div>";
            }
        } else {
            echo "<div class='alert alert-danger'><h2>Erreur !</h2><p>Identifiant de l'utilisateur non valide.</p></div>";
        }
    } else {
        echo "<div class='alert alert-danger'><h2>Erreur !</h2><p>Le commentaire ne peut pas être vide.</p></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- En-tête de votre page HTML -->
</head>
<body>
    <h1>Ajouter un Commentaire</h1>
    <form class="mt-5 w-75 mx-auto" method="POST" action="commentaire.php">
        <!-- Champs du formulaire pour ajouter un commentaire -->
        <div class="mb-3">
            <label for="commentaire">Commentaire</label>
            <textarea name="commentaire" id="commentaire" class="form-control" rows="5" required></textarea>
        </div>

        <!-- Champ du formulaire pour sélectionner le commentaire parent -->
        <div class="mb-3">
            <label for="commentaire_parent">Répondre à :</label>
            <select name="commentaire_parent" id="commentaire_parent" class="form-control">
                <option value="">Aucun</option>
                <!-- Ici vous devez générer dynamiquement les options en fonction des commentaires existants -->
                <!-- Par exemple, si vous avez une variable $commentaires contenant les commentaires existants -->
                <?php foreach ($commentaires as $commentaire) { ?>
                    <option value="<?= $commentaire['id'] ?>"><?= $commentaire['commentaire'] ?></option>
                <?php } ?>
            </select>
        </div>

        <button type="submit" name="ajouter_commentaire" class="btn btn-success">Ajouter le Commentaire</button>
    </form>
    <!-- Script et autres éléments HTML de votre page -->
</body>
</html>
