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
        <td>EDIT</td>
        <td>DEL.</td>
    </tr>
    <?php
    while ($result = $bikes->fetch()) {
    ?>
        <tr>
            <td> <?php echo htmlspecialchars($result['id']); ?> </td>
            <td> <?php echo htmlspecialchars($result['name']); ?> </td>
            <td> <?php echo htmlspecialchars($result['price']) . " $"; ?> </td>
            <td> <?php echo htmlspecialchars($result['image']); ?> </td>
            <td> <?php echo htmlspecialchars(substr($result['description'], 0, 20)) . "..."; ?> </td>
            <td> <?php echo htmlspecialchars($result['category_name']); ?> </td>
            <td class="icon2"><a href="/indexAdmin.php?action=edit&amp;bikeId=<?php echo $result['id']; ?>"><i class="fas fa-edit" style="color:green"></i></a></td>
            <td class="icon2"><a href="/indexAdmin.php?action=delete&amp;bikeId=<?php echo $result['id']; ?>"><i class="fas fa-trash-alt" style="color:red"></i></a></td>
        </tr>
    <?php
    }
    $bikes->closeCursor();
    ?>
</table>
</body>

</html>