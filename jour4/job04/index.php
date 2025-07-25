<form method="post">
<input type = "text" name = "prenom" placeholder = "prenom">
<input type = "text" name = "nom" placeholder = "nom" >
<input type = "submit" value = "Envoyer">
 </form>
 
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && count($_POST) > 0) {
    echo "<table border='1'>";
    echo "<thead><tr><th>Argument</th><th>Valeur</th></tr></thead><tbody>";
    
    foreach ($_POST as $cle => $valeur) {
        echo "<tr><td>" . htmlspecialchars($cle) . "</td><td>" . htmlspecialchars($valeur) . "</td></tr>";
    }

    echo "</tbody></table>";
}
?>
