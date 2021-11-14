<!-- ------------------------DEBUGGEUR-------------------------- -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>ShopBikes</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/public/css/logincss.css" />

</head>

<body>

    <p>depart html</p>
    <?php


    class Connect
    {
        protected function dbConnect()
        {
            $bdd = new PDO('mysql:host=localhost;dbname=MyShopBikes;charset=utf8', 'fabino', 'MonopolI');
            return $bdd;
        }
    }
    class UsersManager extends Connect
    {

        public function getAllUsers()

        {
            $bdd = $this->dbConnect();
            $requete = $bdd->prepare("SELECT * FROM users");
            $requete->execute(array());
            return $requete;
        }

        public function getOneUser($id)
        {
            $bdd = $this->dbConnect();
            $requete = $bdd->prepare("SELECT * FROM users WHERE id = $id");
            $requete->execute(array());
            return $requete;
        }

        public function createOneUser($username, $email, $password, $admin)
        {
            $password = sha1($password . "d7f") . "r9h";

            $bdd = $this->dbConnect();
            $requete = $bdd->prepare('INSERT INTO users(username, email, password, created_date, admin) VALUES(?, ?, ?,NOW(),?)');
            $requete->execute(array($username, $email, $password, $admin));
            return $requete;
        }

        public function updateOneUser($id, $username, $email, $password, $admin)
        {
            $password = sha1($password . "d7f") . "r9h";
            $bdd = $this->dbConnect();
            $requete = $bdd->prepare("UPDATE users 
                                  SET username = ? , email = ? , password = ? , admin = ? 
                                  WHERE id = ?");
            $requete->execute(array($username, $email, $password, $admin, $id));
        }

        public function deleteOneUser($id)
        {
            $bdd = $this->dbConnect();
            $requete = $bdd->prepare("DELETE FROM users WHERE id = $id");
            $requete->execute(array());
        }

        public function getEmail($id)
        {
            $bdd = $this->dbConnect();
            $requete = $bdd->prepare("SELECT email FROM users WHERE id = $id");
            $requete->execute(array());
            return $requete->fetch();
        }
    }





    class LoginManager extends Connect

    {
        public function emailVerify($email)
        {
            $bdd = $this->dbConnect();
            $requete = $bdd->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
            $requete->execute(array($email));
            return $requete->fetch();
        }

        public function passwordVerify($email)
        {
            $bdd = $this->dbConnect();
            $requete = $bdd->prepare('SELECT * FROM users WHERE email = ?');
            $requete->execute(array($email));
            return $requete;
        }

        public function addUser($username, $email, $password)
        {
            $bdd = $this->dbConnect();
            $requete = $bdd->prepare('INSERT INTO users(username, email, password, created_date, admin) VALUES(?, ?, ?,NOW(),0)');
            $requete->execute(array($username, $email, $password));
            return $requete;
        }
    }







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




    $getUser = new UsersManager();


    $user = $getUser->getOneUser(21);
    $arrayuser = $user->fetch();

    print_r($arrayuser);
    echo ($arrayuser['email']);

    $nbMail = new LoginManager();
    $emailVerify = $nbMail->emailVerify('w@wkk');

    var_dump($emailVerify[0]);

    if ($emailVerify[0] != 0) {

        echo ("email existe");
    }

    $getUser->updateOneUser('21', 'ggggg', 'hib@njk', 'hhhhhhhhh', '0');

echo($_POST['username']." ". $_POST['email']."   ". $_POST['password']."  ". "admin=".$_POST['admin']);

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>ShopBikes</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
        <link rel="stylesheet" href="/public/css/logincss.css" />

    </head>

    <body>
        <h3 style="text-align:center">email must change.</h3>
        <table class="admin">
            <tr class="head">
                <td>id</td>
                <td>username</td>
                <td>email</td>
                <td>password</td>
                <td>created_at</td>
                <td>admin</td>
                <td>UPDATE</td>
            </tr>
           
                <form method="post" action="testvariables.php">
                    <tr>
                        <td>
                            <p><?php echo $id; ?></p>
                        </td>
                        <td> <input type="text" name="username" value='<?php echo $username; ?>' minlength="3" required /> </td>
                        <td> <input type="email" name="email" value='<?php echo $email; ?>' required /> </td>
                        <td> <input type="text" name="password" value='<?php echo $password; ?>' minlength="6" required /> </td>
                        <td>
                            <p><?php echo $created_date; ?>
                        </td>
                        <td> <input type="number" name="admin" min="0" max="1" value='<?php echo $admin; ?>' required /> </td>
                        <td><button class="buttonedit" type="submit"><i class="fas fa-check-circle" style="color:green; font-size:2.5em"></i></button></td>
                    </tr>
                </form>
          
        </table>

    </body>

    </html>


<?php

    // $user = $getUser->getOneUser(21);
    // $arrayuser = $user->fetch();

    // print_r ($arrayuser);
    // echo($arrayuser['email']);

    // if($arrayuser['email'] == 'w@wkk') {
    // echo("==================");
    // }


    //var_dump($user);



    ?>

