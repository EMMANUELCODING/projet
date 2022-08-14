<?php
require 'config.php';
$requet = $bdd->prepare('SELECT * FROM produit');
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
    $requet = $bdd->query('SELECT * FROM produit WHERE  nom LIKE "%' . $search . '%" ORDER BY matricule DESC');

    if ($requet->rowCount() > 0) {
?>
        <div class="nouveau">
            <h2>Articles Trouver</h2>
        </div>
        <article class="articles">
            <?php while ($search = $requet->fetch()) {
            ?>
                <div class="article">
                    <div class="row">
                        <div class="img">
                            <img src="uploads/avatar/<?= $search['photo']  ?>" alt="">
                        </div>
                        <div class="description">
                            <h2><?= $search['nom'] ?> </h2>
                            <p><?= substr($search['description'], 0, 75) ?></p>
                        </div>
                        <div class="acheter">
                            <h2><?= $search['prix'] ?> FCFA</h2>
                            <button type="submit">Interesser</button>
                        </div>
                    </div>

                </div>
            <?php
            }
            ?>
        </article>
<?php
    }
} else {
    echo 'champ vide';
}

?>


<?php
/*
<?php

function search($result)
{
    if (require 'config.php') {
        if (isset($_GET['search'])) {
            $result = htmlspecialchars($_GET['search']);
            $req = $bdd->prepare('SELECT * FROM produit WHERE');
            $req->execute();
            if ($req->rowCount() > 0) {
                $data = $req->fetch();
                $nom = $data['nom'];
                $type = $data['type'];
                if ($result == $nom) {
                    $requette = $bdd->query('SELECT * FROM produit WHERE nom = "' . $result . '"');
                    $requette->execute(array($result));
                    $search = $requette->fetchAll(PDO::FETCH_OBJ);
                    return $search;
                } elseif ($result == $type) {
                    $requette = $bdd->query('SELECT * FROM produit WHERE type = "' . $result . '"');
                    $requette->execute(array($result));
                    $search = $requette->fetchAll(PDO::FETCH_OBJ);
                    return $search;
                } else {
                    echo 'aucun article trouver';
                }
            }
        }
    }
}

// JE SOUHAITE TROUVER UN PRODUIT PAR SON NOM SON TYPE

/* ALGORITHME

VERIFIER SUR UNE VALEUR EST RENTRER DANS LA BARRE DE RECHERCHE
ON STOCKE LA VALEUR ENTRER DANS LA BARRE DANS UNE VARIABLE $result
ON SELECTIONE TOUT LES PRODUIT GRACE A UNE REQUETTE
SI IL EXISTE DES PRODUITS JE RECUPERE LES DONEES DES PRODUITS DANS DES VARIABLES $nom , $type GRACE A FETCH
SI LA VARIABLE ENTRER DANS LA BARRE DE RECHERCHE EGALE A $nom ON FAIT UNE REQUETTE QUI VA SELECTIONNER TOUT LES PRODUIT DONT LE OU LE NOM EST EGALE A $result
ON L'EXECUTE ET ON FAIT UN FETCH_OBJ PUIS ON RETOUNE LES DONNEES
SINON SI LA VARIABLE ENTRER DANS LA BARRE DE RECHERCHE EST EGALE A $type ON FAIT UNE REQUETTE QUI VA SELECTIONER TOUT LES PRODUITS DONT LE TYPE EST EGALE A $result
SINON ON N'ECRIRE RECHERCHE VIDE */
?>