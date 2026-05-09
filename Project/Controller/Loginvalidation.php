<?php
include "../Model/db.php";
session_start();

$name = "";
$password = "";

if($_SESSION["loggedIn"] ?? false)
    {
        Header("Location:../View/Dashboard.php");
        exit();
    }

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name = $_POST["name"];
        $password = $_POST["password"];

        if(!empty($name) && strlen($name)>=8 && strlen($password)>=8)
            {
                $database = new db();
                $connection = $database->connection();
                $result = $database->signin($connection, "users", $name, $password);

                if($result->num_rows==1)
                    {
                        while($row = $result->fetch_assoc())
                            {
                                $id = $row["id"];
                                $username = $row["username"];
                                $role = $row["role"];
                                $_SESSION["username"] = $username;
                                $_SESSION["id"] = $id;
                                $_SESSION["role"] = $role;
                                $_SESSION["loggedIn"] = true;
                                setcookie("UserName", $username, time()+3600, "/");
                                Header("Location:../View/Dashboard.php");
                                exit();
                            }
                    }
                    else{
                        echo "Invalid Username or Password";
                    }
            }
            else{
                echo "Please Use the appropriate validation";
            }
    }
?>
