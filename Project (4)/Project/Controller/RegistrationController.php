<?php
include "../Model/db.php";
session_start();

$name = "";
$password = "";
$email = "";
$gender = "";




if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name = $_POST["name"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];

        if(!empty($name) && strlen($name)>=8 && strlen($password)>=8 && !empty($email) && strpos($email,"@")!==false && strpos($email,".")!==false && !empty($gender))
            {
                $database = new db();
                $connection = $database->connection();

                $checkResult = $database->CheckUser($connection, "users", $name);
                if($checkResult->num_rows>0)
                    {
                        echo "Username Already Taken";
                    }
                    else{
                        $result = $database->WithSQLInjection($connection, "users", $name, $password, $email, $gender);
                        if($result)
                            {
                                setcookie("UserName", $name, time()+3600, "/");
                                setcookie("Password", $password, time()+3600, "/");
                                setcookie("Email", $email, time()+3600, "/");
                                setcookie("Gender", $gender, time()+3600, "/");
                                Header("Location:../View/Login.php");
                                exit();
                            }
                    }
            }
            else{
                echo "Please Use the appropriate validation";
            }
    }
?>
