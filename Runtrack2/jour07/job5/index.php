<?php

$str = "Joyeux Noel";
$char = "e";
$nombreOccurence =  occurrences($str, $char);

function occurrences($str, $char) {
    $count = 0;
    // Parcours de chaque caractère dans la chaîne
    for ($i = 0; $i < strlen($str); $i++) {
        // Comparaison avec le caractère recherché
        if ($str[$i] == $char) {
            $count++;
        }
    }
    return $count;
}
echo "le nombres d'occurences de '$char' dans '$str' est de '$nombreOccurence'.";

