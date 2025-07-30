<?php
session_start();

// Réinitialisation de la partie
if (isset($_POST['reset'])) {
    unset($_SESSION['grid']);
    unset($_SESSION['turn']);
}

// Initialisation de la grille et du joueur
if (!isset($_SESSION['grid'])) {
    $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['turn'] = 'X';
}

// Si un bouton est cliqué (case du morpion)
if (isset($_POST['row']) && isset($_POST['col'])) {
    $row = intval($_POST['row']);
    $col = intval($_POST['col']);

    // Si la case est vide
    if ($_SESSION['grid'][$row][$col] === '-') {
        $_SESSION['grid'][$row][$col] = $_SESSION['turn'];
        $_SESSION['turn'] = ($_SESSION['turn'] === 'X') ? 'O' : 'X';
    }
}

// Fonction pour vérifier la victoire
function checkWin($grid, $player) {
    for ($i = 0; $i < 3; $i++) {
        if ($grid[$i][0] === $player && $grid[$i][1] === $player && $grid[$i][2] === $player) return true;
        if ($grid[0][$i] === $player && $grid[1][$i] === $player && $grid[2][$i] === $player) return true;
    }
    if ($grid[0][0] === $player && $grid[1][1] === $player && $grid[2][2] === $player) return true;
    if ($grid[0][2] === $player && $grid[1][1] === $player && $grid[2][0] === $player) return true;
    return false;
}

// Fonction pour vérifier le match nul
function isFull($grid) {
    foreach ($grid as $row) {
        foreach ($row as $cell) {
            if ($cell === '-') return false;
        }
    }
    return true;
}

$winner = null;
if (checkWin($_SESSION['grid'], 'X')) {
    $winner = 'X';
} elseif (checkWin($_SESSION['grid'], 'O')) {
    $winner = 'O';
} elseif (isFull($_SESSION['grid'])) {
    $winner = 'Match nul';
    $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Job 05 - Morpion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f7f9fc;
            margin: 0;
            padding: 2rem;
        }

        h1 {
            color: #2c3e50;
        }

        h2 {
            color: #27ae60;
            margin-bottom: 1rem;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
        }

        td {
            width: 80px;
            height: 80px;
            border: 2px solid #34495e;
            font-size: 2rem;
            text-align: center;
            vertical-align: middle;
            background-color: white;
        }

        button {
            width: 100%;
            height: 100%;
            font-size: 2rem;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .reset-btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #e74c3c;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 6px;
        }

        .reset-btn:hover {
            background-color: #c0392b;
            width: 15%;
        }
    </style>
</head>
<body>
    <h1>Jeu du Morpion</h1>

    <?php if ($winner): ?>
        <h2><?php echo ($winner === 'Match nul') ? 'Match nul !' : $winner . ' a gagné !'; ?></h2>
        <?php
        // Réinitialise la partie après victoire ou match nul
        $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
        $_SESSION['turn'] = 'X';
        ?>
    <?php endif; ?>

    <form method="post">
        <table>
            <?php for ($i = 0; $i < 3; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j < 3; $j++): ?>
                        <td>
                            <?php if ($_SESSION['grid'][$i][$j] === '-'): ?>
                                <button type="submit" name="row" value="<?php echo $i; ?>">
                                    <input type="hidden" name="col" value="<?php echo $j; ?>">
                                    -
                                </button>
                            <?php else: ?>
                                <?php echo $_SESSION['grid'][$i][$j]; ?>
                            <?php endif; ?>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
    </form>

    <form method="post">
        <button class="reset-btn" type="submit" name="reset">Réinitialiser la partie</button>
    </form>
</body>
</html>
