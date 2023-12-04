<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion méthode post</title>
</head>

<style>
form {
    max-width: 400px;
    margin: 0 auto;
};
label {
    display: block;
    margin-bottom: 8px;
}
input,
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
}
button {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>

<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $nombre = $_GET ["number"];

    if (is_numeric($nombre)) {
   if  ($nombre %2) {

    echo "C'est un nombre impair";
}
    else {

    echo " C'est un nombre pair";
}

}else {

        echo " Veuillez entrer un nombre";
    }
}
?>

    <div class="formulaire">

        <form method="GET">
            <label for="number">Your number :</label>
            <input type="number" id="number" name="number" required>

           
            <button type="submit">Envoyer</button>
        </form>
    </div>
   
</body>
</html>