<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>index.php</title>
</head>
<body>
<?php
function affichePremiers($n){
echo "Les nombres premiers entre 0 et ".$n." sont : <br/>";
$negatif = false;
if($n<0){
$negatif = true;
$n = -$n;
}

for($i=2;$i<=$n;$i++){
$nbDiv = 0;
for($j=1;$j<=$i;$j++){
if($i%$j==0){
$nbDiv++;
}
}
if($nbDiv == 2){

if($negatif){
echo "-";
}
echo $i."<br/>";
}
}
}
affichePremiers(1000);
?>
</body>
</html>
