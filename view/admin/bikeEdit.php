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
        <td>id</td>
        <td>name</td>
        <td>price</td>
        <td>image URL</td>
        <td>description</td>
        <td>category</td>
        <td>UPDATE</td>
    </tr>
    <?php
    while ($result = $bike->fetch()) {

        $id             = htmlspecialchars($result['id']);
        $name           = htmlspecialchars($result['name']);
        $price          = htmlspecialchars($result['price']);
        $image          = htmlspecialchars($result['image']);
        $description    = htmlspecialchars($result['description']);
        $category_name  = htmlspecialchars($result['category_name']);

    ?>
        <form method="post" action="/indexAdmin.php?action=updatebike&amp;bikeId=<?php echo $id; ?>">
            <tr>
                <td>
                    <p><?php echo $id; ?></p>
                </td>
                <td> <input type="text" name="name" value='<?php echo $name; ?>' minlength="3" required /> </td>
                <td> <input type="text" name="price" value='<?php echo $price; ?>' required /> </td>
                <td> <input type="text" name="image" value='<?php echo $image; ?>' required /> </td>
                <td> <input type="text" name="description" value='<?php echo $description; ?>' required /> </td>
                <td style="text-align: center">
                    <label style="font-size:0.9em"><?php echo $category_name . "<br>"; ?></label>

                    <select style="margin:0.7em" name="category_name">

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
    <?php
    }
    $bike->closeCursor();
    ?>
</table>

</body>

</html>