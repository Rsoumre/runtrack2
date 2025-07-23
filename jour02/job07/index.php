<?php
$hauteur = 5;
echo "<pre>";
for ($i = 1; $i <= $hauteur; $i++) {
    // Espaces à gauche
    for ($espace = 1; $espace <= $hauteur - $i; $espace++) {
        echo " ";
    }
    // Bord gauche
    echo "/";
    // Milieu
    if ($i == $hauteur) {
        for ($j = 1; $j <= 2 * ($i - 1); $j++) {
            echo "_";
        }
    } else {
        for ($j = 1; $j <= 2 * ($i - 1); $j++) {
            echo " ";
        }
    }
    // Bord droit
    echo "\\\n";
}
echo "</pre>";
?>
