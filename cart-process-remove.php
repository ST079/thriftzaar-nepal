<?php
require_once("modules/config.php");

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

if (isset($_SESSION['cart'])) {

    foreach ($_SESSION['cart'] as $key => $value) {

        if ($value['p_id'] == $id) {
            unset($_SESSION['cart'][$key]);
            echo "success";
            alert("danger","Removed To Cart Successfully");
            exit;
        }
    }
}

echo "error";
