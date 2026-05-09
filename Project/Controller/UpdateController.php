<?php
include "../Model/db.php";
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["update"]))
    {
        $role = $_SESSION["role"] ?? "";
        if($role == "admin")
            {
                $id = $_POST["id"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $gender = $_POST["gender"];

                if(!empty($username) && strlen($username)>=8 && strlen($password)>=8 && !empty($email) && strpos($email,"@")!==false && strpos($email,".")!==false && !empty($gender))
                    {
                        $database = new db();
                        $connection = $database->connection();
                        $result = $database->update($connection, "users", $id, $username, $password, $email, $gender);
                        if($result)
                            {
                                Header("Location:../View/Dashboard.php");
                                exit();
                            }
                            else{
                                echo "Update Failed";
                            }
                    }
                    else{
                        echo "Please Use the appropriate validation";
                    }
            }
            else{
                echo "Unauthorized Access";
            }
    }
?>
