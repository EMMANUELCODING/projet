<?php
session_start();
require 'config.php';

if (isset($_POST['submit'])) {

    if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars(($_POST['password']));

        $check = $bdd->prepare('SELECT * FROM vendeur WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if ($row == 1) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $password = hash('sha256', $password);
                if ($data['password'] === $password) {
                    $_SESSION['user'] = $data['id'];
                    $_SESSION['name_users'] = $data['nom'];
                    $_SESSION['name_type'] = $data['type'];
                    header('Location:black_market_vendeur.php');
                }
            }
        } else {
        }
    } else {
        header('Location:connexion.php');
    }
}
