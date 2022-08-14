<?php
require 'commande.php';
require 'config.php';
if (isset($_SESSION['user'])) {
    if (isset($_POST['valider'])) {
        if (isset($_POST['nom']) && isset($_FILES['photo']) && isset($_POST['prix']) && isset($_POST['type']) && isset($_POST['numero']) && isset($_POST['desc'])) {
            if (!empty(isset($_POST['nom'])) && !empty(isset($_FILES['photo']['name'])) && !empty(isset($_POST['prix'])) && !empty(isset($_POST['type'])) && !empty(isset($_POST['numero'])) && !empty(isset($_POST['desc']))) {
                $id_vendeur = $_SESSION['user'];
                $nom = htmlspecialchars($_POST['nom']);
                $prix = htmlspecialchars($_POST['prix']);
                $type = htmlspecialchars($_POST['type']);
                $numero = htmlspecialchars($_POST['numero']);
                $descr = htmlspecialchars($_POST['desc']);
                $nomphoto = $_FILES['photo']['name'];
                $phototmp = $_FILES['photo']['tmp_name'];
                $taillephoto = $_FILES['photo']['size'];
                $extentionvalid = ['jpg', 'jpeg', 'png'];
                $imageextention = explode('.', $nomphoto);
                $imageextention = strtolower(end($imageextention));
                if (in_array($imageextention, $extentionvalid)) {
                    if ($taillephoto <= 1000000) {
                        $newimages = uniqid();
                        $newimages .= '.' . $imageextention;
                        move_uploaded_file($phototmp, 'uploads/avatar/' . $newimages);

                        try {
                            ajouter($id_vendeur, $nom, $newimages,  $prix, $type, $numero, $descr);
                        } catch (Exception $e) {
                            echo "erreur";
                        }

                        header('Location:black_market_vendeur.php');
                    }
                }
            }
        }
    }
}
