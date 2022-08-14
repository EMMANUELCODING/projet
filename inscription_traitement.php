<?php
session_start();
require 'config.php';

if (isset($_POST['valider'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm']) && !empty($_POST['ville'])) {
        $nom =  htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirm = htmlspecialchars($_POST['confirm']);
        $ville = htmlspecialchars($_POST['ville']);

        $check = $bdd->prepare('SELECT * FROM vendeur WHERE email = ?');
        $check->execute(array($email));
        if ($check->rowCount() == 0) {

            if (strlen($nom) < 15) {
                if (strlen($prenom) < 25) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        if ($password === $confirm) {
                            $password = hash('sha256', $password);
                            $confirm = hash('sha256', $confirm);
                            $inserer = $bdd->prepare('INSERT INTO vendeur(nom, prenom, email, password, confirm, ville)VALUES(?, ?, ?, ?, ?, ?)');
                            $inserer->execute(array($nom, $prenom, $email, $password, $confirm, $ville));
                            header('Location:connexion.php?reg_error = succes');
                        } else {
                            header('Location:inscription.php?reg_err =password ');
                        }
                    } else {
                        header('Location:inscription.php?reg_err = prenom_length');
                    }
                } else {
                    header('Location:inscription.php?reg_err = name_length ');
                }
            } else {
                header('Location:inscription.php?reg_err = existe ');
            }
        } else {
            header('Location:inscription.php?reg_err = emptycase ');
        }
    } else {
        header('Location:inscription.php?reg_err = erreur ');
    }
}
