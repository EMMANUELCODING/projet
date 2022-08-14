<?php
require 'ajout_trait.php';
function article()
{
    if (require 'config.php') {
        // si la matricule est rentrée en GET
        if (isset($_GET['matricule'])) {
            $matricule = $_GET['matricule'];
            // selectionne tout les produits dont la matricule est égale a $matricule
            $reqe = $bdd->query('DELETE FROM produit WHERE matricule ="' . $matricule . '" ');
        }
        // on recupere la matricule de l'utilisateur dans $id_vendeur
        $id_vendeur = $_SESSION['user'];
        // on recherche les produit qui on été poster par l'utilisateur
        $reqette = $bdd->query('SELECT * FROM produit WHERE id_vendeur = "' . $id_vendeur . '" ORDER BY matricule DESC');
        $reqette->execute(array($id_vendeur));
        $data = $reqette->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
}


function acheter($matricule)
{
    if (require 'config.php') {
        // on verifie si la matricule est entrée en GET
        if (isset($_GET['matricule']) && is_numeric($_GET['matricule'])) {
            $matricule = $_GET['matricule'];
            // je selectionne tout les produits
            $req = $bdd->prepare('SELECT * FROM produit WHERE matricule = ?');
            $req->execute(array($matricule));
            // si le produit avec la valeur de $matricule est trouver on l'affiche
            if ($req->rowCount() == 1) {
                $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $data;
            }
        } else {
            header('Location:black_market_vendeur.php');
        }
    }
}


function similaire()
{
    if (require 'config.php') {
        if (isset($_GET['matricule'])) {
            // $id cotient la valeur de la matricule en GET
            $id = htmlspecialchars($_GET['matricule']);
            //je selectionne le produit dont la matricule est entrée en GET
            $req = $bdd->prepare('SELECT * FROM produit WHERE matricule = "' . $id . '"');
            $req->execute(array($id));
            if ($req->rowCount() == 1) {
                $data = $req->fetch();
                // $simil recupere le type du produit entrée en GET
                $simil = $data['type'];
                // je recupere les produit dont le type == type du produit entrée en GET
                $similaires = $bdd->query('SELECT * FROM produit WHERE type = "' . $simil . '"ORDER BY matricule DESC LIMIT 6');
                $similaires->execute();
                $donnée = $similaires->fetchAll(PDO::FETCH_OBJ);
                return $donnée;
            }
        }
    }
}
