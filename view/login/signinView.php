<?php
include_once("headerin.php");
?>

<div class="container">
<?php
    if(isset($_GET['error'])) {

        if(($_GET['error']) == 'email') {

    echo'<p id="error">Connexion impossible -mail-.</p>';

    } else if(($_GET['error']) == 'password') {

    echo'<p id="error">Connexion impossible -mdp-.</p>';

    }
    }
?>

    <form method="post" action="/index.php?action=validsignin"> <!-- / devant index important -->
        <table>

            <tr>
                <td>Email</td>
                <td><input type="email" name="email" placeholder="Ex : fabino@gmail.com" required /></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="password" name="password" placeholder="Ex : ******" required /></td>
            </tr>

        </table>

        <button class="buttonlogin" type="submit">Signin</button>
    </form>

</div>
</body>

</html>