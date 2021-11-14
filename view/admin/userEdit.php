<?php
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['admin'] != 1) {
    header('location: /index.php');
    exit();
}
include_once("headerUser.php");

if (isset($_GET['error'])) {

    if (($_GET['error']) == 'email') {

        echo '<p id="error">email already exists.</p>';
    } 
}

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
        <?php
        while ($result = $user->fetch()) {

            $id               = htmlspecialchars($result['id']);
            $username         = htmlspecialchars($result['username']);
            $email            = htmlspecialchars($result['email']);
            $password         = htmlspecialchars($result['password']);
            $created_date     = htmlspecialchars($result['created_date']);
            $admin            = htmlspecialchars($result['admin']);

        ?>
            <form method="post" action="/indexAdmin.php?action=updateuser&amp;userId=<?php echo $id; ?>">
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
        <?php
        }
        $user->closeCursor();
        ?>
    </table>

</body>

</html>

