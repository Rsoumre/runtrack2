<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jour9";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête SQL pour récupérer nom et capacite de toutes les salles
$sql = "SELECT nom, capacite FROM salles";
$result = $conn->query($sql);

if ($result === false) {
    die("Erreur dans la requête SQL : " . $conn->error);
}

// Affichage du tableau HTML
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    
    // En-tête
    echo "<thead><tr>";
    $fields = $result->fetch_fields();
    foreach ($fields as $field) {
        echo "<th>" . htmlspecialchars($field->name) . "</th>";
    }
    echo "</tr></thead>";

    // Corps
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";

    echo "</table>";
} else {
    echo "Aucune salle trouvée dans la base de données.";
}

$conn->close();
?>
