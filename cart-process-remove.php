<?php
require_once("modules/config.php");
$id = (int)($_GET["id"]);

if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $key => $value){
        if($value['p_id'] == $id){
            unset($_SESSION['cart'][$key]);
        }
    }
}

alert("danger","Removed To Cart Successfully");
header("Location: hamro-pasal.php");
