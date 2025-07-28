<?php

function leetSpeak($str) {
    // Tableau des remplacements leet (majuscules et minuscules)
    $leet = [
        'a' => '4', 'A' => '4',
        'b' => '8', 'B' => '8',
        'e' => '3', 'E' => '3',
        'g' => '6', 'G' => '6',
        'l' => '1', 'L' => '1',
        's' => '5', 'S' => '5',
        't' => '7', 'T' => '7',
    ];

    $result = '';
    for ($i = 0; isset($str[$i]); $i++) {
        $char = $str[$i];
        // Si le caractère est dans le tableau, on le remplace
        if (isset($leet[$char])) {
            $result .= $leet[$char];
        } else {
            $result .= $char;
        }
    }
    return $result;
}

// Exemple
echo leetSpeak("La Plateforme"); // Affiche : 14 P1473f0rm3

?>
