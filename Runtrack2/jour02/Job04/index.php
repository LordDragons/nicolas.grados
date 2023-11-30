<?php
$nbr = 0;

while ($nbr <=99) {
   
$nbr++;

if (!($nbr%3) and !($nbr%5)) {
    echo "<br /> FizzBuzz";
}

else if (!($nbr%3)){
    echo "<br />Fizz";
}

else if (!($nbr%5)) {
    echo "<br />Buzz";
}

else {
    echo "<br />" .$nbr;
}
}