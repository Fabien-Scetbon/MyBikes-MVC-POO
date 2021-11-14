<?php

session_start();

require('controller/DisplayController.php');
require('controller/LoginController.php');


try {

    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'page') {

            if (isset($_GET['pageId'])) {

                $page = (int)($_GET['pageId']);  // transform string in integer

                listBikesPage($page);

            } else {

                listBikespage(1);
            }
        } elseif ($_GET['action'] == 'search') {

            if (!empty($_POST['search'])) {

                $search = $_POST['search'];

                listBikesSearch($search);
            } else {

                listBikespage(1);
            }
        } elseif ($_GET['action'] == 'category') {

            if (!empty($_GET['search'])) {

                $search = $_GET['search'];

                listBikesCategory($search);
            } else {

                listBikespage(1);
            }
        

        } elseif ($_GET['action'] == 'validsignin') {

            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                validSignIn($_POST['email'], $_POST['password']);
            } else {
                throw new Exception('Error');
            }

        } elseif ($_GET['action'] == 'validsignup') {

            if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])) {
                validSignUP($_POST['username'], $_POST['email'], $_POST['password'], $_POST['password_confirm']);
            } else {
                throw new Exception('Error');
            }
        } elseif ($_GET['action'] == 'disconnect') {

            disconnect();

        } else {}
        
    } elseif ( isset($_SESSION['connect']) && $_SESSION['admin'] == 1 ) { 

        header('location: /indexAdmin.php');
        exit();
    
    } else {

        listBikespage(1);
    }

} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    echo ($errorMessage);
}


