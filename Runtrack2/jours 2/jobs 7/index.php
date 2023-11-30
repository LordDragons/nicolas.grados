<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>index.php</title>
</head>
<body>
<?php
$rows = 20;

for ($i = 1; $i <= $rows; $i++) {
    for ($k = $i; $k < $rows; $k++) {
        print"&nbsp;&nbsp"; 
    }
    for ($j = 1; $j <=(2 * $i - 1); $j++) {
if ($j == 1 || $i == $rows|| $j == (2 * $i - 1))  {
    print "*";
} else {    
    print "&nbsp;&nbsp";
    }
}

   

print"<br>" ;
    } 

?>
</body>
</html> 