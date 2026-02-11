<?php
require_once("modules/config.php");
protected_area();
$id = $_POST["id"];

$product = get_product($id);
if ($product == null) {
    die("product not found");
}

$product["quantity"] = (int) ($_POST["quantity"]);
$_SESSION["cart"][$id] = $product;


alert("success","Added To Cart Successfully");
header("Location: hamro-pasal.php");
die();