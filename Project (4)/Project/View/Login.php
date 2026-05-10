<?php
session_start();
$isLoggedIn = $_SESSION["loggedIn"] ?? false;
if($isLoggedIn)
    {
        Header("Location:Dashboard.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <body>
        <form method="post" action="../Controller/Loginvalidation.php">
            <?php
            echo "<h1 style='color: red'>LogIn Page</h1>";
            ?>
            <table>
                <tr>
                    <td>User Name: </td>
                    <td><input type="text" name="name" value="<?php echo $_COOKIE['UserName'] ?? '' ?>"/></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" value="<?php echo $_COOKIE['Password'] ?? '' ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>
