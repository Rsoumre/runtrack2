<form method="post">
    <label for="username">USERNAME</label><br>
    <input type="text" id="username" name="username" placeholder="username"><br><br>
    <label for="password">PASSWORD</label><br>
    <input type="text" id="password" name="password" placeholder="password"><br><br>
    <input type="submit" value="Envoyer"  style = "background-color: orange; color: ; color:
     white; padding: 8px; border: none; border-radius: 5px;">
</form>

<?php
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "John" && $password === "Rambo") {
        echo "C'est pas ma guerre";
    } else {
        echo "Votre pire cauchemar";
    }
}
?>
