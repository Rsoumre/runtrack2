<form method="get">
    <label for="largeur">Largeur :</label>
    <input type="text" id="largeur" name="largeur" placeholder="Ex : 10"><br>
    <label for="hauteur">Hauteur :</label>
    <input type="text" id="hauteur" name="hauteur" placeholder="Ex : 5"><br><br>
    <input type="submit" value="Construire la maison">
</form>

<pre>
<?php
if (isset($_GET["largeur"]) && isset($_GET["hauteur"])) {
    $largeur = $_GET["largeur"];
    $hauteur = $_GET["hauteur"];

    if (is_numeric($largeur) && is_numeric($hauteur)) {
        $largeur = intval($largeur);
        $hauteur = intval($hauteur);

        if ($largeur % 2 == 0) {
            $largeur += 1; // Pour garder une symétrie dans le toit
        }

        // ----- TOIT -----
        $etoiles = 1;
        $espaces = floor($largeur / 2);

        for ($i = 0; $i < floor($largeur / 2) + 1; $i++) {
            echo str_repeat(" ", $espaces);
            echo "/";
            echo str_repeat("*", $etoiles);
            echo "\\";
            echo "\n";

            $espaces -= 1;
            $etoiles += 2;
        }

        // ----- CORPS -----
        for ($j = 0; $j < $hauteur; $j++) {
            echo "|";
            echo str_repeat(" ", $largeur);
            echo "|\n";
        }

        // ----- BASE -----
        echo "|";
        echo str_repeat("_", $largeur);
        echo "|\n";
    } else {
        echo "Veuillez entrer des nombres valides.";
    }
}
?>
</pre>
