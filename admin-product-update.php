<?php
require_once("./modules/config.php");
$id = $_GET['id'];
$product = get_product($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $_SESSION["form"]["value"] = $_POST;

    $existing_photos = json_decode($product['photos'], true);
    $new_photos = upload_images($_FILES); // only newly uploaded files

    // preserve old photos if no new upload for that slot
    for ($i = 0; $i < 3; $i++) {
        if (!isset($new_photos[$i])) {
            $new_photos[$i] = $existing_photos[$i] ?? "img/default.png";
        }
    }

    $photos = json_encode($new_photos);
    $p_name = $_POST['name'];
    $buying_price = $_POST['cp'];
    $selling_price = $_POST['sp'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user']["user_id"];
    $c_id = (int) ($_POST['parent_id']);


    global $conn;

    $sql = "UPDATE products SET 
            p_name = '{$p_name}',
            buying_price = '{$buying_price}',
            selling_price = '{$selling_price}',
            description = '{$description}',
            photos = '{$photos}',
            user_id = '{$user_id}',
            c_id = '{$c_id}'
            WHERE p_id = {$id}";

    if ($conn->query($sql)) {
        alert("success", "Products Updated Successfully");
        header("Location: admin-products.php");
        unset($_SESSION["form"]);
    } else {
        alert("danger", "Failed to update product try again!");
        header("Location: admin-products-add.php");
    }
    die();
}

?>