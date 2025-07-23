<?php
for ($i = 2; $i <= 1000; $i++) {
    $estPremier = true;

    // Vérifie si $i est divisible par un nombre entre 2 et √$i
    for ($j = 2; $j <= sqrt($i); $j++) {
        if ($i % $j == 0) {
            $estPremier = false;
            break;
        }
    }

    if ($estPremier) {
        echo "$i<br>";
    }
}
?>
