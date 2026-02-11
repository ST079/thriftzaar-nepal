<?php

require_once("./modules/config.php");

$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password_1 = trim($_POST['password_1']);
$phone_number = trim($_POST['phone']);
$last_name = trim($_POST['last_name']);
$first_name = trim($_POST['first_name']);


if($password != $password_1){
    alert("danger","Password did not match!!.");
    header("Location: login.php");
    die();
}

$sql = "SELECT * FROM users WHERE email = '{$email}'";
$res = $conn->query($sql);

if($res->num_rows>0){
    alert("danger","You already have an account with this email address!!!");
    header("Location: login.php");
    die();
}

//enrypts the password
$password = password_hash($password, PASSWORD_DEFAULT);
$created = time();

$sql = "INSERT INTO users (
        first_name,
        last_name,
        phone_number,
        password,
        email,
        user_type,
        created
        ) VALUES (
        '{$first_name}',
        '{$last_name}',
        '{$phone_number}',
        '{$password}',
        '{$email}',
        'customer',
        '{$created}'
        )";

if($conn->query($sql)){
    login_user($email,$password);
    alert("success","Welcome '$first_name' to ThriftZaar Nepal");
    header('Location: account-profile.php');
}else{
    alert("danger","Failed, Something went wrong!");
    header("Location: login.php");
    die();
}
