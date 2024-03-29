<?php
// Utilisation de la fonction ereg_replace(), dépréciée en PHP 8
$string = 'Bonjour, monde !';
$pattern = 'Bonjour';
$replacement = 'Hello';
$test = array($string, $pattern, $replacement);
$test2 = 'Coucou';
$test [] = $test2;
// $new_string = ereg_replace($pattern, $replacement, $string);
echo $test;
file_exists('./deprecated.php');
?>