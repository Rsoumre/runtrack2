<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "jour9");

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

// Requête SQL : étudiants de moins de 18 ans
$query = "SELECT * FROM étudiants WHERE TIMESTAMPDIFF(YEAR, naissance, CURDATE()) < 18";
$result = $mysqli->query($query);

// Création du tableau HTML
echo "<table border='1'>";
echo "<thead><tr>";

// Affichage des noms de colonnes
if ($result && $result->num_rows > 0) {
    while ($field = $result->fetch_field()) {
        echo "<th>{$field->name}</th>";
    }
    echo "</tr></thead><tbody>";

    // Affichage des lignes
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value ?? '') . "</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<tr><td colspan='6'>Aucun étudiant de moins de 18 ans trouvé.</td></tr></table>";
}

// Fermeture de la connexion
$mysqli->close();
?>
