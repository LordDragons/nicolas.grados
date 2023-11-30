<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>index.php</title>
</head>
<body>
<?php
$im=imagecreate(600,600) or die("cannot initialize graphic") ;
$back_color=imagecolorallocate($im,255,255,255) ;
$black=imagecolorallocate($im,5,0,0);

imagerectangle($im,0,0,200,100, $black) ;

imagepng($im,"rectangleimage.png") ;

imagedestroy($im);

echo "<img src=rectangleimage.png>" ;
?>
</body>
</html>
