<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets//reservation.css">
</head>

<body>
    <h1>Bienvenue sur notre site de réservations de salles en ligne</h1>

    <div class="btn-container">
        <button type="button" class="btn btn-primary btn-custom"><a href="index.php">Accueil</a></button>
        <button type="button" class="btn btn-info btn-custom"><a href="planning.php">Planning</a></button>
        <button type="button" class="btn btn-danger btn-custom"><a href="formulaireDeReservation.php">Réservation</a></button>
        <button type="button" class="btn btn-secondary btn-custom"><a href="inscription.php">Inscription</a></button>
        <button type="button" class="btn btn-success btn-custom"><a href="connexion.php">Connexion</a></button>
    </div>


    <div class="carousel-container">
   
    <div class="carousel-slide" id="slide1">
    <img src="assets/images/amenagement-exterieur.jpg"></div>

    <div class="carousel-slide" id="slide2">
    <img src="assets/images/bassin-fontaine.jpg"></div>

    <div class="carousel-slide" id="slide3">
    <img src="assets/images/salledeloto.jpg"></div>

    <div class="carousel-slide" id="slide4">
    <img src="assets/images/salledemariage1.jpg"></div>

    <div class="carousel-slide" id="slide5">    
    <img src="assets/images/sallereception-grange.jpg"></div>

    <div class="carousel-slide" id="slide6">
    <img src="assets/images/vued_exterieur.jpg"></div>
   
</div>

    <script>
        function logout() {
            document.cookie = "id_utilisateur=";
            window.location.href = 'index.php';
        }
    </script>

<script src="assets//reservation.js"></script>

</body>

</html>