<?php
include_once("headerup.php");
?>
<div class="container">
    <?php
    if (isset($_GET['error'])) {

        if (($_GET['error']) == 'email') {

            echo '<p id="error">Email already exists.</p>';
        } else if (($_GET['error']) == 'password') {

            echo '<p id="error">Passwords don\'t match.</p>';
        }
    }
    ?>

    <form method="post" action="/index.php?action=validsignup">
        <!-- / devant index important -->
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" placeholder="Ex : Fabino" minlength="3" required /></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="email" name="email" placeholder="Ex : fabino@gmail.com" required /></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="password" name="password" placeholder="Ex : ******" minlength="6" required /></td>
            </tr>

            <tr>
                <td>Confirm password</td>
                <td><input type="password" name="password_confirm" placeholder="Ex : ******" required /></td>
            </tr>
        </table>

        <button class="buttonlogin" type="submit">Signup</button>
    </form>
</div>
</body>

</html>