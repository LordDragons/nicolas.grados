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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["Username"] ;
    $password = $_POST["Password"] ;


if ($username == "John" && $password == "Rambo") {

echo "C'est pas ma guerre";
}
else {

    echo "Votre pire cauchemar";
}
}
?>

    <div class="formulaire">

        <form method="POST">
            <label for="username">Username :</label>
            <input type="text" id="username" name="Username" required>

            <label for="password">Password :</label>
            <input type="password" id="password" name="Password" required>
           
            <button type="submit">Envoyer</button>
        </form>
    </div>
   
</body>
</html>