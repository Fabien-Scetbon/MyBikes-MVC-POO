<?php
require_once('model/LoginManager.php');

function validSignIn($email, $password)
{
    $password = sha1($password . "d7f") . "r9h";

    $loginManager = new LoginManager();

    $emailVerify = $loginManager->emailVerify($email);

        if ($emailVerify[0] != 1) {

            header('location: view/login/signinView.php?error=email');
            exit();
        }
    

    $passwordVerify = $loginManager->passwordVerify($email);

    while ($result = $passwordVerify->fetch()) {

        if ($result['password'] == $password) {

            $_SESSION['connect'] = 1;
            $_SESSION['username'] = $result['username'];
            $_SESSION['admin'] = $result['admin'];

            header('location:index.php');
            exit();
        } else {

            header('location: view/login/signinView.php?error=password');
            exit();
        }
    }
}

function validSignUp($username, $email, $password, $password_confirm)
{
    $loginManager = new LoginManager();

    if ($password != $password_confirm) {

        header('location: view/login/signupView.php?error=password');
        exit();
    }

    $emailVerify = $loginManager->emailVerify($email);

    if ($emailVerify[0] != 0) {

        header('location: view/login/signupView.php?error=email');
        exit();
    }

    // password crypt
    $password = sha1($password . "d7f") . "r9h";

    $loginManager->addUser($username, $email, $password);

    header('location: view/login/signinView.php');
    exit();
}

function disconnect()
{
    session_start(); // initialise la session avec un no id 
    // (ici déja crée lors de l'ouverture de la session identification)
    session_unset(); // desactive la session et genere un nouveau id session
    session_destroy(); // detruit ancien id

    header('location: /index.php');
    exit();
}
