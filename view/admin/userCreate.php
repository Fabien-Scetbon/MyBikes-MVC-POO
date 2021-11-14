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

<table class="admin">
    <tr class="head">
        <td>username</td>
        <td>email</td>
        <td>password</td>
        <td>admin</td>
        <td>CREATE</td>
    </tr>

    <form method="post" action="/indexAdmin.php?action=insertuser">
        <tr>
            <td> <input type="text" name="username" minlength="3" required /> </td>
            <td> <input type="email" name="email" required /> </td>
            <td> <input type="password" name="password" minlength="6" required /> </td>
            <td> <input type="number" min="0" max="1" name="admin" required /> </td>
            <td><button class="buttonedit" type="submit"><i class="fas fa-check-circle" style="color:green; font-size:2.5em"></i></button></td>
        </tr>
    </form>

</table>

</body>

</html>