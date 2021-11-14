<?php
    session_start();

if (!isset($_SESSION['connect']) || $_SESSION['admin'] != 1) {
    header('location: /index.php');
    exit();
}
include_once("headerUser.php");

?>

<table class="admin">
    <tr class="head">
        <td>id</td>
        <td>username</td>
        <td>email</td>
        <td>password</td>
        <td>created_date</td>
        <td>admin</td>
        <td>EDIT</td>
        <td>DEL.</td>
    </tr>
    <?php
    while ($result = $users->fetch()) {
    ?>
        <tr>
            <td> <?php echo htmlspecialchars($result['id']); ?> </td>
            <td> <?php echo htmlspecialchars($result['username']); ?> </td>
            <td> <?php echo htmlspecialchars($result['email']); ?> </td>
            <td> <?php echo htmlspecialchars(substr($result['password'], 0, 15)) . "..."; ?> </td>
            <td> <?php echo htmlspecialchars($result['created_date']); ?> </td>
            <td class="icon2"> <?php echo htmlspecialchars($result['admin']); ?> </td>
            <td class="icon2"><a class="icon2" href="/indexAdmin.php?action=edit&amp;userId=<?php echo $result['id']; ?>"><i class="fas fa-edit" style="color:green"></i></a></td>
            <td class="icon2"> <a class="icon2" href="/indexAdmin.php?action=delete&amp;userId=<?php echo $result['id']; ?>"><i class="fas fa-trash-alt" style="color:red"></i></a></td>

        </tr>
    <?php
    }
    $users->closeCursor();
    ?>
</table>
</body>

</html>