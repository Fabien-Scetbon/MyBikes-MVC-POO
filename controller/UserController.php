<?php

require_once('model/UserManager.php');
require_once('model/LoginManager.php');


function getUsers()
{
    $getUsers = new UsersManager();
    $users = $getUsers->getAllUsers();
    require('view/admin/usersCrud.php');
}

function getUser($id)
{
    $getUser = new UsersManager();
    $user = $getUser->getOneUser($id);
    require('view/admin/userEdit.php');
}

function deleteUser($id)
{
    $getUser = new UsersManager();
    $user = $getUser->deleteOneUser($id);
    header('location: /indexAdmin.php?action=users');
    exit();
}

function updateUser($id, $username, $email, $password, $admin)
{
    $getUser = new UsersManager();
    $user = $getUser->getOneUser($id);

    $arrayUser = $user->fetch(); // recupere le mail du user edité, ne modifie pas $user qui reste PDO
    $emailUser = $arrayUser['email'];

    if ($emailUser == $email) { // si le mail n'est pas changé 

        $getUser->updateOneUser($id, $username, $email, $password, $admin);
        header('location: /indexAdmin.php?action=users');
        exit();
    } else { // si le mail change

        $nbMail = new LoginManager();
        $emailVerify = $nbMail->emailVerify($email);

        if ($emailVerify[0] != 0) {

            header('location: view/admin/userEdit.php?error=email');
            exit();
        }

        $getUser->updateOneUser($id, $username, $email, $password, $admin);
        header('location: /indexAdmin.php?action=users');
        exit();
    }
}

function createUser()
{
    require('view/admin/userCreate.php');
}

function insertUser($username, $email, $password, $admin)
{
    $getUser = new UsersManager();
    $nbMail = new LoginManager();
    $emailVerify = $nbMail->emailVerify($email);

    if ($emailVerify[0] != 0) {

        header('location: view/admin/userCreate.php?error=email');
        exit();
    }

    $getUser->createOneUser($username, $email, $password, $admin);
    header('location: /indexAdmin.php?action=users');
    exit();
}
