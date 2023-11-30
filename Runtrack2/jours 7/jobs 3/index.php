<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello LaPlateforme</title>
</head>
<body>

<?php
function getHello() {
    return "Hello LaPlateforme!";
}

$message = getHello();
echo "<p>$message</p>";
?>

</body>
</html>

