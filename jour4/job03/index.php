<form method="post">
    <input type="text" name="Prenom" placeholder="Prénom">
    <input type="text" name="Nom" placeholder="Nom">
    <input type="submit" value="Envoyer">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombreArguments = count($_POST);
    echo "Le nombre d'arguments POST envoyés est : " . $nombreArguments;
}
?>