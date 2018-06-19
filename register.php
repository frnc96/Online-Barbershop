<?php
require_once('connect.php');


$Name = $_POST["name"];
$Surname = $_POST["surname"];
$Email = $_POST["email"];
$Password = $_POST["password1"];
$Cpassword = $_POST["password2"];

$query = "INSERT INTO `users` (`name`, `surname`, `email`, `password`) VALUES ('$Name', '$Surname', '$Email', '$Password')";

if(preg_match('/[a-zA-Z]+/',$Name) && preg_match('/[a-zA-Z]+/',$Surname) && filter_var($Email, FILTER_VALIDATE_EMAIL) && !preg_match('/^$|\s+/', $Password) && $Password === $Cpassword){
    if(!mysqli_query($connection, $query)){
        header("Location: http://allisfree.al/barber/index.php?msg=notRegistered");
    }else{
        header("Location: http://allisfree.al/barber/index.php?msg=registered");
    }
} else header("Location: http://allisfree.al/barber/index.php?msg=invalidInput");
?>