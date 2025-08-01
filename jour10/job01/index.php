<?php
$mysqli = new mysqli("localhost", "root", "", "jour9");

if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

$query = "SELECT * FROM étudiants";
$result = $mysqli->query($query);

if ($result) {
    echo "<table border='1'>";
    echo "<thead><tr>";

    // Entêtes (noms des colonnes)
    while ($fieldinfo = $result->fetch_field()) {
        echo "<th>" . $fieldinfo->name . "</th>";
    }

    echo "</tr></thead><tbody>";

    // Lignes de données
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $cell) {
           echo "<td>" . htmlspecialchars($cell ?? '') . "</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "Erreur dans la requête : " . $mysqli->error;
}

$mysqli->close();
?>
