<?php
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['admin'] != 1) {
    header('location: /index.php');
    exit();
}
include_once("headerBike.php");
?>
<table class="admin2">
    <tr class="head">
        <td>id</td>
        <td>categories</td>
        <td>DEL.</td>

    </tr>

    <?php

    while ($datas = $categories->fetch()) {
    ?>
        <tr>
            <td>
                <p><?php echo htmlspecialchars($datas['id']); ?></p>
            </td>
            <td>
                <p><?php echo htmlspecialchars($datas['category_name']); ?></p>
            </td>
            <td class="icon2"><a href="/indexAdmin.php?action=deletecategory&amp;categoryId=<?php echo $datas['id']; ?>"><i class="fas fa-trash-alt" style="color:red"></i></a></td>
        </tr>
    <?php
    }

    $categories->closeCursor();
    ?>
</table>

<table class="admin">
    <tr class="head">
        <td>new category</td>
        <td>CREATE</td>
    </tr>

    <form method="post" action="/indexAdmin.php?action=insertcategory">
        <tr>
            <td> <input type="text" name="category_name" required /> </td>
            <td><button class="buttonedit" type="submit"><i class="fas fa-check-circle" style="color:green; font-size:2.5em"></i></button></td>
        </tr>
    </form>

</table>

</body>

</html>