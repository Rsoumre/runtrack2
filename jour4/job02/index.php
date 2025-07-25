<form method="get">
    <input type="text" name="Prenom" placeholder="Prénom">
    <input type="text" name="Nom" placeholder="Nom">
    <input type="submit" value="Envoyer" style = "background-color : link ; color : color ; white:
     padding: 10px; border: none; border-radius: 5px;" >
</form>

<!-- Traitement et affichage du tableau -->
<?php if (isset($_GET) && count($_GET) > 0): ?>
    <table border="1">
        <thead>
            <tr>
                <th>Argument</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_GET as $argument => $valeur): ?>
                <tr>
                    <td><?= htmlspecialchars($argument) ?></td>
                    <td><?= htmlspecialchars($valeur) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
