<form method="get">
    <label for="nombre">Entrez un nombre :</label><br>
    <input type="text" id="nombre" name="nombre" placeholder="Ex : 42"><br><br>
    <input type="submit" value="Vérifier">
</form>

<?php
if (isset($_GET["nombre"])) {
    $nombre = $_GET["nombre"];

    if (is_numeric($nombre)) {
        if ($nombre % 2 == 0) {
            echo "Nombre pair";
        } else {
            echo "Nombre impair";
        }
    } else {
        echo "Ce n'est pas un nombre valide.";
    }
}
?>
