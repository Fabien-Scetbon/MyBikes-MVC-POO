<?php
                session_start();

if (!isset($_SESSION['connect']) || $_SESSION['admin'] != 1) {
    header('location: /index.php');
    exit();
}
include_once("headerBike.php");   

?>

<table class="admin">
    <tr class="head">
        <td>name</td>
        <td>price</td>
        <td>image URL</td>
        <td>description</td>
        <td>category</td>
        <td>CREATE</td>
    </tr>

    <form method="post" action="/indexAdmin.php?action=insertbike">
        <tr>
            <td> <input type="text" name="name" required /> </td>
            <td> <input type="text" name="price" required /> </td>
            <td> <input type="text" name="image" required /> </td>
            <td> <input type="text" name="description" required /> </td>

            <td>
                <select name="category_name">

                    <?php
                    while ($datas = $categories->fetch()) {
                    ?>
                        <option value="<?php echo $datas['category_name']; ?>"><?php echo $datas['category_name']; ?></option>

                    <?php }

                    ?>
                </select>
                <?php
                $categories->closeCursor();
                ?>
            </td>

            <td><button class="buttonedit" type="submit"><i class="fas fa-check-circle" style="color:green; font-size:2.5em"></i></button></td>
        </tr>
    </form>

</table>

</body>

</html>