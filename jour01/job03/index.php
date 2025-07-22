<?php
$bool = true;         // booléen
$int = 42;            // entier
$string = "Bonjour";  // texte
$float = 3.14;        // nombre décimal

$variables = [
    ['type' => 'boolean', 'nom' => 'bool', 'valeur' => $bool],
    ['type' => 'integer', 'nom' => 'int', 'valeur' => $int],
    ['type' => 'string',  'nom' => 'string', 'valeur' => $string],
    ['type' => 'float',   'nom' => 'float', 'valeur' => $float]
];

echo "<table border='1'>";
echo "<thead><tr><th>Type</th><th>Nom</th><th>Valeur</th></tr></thead>";
echo "<tbody>";

foreach ($variables as $var) {
    echo "<tr>";
    echo "<td>" . $var['type'] . "</td>";
    echo "<td>" . $var['nom'] . "</td>";

    if (is_bool($var['valeur'])) {
        echo "<td>" . ($var['valeur'] ? 'true' : 'false') . "</td>";
    } else {
        echo "<td>" . $var['valeur'] . "</td>";
    }

    echo "</tr>";
}

echo "</tbody></table>";
?>
