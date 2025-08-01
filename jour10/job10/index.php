<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "jour9");

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

// Requête SQL : toutes les infos des salles triées par capacité croissante
$query = "SELECT * FROM salles ORDER BY capacite ASC";
$result = $mysqli->query($query);

// Affichage du résultat dans un tableau HTML
echo "<table border='1'>";
echo "<thead><tr>";

// Affichage des noms de colonnes
if ($result && $result->num_rows > 0) {
    $columns = $result->fetch_fields();
    foreach ($columns as $col) {
        echo "<th>" . htmlspecialchars($col->name) . "</th>";
    }
    echo "</tr></thead><tbody>";

    // Affichage des lignes de données
    $result->data_seek(0);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }

} else {
    echo "<th>Aucune donnée</th></tr></thead><tbody>";
}

echo "</tbody></table>";

// Fermeture de la connexion
$mysqli->close();
?>
