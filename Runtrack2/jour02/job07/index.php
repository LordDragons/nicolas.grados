<?php

$hauteur=5;

for ($i=0; $i<$hauteur; $i++) {
    $prefixeEspace = (($hauteur-1)-$i)*2;
    $interEspace = $i*2;
    $texte= "";

    for ($d = 1; $d <=$prefixeEspace; $d++){
        $texte = $texte."&nbsp"; 
    }
    $texte = $texte. "/";

    for ($d = 1; $d <= $interEspace; $d++) {
        if ($i == ($hauteur-1)){
            $texte = $texte."_";
        }

        else {
            $texte = $texte . "&nbsp&nbsp";
        }

    }
    //for($n=0; $n <=$d; $n++)
    
    $texte = $texte . "\\";
    echo  $texte ."<br>";
//$texte.=   =>  $texte = $texte . 