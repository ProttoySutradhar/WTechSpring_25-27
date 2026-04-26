<?php

session_start();

$name="";
$mail="";
$web="";
$comment="";
$gender="";

$validName="";
$validMail="";
$validWeb="";

$datafile="../data.json";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $web = $_POST["web"];
    $comment = $_POST["comment"];

   /* $name = $_REQUEST["name"];
    $mail = $_REQUEST["mail"];
    $web = $_REQUEST["web"];
    $comment = $_REQUEST["comment"];*/

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

    if(!empty($name) && strlen($name) >= 5 && !empty($mail) && !empty($web) && !empty($comment) && !empty($gender))
        {
            $_SESSION["name"]=$name;
            setcookie('name', $name, time()+3600, "/");

            $_SESSION["mail"]=$mail;
            setcookie('mail', $mail, time()+3600, "/");

            $_SESSION["web"]=$web;
            setcookie('web', $web, time()+3600, "/");

            $_SESSION["comment"]=$comment;
            setcookie('comment', $comment, time()+3600, "/");

            $_SESSION["gender"]=$gender;
            setcookie('gender', $gender, time()+3600, "/");

            echo "Login Successful<br>";

            $formdata = array("Name"=>$name, "Email"=>$mail, "Website"=>$web, "Comment"=>$comment,"Gender"=>$gender);

            if(file_exists($datafile))
                {
                    $existdata = file_get_contents($datafile);
                    $tempdata = json_decode($existdata,true);
                }
                else{
                    $tempdata=array();
                }

                if(!is_array($tempdata))
                    {
                        $tempdata= array();
                    }
                    $tempdata[] = $formdata;
                    $jsondata =json_encode($tempdata, JSON_PRETTY_PRINT);
                
                if(file_put_contents($datafile,$jsondata) !== false)
                    {
                        echo "data saved<br>";
                    }
                    else{
                        "please try again<br>";
                    }
                $data= file_get_contents($datafile);
                $mydata = json_decode($data);

        }
        else{
            echo "Please try again!<br>";
        }
    
if((isset($_SESSION["name"]) && isset($_SESSION["mail"]) && isset($_SESSION["web"]) && isset($_SESSION["comment"]) && isset($_SESSION["gender"])) || (isset($_COOKIE["name"]) && isset($_COOKIE["mail"]) && isset($_COOKIE["web"]) && isset($_COOKIE["comment"]) && isset($_COOKIE["gender"]) ))
     {
        echo "welcome back<br>";       
     }
    else{
         echo "please login again<br>";
     }

}



?>

