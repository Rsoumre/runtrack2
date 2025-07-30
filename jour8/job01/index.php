<?php
// On démarre la session
session_start();

// Si le bouton reset a été cliqué, on remet le compteur à zéro
if (isset($_POST['reset'])) {
    $_SESSION['nbvisites'] = 0;
} else {
    // Sinon on incrémente la variable de session
    if (!isset($_SESSION['nbvisites'])) {
        $_SESSION['nbvisites'] = 1;
    } else {
        $_SESSION['nbvisites']++;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Job 01 - Session compteur</title>
</head>
<body>
    <h1>Nombre de visites : <?php echo $_SESSION['nbvisites']; ?></h1>

    <form method="post">
        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>
