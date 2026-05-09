<?php
include "../Model/db.php";
session_start();

$name = "";
$password = "";
$email = "";
$gender = "";
$datafile = "../data.json";




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
                        $formdata = array("name"=>$name, "password"=>$password, "email"=>$email, "gender"=>$gender);

                        if(file_exists($datafile))
                            {
                                $existdata = file_get_contents($datafile);
                                $tempdata = json_decode($existdata, true);
                            }
                            else{
                                $tempdata = array();
                            }
                        if(!is_array($tempdata))
                            {
                                $tempdata = array();
                            }
                        $tempdata[] = $formdata;
                        $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);

                        if(file_put_contents($datafile,$jsondata)!==false)
                            {
                                echo "Data Saved Successfully<br>";
                            }
                            else{
                                echo "No Data Saved";
                            }

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
