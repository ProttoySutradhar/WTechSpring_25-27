<?php
include "../Controller/RegistrationController.php";
echo "<h1>Registration Page</h1><br>";
?>
<!DOCTYPE html>
<html>
    <head><Script src="../Controller/JS/CheckUserName.js"></Script></head>
    <body>
        <form method="post" action="../Controller/RegistrationController.php">
            <table>
                <tr>
                    <td><label for="username">User Name: </label></td>
                    <td><input type="text" id="name" name="name" onkeyup=CheckUserName()> <?php echo $name ?></td>
                    <td><p id="userresponse"></p></td>
                </tr>
                <tr>
                    <td><label for="password">Password: </label></td>
                    <td><input type="password" id="pass" name="password"> <?php echo $password ?></td>
                </tr>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input type="text" id="email" name="email"> <?php echo $email ?></td>
                </tr>
                <tr>
                    <td><label for="gender">Gender: </label></td>
                    <td>
                        <select name="gender" id="gender">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" id="submitbutton" name="submit"></td>
                </tr>
            </table>
        </form>
        <a href="Login.php">Already Registered? Login Here</a>
    </body>
</html>
