<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>localhost</title>
    <?php
    $style = isset($_GET['style']) ? $_GET['style'] : 'style1.css';
    ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($style) ?>">
</head>
<body>
    <h1>Changer le style de la page</h1>

    <form method="get">
        <label for="style">Choisissez un style :</label>
        <select name="style" id="style">
            <option value="style1.css" <?= $style == 'style1.css' ? 'selected' : '' ?>>Style 1</option>
            <option value="style2.css" <?= $style == 'style2.css' ? 'selected' : '' ?>>Style 2</option>
            <option value="style3.css" <?= $style == 'style3.css' ? 'selected' : '' ?>>Style 3</option>
        </select>
        <input type="submit" value="Changer le style">
    </form>

    <p>Le style actuel est : <strong><?= htmlspecialchars($style) ?></strong></p>
</body>
</html>
