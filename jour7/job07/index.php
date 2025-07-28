<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Job 07 - Fonctions</title>
</head>
<body>

<form method="get">
    <label for="str">Texte :</label>
    <input type="text" id="str" name="str" placeholder="Votre texte ici" required>

    <label for="fonction">Transformation :</label>
    <select id="fonction" name="fonction" required>
        <option value="gras">Gras</option>
        <option value="cesar">César</option>
        <option value="plateforme">Plateforme</option>
    </select>    
    <input type="submit" value="Appliquer">
</form>

<hr>

<?php
// Fonction GRAS
function gras($str) {
    $mots = explode(" ", $str);
    foreach ($mots as &$mot) {
        if (isset($mot[0]) && ctype_upper($mot[0])) {
            $mot = "<b>" . $mot . "</b>";
        }
    }
    return implode(" ", $mots);
}

// Fonction CÉSAR
function cesar($str, $decalage = 2) {
    $resultat = '';
    for ($i = 0; isset($str[$i]); $i++) {
        $car = $str[$i];
        if (ctype_alpha($car)) {
            $base = ctype_upper($car) ? ord('A') : ord('a');
            $resultat .= chr((ord($car) - $base + $decalage) % 26 + $base);
        } else {
            $resultat .= $car;
        }
    }
    return $resultat;
}

// Fonction PLATEFORME
function plateforme($str) {
    $mots = explode(" ", $str);
    foreach ($mots as &$mot) {
        if (substr($mot, -2) === "me") {
            $mot .= "_";
        }
    }
    return implode(" ", $mots);
}

// TRAITEMENT du formulaire
if (isset($_GET["str"]) && isset($_GET["fonction"])) {
    $str = $_GET["str"];
    $fonction = $_GET["fonction"];

    echo "<h3>Résultat :</h3>";

    if ($fonction == "gras") {
        echo gras($str);
    } elseif ($fonction == "cesar") {
        echo cesar($str);
    } elseif ($fonction == "plateforme") {
        echo plateforme($str);
    } else {
        echo "Option inconnue.";
    }
}
?>

</body>
</html>