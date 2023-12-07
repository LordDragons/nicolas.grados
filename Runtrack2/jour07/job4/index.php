<?php


$nombre = rand();
$a = $nombre;
$b = $nombre;
$operation = ("+" or "-" or "*" or "%" or "/");

function calcule($a, $operation, $b) {
    switch ($operation) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            // Assurez-vous que la division par zéro n'arrive pas
            return ($b != 0) ? $a / $b : "Division par zéro";
        case '%':
            // Assurez-vous que le modulo n'arrive pas avec un diviseur égal à zéro
            return ($b != 0) ? $a % $b : "Modulo avec diviseur égal à zéro";
        default:
            return "Opération non valide";
    }
}
echo calcule($a, $operation, $b);