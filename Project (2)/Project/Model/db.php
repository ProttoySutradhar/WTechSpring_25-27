<?php
class db{

function connection()
{
$db_host = "localhost";
$db_user= "root";
$db_password="";
$db_name="project_db";

$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if($connection->connect_error)
    {
        die("Could not Connect Database".$connection->connect_error);
    }
return $connection;
}

function signup($connection, $tablename, $username, $password, $email, $gender)
{
    $sql= "INSERT INTO ".$tablename."(username, password, email, gender, role) VALUES ('".$username."', '".$password."','".$email."','".$gender."','user')";
    $result = $connection->query($sql);
    return $result;
}

function signin($connection, $tablename, $username, $password)
{
    $sql = "SELECT * FROM ".$tablename." WHERE username='".$username."' AND password='".$password."'";
    $result = $connection->query($sql);
    return $result;
}

function CheckUser($connection, $tablename, $username)
{
    $sql = "SELECT * FROM ".$tablename." WHERE username='".$username."'";
    $result = $connection->query($sql);
    return $result;
}

function WithSQLInjection($connection, $tablename, $username, $password, $email, $gender)
{
    $sql= "INSERT INTO ".$tablename."(username, password, email, gender, role) VALUES (?,?,?,?,?)";
    $statement = $connection->prepare($sql);
    $role = "user";
    $statement->bind_param("sssss", $username, $password, $email, $gender, $role);
    $result = $statement->execute();
    return $result;
}

function update($connection, $tablename, $id, $username, $password, $email, $gender)
{
    $sql = "UPDATE ".$tablename." SET username=?, password=?, email=?, gender=? WHERE id=?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("ssssi", $username, $password, $email, $gender, $id);
    $result = $statement->execute();
    return $result;
}

function getAllUsers($connection, $tablename)
{
    $sql = "SELECT * FROM ".$tablename;
    $result = $connection->query($sql);
    return $result;
}

}


?>
