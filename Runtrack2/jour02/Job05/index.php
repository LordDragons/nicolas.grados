<?php


Function firstNbr($nbr) {


for ($i=2; $i <$nbr ; $i++) { 
if ($nbr % $i == 0 ){
return false;

}
}
return true ;
}

echo "<br>  1";
for ($i=3; $i < 1000; $i++) { 
if (firstNbr($i)) {
        echo "<br>" . $i;
    }

}

