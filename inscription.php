<?php
require 'inscription_traitement.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="color.css">
    <title>inscription</title>
</head>

<body>
    <section>
        <form action="inscription_traitement.php" method="post">
            <h2>Je me crée un compte</h2>


            <div class="inscri">
                <input type="text" name="nom" placeholder="nom" autocomplete="off">
            </div>
            <div class="inscri">
                <input type="text" name="prenom" placeholder="prenom" autocomplete="off">
            </div>
            <div class="inscri">
                <input type="email" name="email" placeholder="email" autocomplete="off">

            </div>
            <div class="inscri">
                <input type="password" name="password" placeholder="mot de passe" autocomplete="off">
            </div>
            <div class="inscri">
                <input type="password" name="confirm" placeholder="confirmez mot de passe" autocomplete="off">
            </div>
            <div class="inscri">
                <input type="text" name="ville" placeholder="ville" autocomplete="off">
            </div>

            <div class="envoyer">
                <button type="submit" name="valider">S'inscrire</button>
            </div>
            <div class="recommendation">
                <p>J'ai deja un compte. <a href="connexion.php"> se connecter.</a></p>
            </div>
        </form>
    </section>
</body>

</html>