<?php
require 'ajout_trait.php';
require 'config.php';
require 'bars_trait.php';
$produit = afficher();
$type = type();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="color.css">
    <title>Black_market</title>
</head>

<body>
    <div class="entete">
        <p>Achetez tout et faite vous plaisiiir</p>
    </div>
    <header>
        <div class="logo">
            <h2>Black<span>Market</span></h2>
            <div class="image">
                <img src="images/basket-shopping-solid.svg" alt="">
            </div>
        </div>
        <div class="icone">
            <img src="images/bars-solid.svg" class="bars" alt="">
            <img src="images/bars-staggered-solid.svg" class="croix" alt="">
        </div>
        <div class="navbar">
            <a href="inscription.php"> crée un compte vendeur</a>
        </div>
    </header>
    <section class="recherche">
        <form action="" method="GET">
            <input type="search" name="search" placeholder="Recherche">
            <button type="submit" name="valider"><img src="images/magnifying-glass-solid.svg" alt=""></button>
            <select name="type_produit" class="type_articles">
                <option value="">TOUT LES PRODUITS</option>
                <?php
                foreach ($type as $typ) { ?>
                    <option value=""><?= $typ->type ?></option>
                <?php
                }
                ?>
            </select>
        </form>
    </section>
    <?php
    // J'affiche ici le traitement de bar_trait.php 
    require_once 'bars_trait.php'
    ?>

    <div class="nouveau">
        <h2>Nouveaux Articles</h2>
    </div>
    <article class="articles">
        <?php foreach ($produit as $produi) : ?>
            <div class="article">
                <div class="row">
                    <div class="img">
                        <img src="uploads/avatar/<?= $produi->photo ?>" alt="">
                    </div>
                    <div class="description">
                        <h2><?= $produi->nom ?> </h2>
                        <p><?= substr($produi->description, 0, 75) ?></p>
                    </div>
                    <div class="acheter">
                        <h2><?= $produi->prix ?> FCFA</h2>
                        <a href="interesser.php?matricule=<?= $produi->matricule ?>" class="btn">Interesser</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </article>
    <script src="main.js"></script>
</body>

</html>