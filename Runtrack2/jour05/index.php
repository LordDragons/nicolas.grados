<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de style</title>
</head>
<body>
<style>
form {
    max-width: 400px;
    margin: 0 auto;
};
label {
    display: block;
    margin-bottom: 8px;
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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $style = $_POST['style'];  
   
if ($style == 'style1'){
    echo "<link rel = 'stylesheet' type='text/css' href='style1.css' id=style'>";
}
elseif ($style == 'style2'){
    echo "<link rel = 'stylesheet' type='text/css' href='style2.css' id=style'>";
}
elseif ($style == 'style3'){
    echo "<link rel='stylesheet' type='text/css' href='style3.css' id='style'>";
}
else {
    echo "<link rel='stylesheet' type='text/css' href='style.css' id='style'>";
}
}
?>

<!--Création du formulaire-->

<form method="post" action="">
    <label for="style">Choix du style :
        <select name="style" id="style">
            <option value="style de base">0</option>
            <option value="style1">1</option>
            <option value="style2">2</option>
            <option value="style3">3</option>
        </select>
    </label>
    <!-- Création du bouton de validation -->
    <button type="submit">Changement de style</button>
</form>

</body>
</html>