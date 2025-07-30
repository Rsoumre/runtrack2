<?php
session_start(); // démarre la session

// S'assurer que $_SESSION['prenom'] est un tableau
if (!isset($_SESSION['prenom']) || !is_array($_SESSION['prenom'])) {
    $_SESSION['prenom'] = [];
}

// Ajouter un prénom si soumis
if (isset($_POST['prenom']) && $_POST['prenom'] !== '') {
    $prenom = htmlspecialchars($_POST['prenom']);
    $_SESSION['prenom'][] = $prenom;
}

// Réinitialiser la liste
if (isset($_POST['reset'])) {
    $_SESSION['prenom'] = [];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Job 03 - Prénoms en session</title>
</head>
<body>
    <h2>Ajouter un prénom</h2>
    <form action="" method="post">
        <input type="text" name="prenom" placeholder="prenom">
        <input type="submit" value="Envoyer">
    </form>

    <h2>Liste des prénoms :</h2>
    <ul>
        <?php
        foreach ($_SESSION['prenom'] as $p) {
            echo "<li>$p</li>";
        }
        ?>
    </ul>

    <form action="" method="post">
        <button type="submit" name="reset">Réinitialiser</button>
    </form>
</body>
</html>
