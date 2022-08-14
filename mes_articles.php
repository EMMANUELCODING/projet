<?php
require 'mes_articles_traitement.php';
$produits = article();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="color.css">
    <title>Document</title>
</head>

<body>

    <div class="mes_articles">
        <h2>Mes articles</h2>
        <p>N'oubliez pas de supprimez votre article <br> Apres l'avoir vendu</p>
    </div>
    <article class="articles">
        <?php foreach ($produits as $produit) : ?>
            <div class="article">
                <div class="row">
                    <div class="img">
                        <img src="uploads/avatar/<?= $produit->photo ?>" alt="">
                    </div>
                    <div class="acheter">
                        <h2><?= $produit->nom ?> </h2>
                        <a href="mes_articles.php?matricule=<?= $produit->matricule ?>" class=" btn">Supprimer</a>
                    </div>

                </div>

            </div>
        <?php endforeach; ?>
    </article>

    <script src="main.js"></script>
</body>

</html>