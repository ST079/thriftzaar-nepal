<?php
require_once("./modules/config.php");
protected_area();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['order_id'])) {
        header("Location: my-orders.php");
        exit();
    }

    $order_id = intval($_POST['order_id']);
    $user_id = $_SESSION['user_id'];
    // Update order status to Canceled (-1)
    $sql = "UPDATE orders SET order_status = -1 WHERE order_id = $order_id";
    global $conn;
    $conn->query($sql);


    header("Location: account-orders.php");
    exit();
}
?>