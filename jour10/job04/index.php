<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "jour9");

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

// Requête SQL
$query = "SELECT * FROM étudiants WHERE prenom LIKE 'T%'";
$result = $mysqli->query($query);

// Générer le tableau HTML
echo "<table border='1'>";
echo "<thead><tr>";

// Afficher les noms des champs
if ($result && $result->num_rows > 0) {
    while ($fieldinfo = $result->fetch_field()) {
        echo "<th>" . $fieldinfo->name . "</th>";
    }
    echo "</tr></thead><tbody>";

    // Afficher les lignes de données
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $val) {
            echo "<td>" . $val . "</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<tr><td colspan='6'>Aucun étudiant trouvé.</td></tr></table>";
}

$mysqli->close();
?>
