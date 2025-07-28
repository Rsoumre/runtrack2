<?php
function occurrences($str, $char) {
    $count = 0;
    for ($i = 0; isset($str[$i]); $i++) {
        if ($str[$i] === $char) {
            $count++;
        }
    }
    return $count;
}

// Exemple d'appel
echo occurrences("Bonjour", "o"); // Affiche : 2
?>
