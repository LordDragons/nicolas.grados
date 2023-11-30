<?php

$str="I'm sorry Dave I'm afraid I can't do that.";

//$lettre = array("a", "e", "i", "o", "u", "y");
$d=0;

while ($d < strlen($str)) {
    $lettre = strtolower($str[$d]);
    if (in_array($lettre, ['a', 'e', 'i', 'o','u', 'y']))
    echo $str[$d];
    $d ++ ;
    
    
/*   if ($i=$lettre) {
        echo "";
    }*/
    
}





    
    

