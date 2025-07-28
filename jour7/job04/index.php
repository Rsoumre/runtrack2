<?php

function calcule($a, $operation, $b) {
    if ($operation == "+") {
        return $a + $b;
    } elseif ($operation == "-") {
        return $a - $b;
    } elseif ($operation == "*") {
        return $a * $b;
    } elseif ($operation == "/") {
        if ($b != 0) {
            return $a / $b;
        } else {
            return "Erreur : division par zéro";
        }
    } elseif ($operation == "%") {
        if ($b != 0) {
            return $a % $b;
        } else {
            return "Erreur : division par zéro";
        }
    } else {
        return "Opération inconnue";
    }
}

// Exemple d'appel
echo calcule(10, "+", 5); // Affichera 15

?>
