<?php
require_once("./modules/config.php");
$id = $_GET['id'];
$category = get_category($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["form"]["value"] = $_POST;

    $existing_photo = json_decode($category['c_photo'], true);
    $new_photo = upload_images($_FILES); // only newly uploaded files
    $default = [
        [
            "src" => "img/default.png",
            "thumb" => "img/default.png"
        ]
    ];
      if (!empty($new_photo) && !empty($new_photo[0]['src'])) {
        $final_photo = $new_photo;
    } elseif (!empty($existing_photo) && !empty($existing_photo[0]['src'])) {
        $final_photo = $existing_photo;
    } else {
        $final_photo = $default;
    }

    $c_name = $_POST['name'];
    $c_description = $_POST['description'];
    $parent_id = (int) ($_POST['parent_id']);
    $c_photo = json_encode($final_photo);

    global $conn;

    $sql = "UPDATE categories SET 
            c_name = '{$c_name}',
            c_description = '{$c_description}',
            parent_id = {$parent_id},
            c_photo = '{$c_photo}'
            WHERE c_id = {$id}";

    if ($conn->query($sql)) {
        alert("success", "Category Updated Successfully");
        header("Location: admin-categories.php");
        unset($_SESSION["form"]);
    } else {
        alert("danger", "Failed to update category try again!");
        header("Location: update-category.php?id={$id}");
    }
    die();
}

?>