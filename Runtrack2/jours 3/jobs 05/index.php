<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<?php

$str = "On n’est pas le meilleur quand on le croit mais quand on le sait";

$dic = array(
    "consonnes" => 0,
    "voyelles" => 0
);

$voyelles = array("a", "e", "i", "o", "u", "y");

for ($i = 0; $i < strlen($str); $i++) {
    $caractere = strtolower($str[$i]);

    if (in_array($caractere, $voyelles)) {
        $dic["voyelles"]++;
    } elseif (ctype_alpha($caractere)) {
        $dic["consonnes"]++;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Occurrences de Voyelles et Consonnes</title>
</head>
<body>

<table border="1">
    <thead>
        <tr>
            <th>Voyelles</th>
            <th>Consonnes</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $dic["voyelles"]; ?></td>
            <td><?php echo $dic["consonnes"]; ?></td>
        </tr>
    </tbody>
</table>

</body>
</html>

</html> 