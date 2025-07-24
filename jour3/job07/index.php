<?php
$str = "On n'est pas le meilleur quand on le croit mais quand on le sait";
$dic = [
    "voyelles" => 0,
    "consonnes" => 0
];
// On transforme tout en minuscules pour éviter les doublons
$str = strtolower($str);
// Parcours de la chaîne
for ($i = 0; isset($str[$i]); $i++) {
    $char = $str[$i];
    // Vérifier si c’est une lettre
    if (ctype_alpha($char)) {
        if (in_array($char, ['a', 'e', 'i', 'o', 'u', 'y'])) {
            $dic["voyelles"]++;
        } else {
            $dic["consonnes"]++;
        }
    }
}
?>
<!-- Affichage dans un tableau HTML -->
<table border="1">
    <thead>
        <tr>
            <th>Voyelles</th>
            <th>Consonnes</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $dic["voyelles"] ?></td>
            <td><?= $dic["consonnes"] ?></td>
        </tr>
    </tbody>
</table>