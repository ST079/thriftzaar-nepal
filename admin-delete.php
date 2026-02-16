<?php
require_once("./modules/config.php");

if (isset($_POST['id']) && isset($_POST['table'])) {

    $id = intval($_POST['id']);
    $table = $_POST['table'];


    if ($table == "products") {
        $sql = "DELETE FROM $table WHERE p_id = $id";
    } elseif ($table == "categories") {
        $sql = "DELETE FROM $table WHERE c_id = $id";
    } elseif ($table == "users") {
        $sql = "DELETE FROM $table WHERE user_id = $id";
    } else {
        echo "invalid";
        exit;
    }

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo mysqli_error($conn);
    }

}
?>