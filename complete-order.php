<?php
require_once("./modules/config.php");
protected_area();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['order_id'])) {
        alert('warning','Id not found!');
        exit();
    }

    $order_id = intval($_POST['order_id']);
    $user_id = $_SESSION['user_id'];
    // Update order status to Canceled (-1)
    $sql = "UPDATE orders SET order_status = 0 WHERE order_id = $order_id";
    global $conn;
    $conn->query($sql);


    header("Location: account-orders.php");
    exit();
}
?>