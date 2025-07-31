<?php
session_start();

// Réinitialisation
if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Initialisation
if (!isset($_SESSION['grid'])) {
    $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, ''));
    $_SESSION['turn'] = 'X';
    $_SESSION['winner'] = null;
}

// Jouer un coup
if (isset($_POST['row']) && isset($_POST['col']) && $_SESSION['winner'] === null) {
    $r = $_POST['row'];
    $c = $_POST['col'];
    if ($_SESSION['grid'][$r][$c] === '') {
        $_SESSION['grid'][$r][$c] = $_SESSION['turn'];
        if (checkWinner($_SESSION['grid'], $_SESSION['turn'])) {
            $_SESSION['winner'] = $_SESSION['turn'];
        } elseif (isFull($_SESSION['grid'])) {
            $_SESSION['winner'] = 'draw';
        } else {
            $_SESSION['turn'] = ($_SESSION['turn'] === 'X') ? 'O' : 'X';
        }
    }
}

// Vérifie la victoire
function checkWinner($g, $p) {
    for ($i = 0; $i < 3; $i++) {
        if ($g[$i][0] === $p && $g[$i][1] === $p && $g[$i][2] === $p) return true;
        if ($g[0][$i] === $p && $g[1][$i] === $p && $g[2][$i] === $p) return true;
    }
    return ($g[0][0] === $p && $g[1][1] === $p && $g[2][2] === $p) ||
           ($g[0][2] === $p && $g[1][1] === $p && $g[2][0] === $p);
}

// Vérifie si la grille est pleine
function isFull($g) {
    foreach ($g as $row) {
        foreach ($row as $cell) {
            if ($cell === '') return false;
        }
    }
    return true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Morpion Simple</title>
    <style>
        body { text-align: center; font-family: Arial; margin-top: 40px; }
        table { margin: auto; border-collapse: collapse; }
        td {
            width: 80px; height: 80px;
            border: 2px solid #444;
            font-size: 2rem;
        }
        form { display: inline; }
        
        .reset-btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Jeu du Morpion</h1>

    <?php if ($_SESSION['winner'] === 'draw'): ?>
        <h2>Match nul !</h2>
    <?php elseif ($_SESSION['winner']): ?>
        <h2><?php echo $_SESSION['winner']; ?> a gagné !</h2>
    <?php else: ?>
        <h2>Tour de : <?php echo $_SESSION['turn']; ?></h2>
    <?php endif; ?>

    <table>
        <?php for ($i = 0; $i < 3; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < 3; $j++): ?>
                    <td>
                        <?php if ($_SESSION['grid'][$i][$j] === '' && $_SESSION['winner'] === null): ?>
                            <form method="post">
                                <input type="hidden" name="row" value="<?php echo $i; ?>">
                                <input type="hidden" name="col" value="<?php echo $j; ?>">
                                <button type="submit" class="cell-btn">-</button>
                            </form>
                        <?php else: ?>
                            <?php echo $_SESSION['grid'][$i][$j]; ?>
                        <?php endif; ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

    <form method="post">
        <button type="submit" name="reset" class="reset-btn">Rejouer</button>
    </form>
</body>
</html>
