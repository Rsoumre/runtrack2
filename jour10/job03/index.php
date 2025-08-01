<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jour9";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Utilise 'Femme' si tes données contiennent 'Femme' au lieu de 'F'
$sql = "SELECT prenom, nom, naissance FROM `étudiants` WHERE sexe = 'Femme'";
$result = $conn->query($sql);

if ($result === false) {
    die("Erreur SQL : " . $conn->error);
}

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<thead><tr>";
    $fields = $result->fetch_fields();
    foreach ($fields as $field) {
        echo "<th>" . htmlspecialchars($field->name ?? '') . "</th>";
    }
    echo "</tr></thead><tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value ?? '') . "</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "Aucune étudiante trouvée.";
}

$conn->close();
?>
