<form method="get">
    <input type="text" name="prenom" placeholder="Prénom">
    <input type="text" name="nom" placeholder="Nom">
    <input type="submit" value="Envoyer" style = "background-color: blue; color: ; color:
     white; padding: 8px; border: none; border-radius: 5px;" >
</form>

<?php
echo "Le nombre d'arguments GET envoyés est : " . count($_GET);
?>