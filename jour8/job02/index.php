<?php
// ----- GESTION DU COOKIE NBVISITES -----
if (isset($_POST['reset'])) {
    // Si le bouton Reset est cliqué, on remet le cookie à 0
    setcookie('nbvisites', 0, time() + 3600); // expire dans 1 heure
    $_COOKIE['nbvisites'] = 0; // pour affichage immédiat
} else {
    if (!isset($_COOKIE['nbvisites'])) {
        // Si le cookie n'existe pas encore, on le crée à 1
        setcookie('nbvisites', 1, time() + 3600);
        $_COOKIE['nbvisites'] = 1;
    } else {
        // Sinon, on incrémente sa valeur
        $newCount = $_COOKIE['nbvisites'] + 1;
        setcookie('nbvisites', $newCount, time() + 3600);
        $_COOKIE['nbvisites'] = $newCount;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compteur de visites - Cookie</title>
</head>
<body>
    <h1>Nombre de visites (cookie) : <?php echo $_COOKIE['nbvisites']; ?></h1>

    <form method="post">
        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>
