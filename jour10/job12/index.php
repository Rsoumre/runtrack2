<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "jour9");

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

// Requête SQL : étudiants nés entre 1998 et 2018
$query = "SELECT prenom, nom, naissance FROM étudiants WHERE naissance BETWEEN '1998-01-01' AND '2018-12-31'";
$result = $mysqli->query($query);

// Affichage du résultat dans un tableau HTML
echo "<table border='1'>";
echo "<thead><tr><th>Prénom</th><th>Nom</th><th>Date de naissance</th></tr></thead><tbody>";

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['naissance']) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Aucune donnée</td></tr>";
}

echo "</tbody></table>";

// Fermeture de la connexion
$mysqli->close();
?>
