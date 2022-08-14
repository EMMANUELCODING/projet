<?php
require 'config.php';
require 'mes_articles_traitement.php';
// on défini la matricule en GET dans $matricule
$matricule = $_GET['matricule'];
$acheter = acheter($matricule);
// on fait un foreach des articles 
foreach ($acheter as $achet) {
    $photo = $achet->photo;
    $description = $achet->description;
    $prix = $achet->prix;
    $num = $achet->num_tel;
}
$id = $_GET['matricule'];
$similaire = similaire();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="color.css">
    <title>acheter</title>
</head>

<body>
    <article class="mon_article">
        <div class="titre">
            <h2>Je Suis Interessé</h2>
            <p>Faite attention l'orsque vous voulez acheter un article et soyez sur que vous recevrez vote produit avant d'envoyé de l'argent. </p>
        </div>
        <div class="images">
            <img src="uploads/avatar/<?= $photo ?>" alt="">
        </div>
        <div class="descri">
            <h2>description</h2>
            <h3><?= $description ?></h3>
        </div>
        <div class="prix">
            <h2><?= $prix ?> FCFA</h2>
            <h2>Me Contacter : <a href="tel:<?= $num ?>"><?= $num ?></a></h2>
        </div>
    </article>
    <article class="mon_article">
        <div class="titre">
            <h2>Article Similaire</h2>
        </div>
    </article>

    <section class="articles">
        <?php foreach ($similaire as $similair) : ?>
            <div class="article">
                <div class="row">
                    <div class="img">
                        <img src="uploads/avatar/<?= $similair->photo ?>" alt="">
                    </div>
                    <div class="description">
                        <h2><?= $similair->nom ?> </h2>
                        <p><?= substr($similair->description, 0, 75) ?></p>
                    </div>
                    <div class="acheter">
                        <h2><?= $similair->prix ?> FCFA</h2>
                        <a href="interesser.php?matricule=<?= $similair->matricule ?>" class="btn">Interesser</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

</body>

</html>