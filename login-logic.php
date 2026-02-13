<?php

require_once("./modules/config.php");

$email = trim($_POST['email']);
$password = trim($_POST['password']);

if(login_user($email,$password)){
    header('Location: account-profile.php');
}else{
    alert("danger","Login Failed! You entered wrong email or password.");
    header("Location: login.php");
}

?>