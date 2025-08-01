<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "jour9");

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

// Requête SQL pour calculer la capacité moyenne
$query = "SELECT AVG(capacite) AS capacite_moyenne FROM salles";
$result = $mysqli->query($query);

// Affichage du résultat dans un tableau HTML
echo "<table border='1'>";
echo "<thead><tr><th>capacite_moyenne</th></tr></thead><tbody>";

if ($result && $row = $result->fetch_assoc()) {
    echo "<tr><td>" . round($row['capacite_moyenne'], 2) . "</td></tr>";
} else {
    echo "<tr><td>Aucune donnée</td></tr>";
}

echo "</tbody></table>";

// Fermeture de la connexion
$mysqli->close();
?>
