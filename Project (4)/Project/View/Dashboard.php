<?php
session_start();
$username = $_SESSION["username"] ?? "";
$isLoggedIn = $_SESSION["loggedIn"] ?? false;
$role = $_SESSION["role"] ?? "";

if(!$isLoggedIn)
    {
        Header("Location: Login.php");
        exit();
    }

if($role == "admin")
    {
        include "../Model/db.php";
        $database = new db();
        $connection = $database->connection();
        $users = $database->getAllUsers($connection, "users");
    }
?>

<html>
    <body>
        <?php echo "Hello Mr. $username , welcome to dashboard."; ?>
        <a href="../Controller/Logout.php">Logout</a>

        <?php
        if($role == "admin")
            {
                echo "<h2>User Management</h2>";
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>Username</th><th>Password</th><th>Email</th><th>Gender</th><th>Action</th></tr>";
                while($row = $users->fetch_assoc())
                    {
                        echo "<tr>";
                        echo "<form method='post' action='../Controller/UpdateController.php'>";
                        echo "<td>".$row["id"]."<input type='hidden' name='id' value='".$row["id"]."'></td>";
                        echo "<td><input type='text' name='username' value='".$row["username"]."'></td>";
                        echo "<td><input type='text' name='password' value='".$row["password"]."'></td>";
                        echo "<td><input type='text' name='email' value='".$row["email"]."'></td>";
                        echo "<td>
                            <select name='gender'>
                                <option value='Male' ".($row["gender"]=="Male"?"selected":"").">Male</option>
                                <option value='Female' ".($row["gender"]=="Female"?"selected":"").">Female</option>
                                <option value='Other' ".($row["gender"]=="Other"?"selected":"").">Other</option>
                            </select>
                        </td>";
                        echo "<td><input type='submit' name='update' value='Update'></td>";
                        echo "</form>";
                        echo "</tr>";
                    }
                echo "</table>";
            }
        ?>
    </body>
</html>
