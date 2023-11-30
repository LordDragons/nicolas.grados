<?php

$str="Certaines choses changent, et d'autres ne changeront jamais.";

$str[strlen($str)+1] = $str[0];
$str[0] = " ";
$str[1] = ucwords($str[1]);

echo $str;