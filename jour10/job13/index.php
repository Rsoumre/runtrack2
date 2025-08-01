<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "jour9");

if ($mysqli->connect_error) {
    die("Échec de la connexion : " . $mysqli->connect_error);
}

// Requête SQL avec JOIN pour récupérer le nom des salles et des étages
$query = "
    SELECT 
        salles.nom AS nom_salle, 
        étage.nom AS nom_étage
    FROM salles
    JOIN étage ON salles.id_étage = étage.id
";

$result = $mysqli->query($query);

// Affichage en tableau HTML
echo "<table border='1'>";
echo "<thead><tr><th>Nom de la salle</th><th>Nom de l’étage</th></tr></thead>";
echo "<tbody>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['nom_salle']) . "</td>";
    echo "<td>" . htmlspecialchars($row['nom_étage']) . "</td>";
    echo "</tr>";
}

echo "</tbody></table>";

$mysqli->close();
?>
