<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  

<title>index</title>
</head>
<body>
<?php
$str = "Les choses que l'on possede finissent par nous posseder.";

$reversedStr = "";
for ($i = strlen($str) - 1; $i >= 0; $i--) {
    $reversedStr .= $str[$i];
}

echo $reversedStr;
?>


</body>

</html>