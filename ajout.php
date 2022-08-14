<?php
require 'ajout_trait.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="color.css">
    <title> ajouter un article </title>
</head>

<?php
if (!isset($_SESSION['user'])) {
    header('Location:inscription.php');
}
?>

<body>
    <section>
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Bienvenue dans la partie placement de produit</h2>
            <div class="connecter">
                <input type="text" name="nom" placeholder="nom du produit">
            </div>
            <div class="connecter">
                <input type="file" name="photo" accept="jpg, jpeg, png">
            </div>
            <div class="connecter">
                <input type="number" name="prix" placeholder="prix du produit">
            </div>
            <div class="connecter">
                <input type="text" name="type" placeholder="type de produit">
            </div>
            <div class="connecter">
                <input type="number" name="numero" placeholder="numero de telephone">
            </div>
            <div class="connecter">
                <textarea name="desc" placeholder="descripion produit" cols="30" rows="10"></textarea>
            </div>
            <div class="envoyer">
                <button type="submit" name="valider">Publier</button>
            </div>

        </form>
    </section>


</body>

</html>