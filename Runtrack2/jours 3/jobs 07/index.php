<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
</head>


<body>
    <title>index</title>
<?php
$str = "Certaines chose changent, et d'autres ne changeront.";

$str[strlen($str)+1] = $str[0];
$str[0] = " ";
$str[1] = ucwords($str[1]);
echo $str;

?>
</body>

</html>