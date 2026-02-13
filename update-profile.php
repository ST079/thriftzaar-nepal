<?php
require_once('modules/config.php'); // include your DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $conn;
    $user_id = $_SESSION['user']['user_id']; // get user id from session

    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $phone = trim($_POST['phone_number']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['password_1']);

    // Simple validation
    if ($password && $password !== $confirm_password) {
        alert('warning', 'Password Didnt Match');
        header("Location: account-profile.php");
        die();
    }

    $password_sql = "";
    if ($password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $password_sql = ",password='$hashed'";
    }

    $sql = "UPDATE users SET 
            first_name='$first_name',
            last_name='$last_name',
            phone_number='$phone'
            $password_sql
            WHERE user_id='$user_id'";

    $result = $conn->query($sql);

    if ($result) {
        // Update session variables
        $_SESSION['user']['first_name'] = $first_name;
        $_SESSION['user']['last_name'] = $last_name;
        $_SESSION['user']['phone_number'] = $phone;

        alert("success", "Profile Updated Successfully!!");
        header("Location: account-profile.php");
        die();
    } else {
        alert("danger", "Something Went Wrong!!");
    }
}

