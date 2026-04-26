<?php include "../Controller/Registrationvalidation.php";?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration in login form</title>
    </head>
    <body>
        <form method="post" action="">
             <table>
                <tr>
                    <td><p style = 'color:red'>* Required field</p></td>
                </tr>
                <tr>
                    <td><label for="name">Name: </label></td>
                    <td><input type="text" id="name" name ="name"><?php echo $name; ?></td>
                    <td><p style ='color:red'>*</p></td>
                </tr>
                <tr>
                    <td><label for="mail">Email: </label></td>
                    <td><input type="email" id="mail" name ="mail"><?php echo $mail; ?></td>
                    <td><p style ='color:red'>*</p></td>
                </tr>
                <tr>
                    <td><label for="web">Website: </label></td>
                    <td><input type="text" id="web" name="web"><?php echo $web; ?></td>
                </tr>
                <tr>
                    <td><label for="comment">Comment: </label></td>
                    <td><textarea id="comment" name="comment" rows="5" cols="30"><?php echo $comment; ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="gender">Gender: </label></td>
                    <td>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label>
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">Male</label>
                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other">Other</label>
                    </td>
                    <td><p style='color:red'>*</p></td>
                </tr>
                <tr>
                    <td><input type="submit" id="submit" name="submit"></td>
                </tr>
             </table>
        </form>
    </body>
</html>