<?php
session_start();
function ajouter($id_vendeur, $nom, $newimages, $prix, $type, $numero, $descr)
{
    if (require('config.php')) {
        $req = $bdd->prepare("INSERT INTO produit(id_vendeur , nom, photo, prix, type, num_tel, description)VALUES($id_vendeur ,'$nom', '$newimages', $prix,' $type', '$numero', '$descr')");
        $req->execute(array($id_vendeur, $nom, $newimages, $prix, $type, $numero, $descr));
    }
}
function type()
{
    if (require 'config.php') {
        $req = $bdd->prepare('SELECT DISTINCT type FROM produit');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
}

function afficher()
{
    if (require('config.php')) {
        $req = $bdd->prepare('SELECT * FROM produit ORDER BY matricule DESC');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
}
