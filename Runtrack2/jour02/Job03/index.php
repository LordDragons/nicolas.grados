<?php
$nbr = 0;

while ($nbr <=99) {
    
$nbr++;

if ($nbr<=20) {
    echo "<br /><i>" . $nbr  . "</i>";
}

elseif ($nbr>=25 and $nbr<=41 or $nbr>=43 and $nbr<=50) {
    echo "<br/><u>" . $nbr . "</u>";
}


elseif ($nbr==42) {
    echo "<br /> La Plateforme";
}

else {
    echo "<br />" .$nbr;
}
}