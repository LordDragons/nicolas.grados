<?php

$largeur=20;
$hauteur=10;
$x1=80;
$y1=130;

$rectangle = imagecreatetruecolor(300, 200);


$green = imagecolorallocate($rectangle, 132, 135, 28);

imagerectangle(
    
    $rectangle, 
    $x1,
    $y1,
    ($x1+$largeur), 
    ($y1+$hauteur), 
    $green
);

header('Content-Type: image/jpeg');

imagejpeg($rectangle);



//<div style="width: <?php echo $largeur?>vw; height:<?php echo $hauteur ?>vw; display: block; background-color; purple;"></div>