<?php
$str = "Les choses que l'on possède finissent par nous posséder.";
$reverse = "";

// Trouver la longueur sans strlen (en utilisant isset)
$length = 0;
while (isset($str[$length])) {
    $length++;
}

// Parcourir la chaîne à l’envers
for ($i = $length - 1; $i >= 0; $i--) {
    $reverse .= $str[$i];
}

// Afficher la chaîne inversée
echo $reverse;
?>
