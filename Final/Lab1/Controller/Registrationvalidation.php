<?php
$name="";
$mail="";
$web="";
$comment="";
$gender="";

$validName="";
$validMail="";
$validWeb="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $web = $_POST["web"];
    $comment = $_POST["comment"];

    $name = $_REQUEST["name"];
    $mail = $_REQUEST["mail"];
    $web = $_REQUEST["web"];
    $comment = $_REQUEST["comment"];

    if(isset($_REQUEST["gender"])) 
    {
        $gender = $_REQUEST["gender"];
    }

    if(!empty($name) && strlen($name) >= 5) {
        echo"Name: ".$name."<br>";
    } 
    else 
    {
        echo"Name must be greater than 5 characters<br>";
    }
    if(!empty($mail)) 
    {
        $pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        if(preg_match($pattern, $mail)) 
        {
            $validMail = $mail;
            echo"Email: " . $validMail . "<br>";
        }
        else
        {
            echo"Invalid Email Format<br>";
        }
    } 
    else
    {
        echo"Email is required<br>";
    }
    if(!empty($web)) 
    {
       $pattern="/\b(?:https?:\/\/|www\.)\S+\.\S+\b/i";
        if(preg_match($pattern, $web)) 
        {
            $validWeb = $web;
            echo"Website: " . $validWeb . "<br>";
        }
        else 
        {
            echo"Invalid Website URL<br>";
        }
    } 
    else 
    {
        echo"Website is required<br>";
    }
    if(!empty($comment)){
        echo"Comment: " . $comment . "<br>";
    }
    else 
    {
        echo"Comment is required<br>";
    }
    if(!empty($gender)) 
    {
        echo"Gender: " . $gender . "<br>";
    } 
    else{
        echo"Gender is required<br>";
    }
}
?>