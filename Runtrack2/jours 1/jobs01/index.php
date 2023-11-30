<?php

// Création et affichage de la variable str
$str = "LaPlateforme";
echo "Contenu de la variable str : " . $str . "<br>";

// Création des variables str2 et str3, puis affichage de la concaténation
$str2 = "Vive";
$str3 = "!";
echo $str2 . " " . $str . " " . $str3 . "<br>";

// Création et manipulation de la variable val
$val = 6;
echo "Contenu de la variable val : " . $val . "<br>";
$val += 4;
echo "Nouveau contenu de la variable val après ajout de 4 : " . $val . "<br>";

// Création et manipulation de la variable myBool
$myBool = true;
echo "Contenu de la variable myBool : " . var_export($myBool, true) . "<br>";
$myBool = false;
echo "Nouveau contenu de la variable myBool : " . var_export($myBool, true) . "<br>";

?>
