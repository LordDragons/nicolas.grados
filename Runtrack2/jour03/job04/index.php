<?php

$str= "Dans l'espace, personne ne vous entend crier";
$resultatNombreCaracteres = compterCaracteres($str);


function compterCaracteres($str) {
    $nombreCaracteres = 0;

    foreach (str_split($str) as $caractere) {
        $nombreCaracteres++;
    }

    return $nombreCaracteres;

}

    echo "Phrase d'origine : $str<br>";
    echo "Nombre de caractères : $resultatNombreCaracteres";

