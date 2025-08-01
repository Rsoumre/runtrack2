<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "jour9");

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

// Requête SQL : nombre total d'étudiants
$query = "SELECT COUNT(*) AS nb_etudiants FROM étudiants";
$result = $mysqli->query($query);

// Affichage du résultat dans un tableau HTML
echo "<table border='1'>";
echo "<thead><tr><th>nb_etudiants</th></tr></thead><tbody>";

if ($result && $row = $result->fetch_assoc()) {
    echo "<tr><td>" . htmlspecialchars($row['nb_etudiants']) . "</td></tr>";
} else {
    echo "<tr><td>Erreur</td></tr>";
}

echo "</tbody></table>";

// Fermeture de la connexion
$mysqli->close();
?>
