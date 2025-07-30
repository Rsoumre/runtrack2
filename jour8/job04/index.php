<?php
// Si les données sont envoyées, on les enregistre dans des cookies
if (isset($_POST['prenom']) && isset($_POST['nom'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);

    // Création des cookies valables 1 heure
    setcookie('prenom', $prenom, time() + 3600);
    setcookie('nom', $nom, time() + 3600);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Job 04 - Cookies</title>
</head>
<body>
    <h2>Formulaire</h2>
    <form action="" method="post">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="text" name="nom" placeholder="Nom">
        <input type="submit" value="Envoyer">
    </form>

    <h2>Données sauvegardées :</h2>
    <p>
        <?php
        if (isset($_COOKIE['prenom']) && isset($_COOKIE['nom'])) {
            echo "Bonjour " . $_COOKIE['prenom'] . " " . $_COOKIE['nom'] . " !";
        } else {
            echo "Aucune information enregistrée.";
        }
        ?>
    </p>
</body>
</html>