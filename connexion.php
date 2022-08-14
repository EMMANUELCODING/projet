<?php
require 'connexion_traitement.php';
?>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="color.css">
    <title>connexion</title>
</head>

<body>
    <section>
        <form action="connexion_traitement.php" method="post">
            <h2>Se Connecter</h2>
            <div class="connecter">
                <input class="input" type="email" name="email" placeholder="email">
            </div>
            <div class="connecter">
                <input type="password" name="password" placeholder="mot de passe">
            </div>
            <div class="envoyer">
                <button type="submit" name="submit">Connexion</button>
            </div>
            <div class="recommendation">
                <p>Je n'ai pas de compte. <a href="inscription.php">Je m'en crée un.</a></p>
            </div>
        </form>
    </section>
</body>

</html>