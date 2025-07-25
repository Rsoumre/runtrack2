<form method="get">
    <label for="largeur">Largeur :</label>
    <input type="text" id="largeur" name="largeur" placeholder="Ex : 10"><br>
    <label for="hauteur">Hauteur :</label>
    <input type="text" id="hauteur" name="hauteur" placeholder="Ex : 5"><br><br>
    <input type="submit" value="Construire la maison">
</form>

<?php
if (isset($_GET["largeur"]) && isset($_GET["hauteur"])) {
    $largeur = $_GET["largeur"];
    $hauteur = $_GET["hauteur"];

    if (is_numeric($largeur) && is_numeric($hauteur)) {
        $largeur = intval($largeur);
        $hauteur = intval($hauteur);

        // Toit
        for ($i = 0; $i < $largeur; $i++) {
            echo "^";
        }
        echo "<br>";

        // Corps
        for ($j = 0; $j < $hauteur; $j++) {
            echo "|";
            for ($i = 0; $i < $largeur - 2; $i++) {
                echo "_";
            }
            echo "|<br>";
        }
    } else {
        echo "Veuillez entrer des nombres valides.";
    }
}
?>
