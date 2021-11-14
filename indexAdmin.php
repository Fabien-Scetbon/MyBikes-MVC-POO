<?php

session_start();

// Middleware admin
if (!isset($_SESSION['connect']) || $_SESSION['admin'] != 1) {
    header('location: /index.php');
    exit();
}

require_once('controller/UserController.php');
require_once('controller/BikeController.php');

try {
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'bikes') {

            getBikes();
            //
        } elseif ($_GET['action'] == 'users') {

            getUsers();
            //
        } elseif ($_GET['action'] == 'edit') {

            if (isset($_GET['bikeId'])) {

                $id = (int)($_GET['bikeId']);  // transform string in integer

                getBike($id);
                //
            } elseif (isset($_GET['userId'])) {

                $id = (int)($_GET['userId']);  
                getUser($id);
                //
            } else {

                getBikes();
            }
        } elseif ($_GET['action'] == 'delete') {

            if (isset($_GET['bikeId'])) {

                $id = (int)($_GET['bikeId']);

                deleteBike($id);
                //
            } elseif (isset($_GET['userId'])) {

                $id = (int)($_GET['userId']);

                deleteUser($id);
                //
            } else {

                getBikes();
            }
        } elseif ($_GET['action'] == 'updatebike') {

            if (isset($_GET['bikeId'])) {

                $id = (int)($_GET['bikeId']);

                updateBike($_GET['bikeId'], $_POST['name'], $_POST['price'], $_POST['image'], $_POST['description'], $_POST['category_name']);
            } else {

                getBikes();
            }
        } elseif ($_GET['action'] == 'createbike') {

            createBike();
            //
        } elseif ($_GET['action'] == 'insertbike') {

            insertBike($_POST['name'], $_POST['price'], $_POST['image'], $_POST['description'], $_POST['category_name']);  // $_POST['category_name']
        } elseif ($_GET['action'] == 'updateuser') {

            if (isset($_GET['userId'])) {

                $id = (int)($_GET['userId']);

                updateUser($_GET['userId'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['admin']);
            } else {

                getUsers();
            }
        } elseif ($_GET['action'] == 'createuser') {

            createUser();
            //
        } elseif ($_GET['action'] == 'insertuser') {

            insertUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['admin']);
            //
        } elseif ($_GET['action'] == 'createcategory') {

            createCategory();
            //
        } elseif ($_GET['action'] == 'insertcategory') {

            insertCategory($_POST['category_name']);
            //
        } elseif ($_GET['action'] == 'deletecategory') {
            if (isset($_GET['categoryId'])) {

                $id = (int)($_GET['categoryId']);
                deleteCategory($_GET['categoryId']);
            } else {
                createCategory();
            }
        }
    } else {

        getBikes();
    }
} catch (Exception $e) {

    $errorMessage = $e->getMessage();
    echo ($errorMessage);
}
