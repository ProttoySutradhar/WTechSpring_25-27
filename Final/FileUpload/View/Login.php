<?php
session_start();
$isLoggedIn=$SESSION["loggedIn"] ?? false;
if($isLoggedIn)
    {
        Header("Location:Dashboard.php");
    }
?>

<!DOCTYPE html>
<html>
    <body>
        <form method ='post' action ="../Controller/loginvalidation.php">
            <?php
            echo "<h1 style='color: red'>LogIn Page</h1>";
            ?>
            <table>
                <tr>
                    <td> User Name: </td>
                    <td> <input type="text" name = "name"/></td>
                </tr>
                <tr>
                    <td> Password: </td>
                    <td > <input type ="password" name ="password"> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td>
                        <input type ="submit"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>