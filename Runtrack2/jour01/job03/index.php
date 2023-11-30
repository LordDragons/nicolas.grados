<?php
$bool=true;
$str="5";
$var="coucou les amis";
$float=1.23;

?>

<table>
<tr>
<td>Type de variables</td>
<td>Nom</td>
<td>Valeur</td>
</tr>
<tr>
<td>boolean</td>
<td>Un booleen</td>
<td><?php echo"$bool" ?></td>
</tr>
<tr>
<td>Integer</td>
<td>Un Entier</td>
<?php echo "<td>". $str . "</td>"; ?>
</tr>
<tr>
<td>Varchar</td>
<td>Une chaine de caractéres</td>
<td><?php echo"$var" ?></td>
</tr>
<tr>
<td>Float</td>
<td>Un nombre a virgule</td>
<td><?php echo"$float" ?></td>
</tr>
<table>
