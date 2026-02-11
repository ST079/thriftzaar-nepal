<?php

use stefangabos\Zebra_Image\Zebra_Image;
require_once("Zebra_Image.php");

if (session_start() === PHP_SESSION_NONE) {
    session_start();
}

define("BASE_URL", "http://localhost/thriftzaar-nepal");

$conn = mysqli_connect("localhost", "root", "", "thriftzaar");

function login_user($email, $password)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE  email = '{$email}'";
    $res = $conn->query($sql);
    if ($res->num_rows < 1) {
        return false;
    }
    $row = $res->fetch_assoc();
    if (!password_verify($password, $row['password'])) {
        return false;
    }
    ;
    $_SESSION['user'] = $row;
    return true;
}

function is_logged_in()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

function logout()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    alert("danger", "Logged Out successfully");
    header("Location:login.php");
    die();
}
//notifications
function alert($type, $msg)
{
    $_SESSION['alert']['type'] = $type;
    $_SESSION['alert']['msg'] = $msg;
}

function url($path)
{
    return BASE_URL . $path;
}
//long description shortner
function short_words($text, $limit = 15)
{
    $words = explode(' ', $text);

    if (count($words) <= $limit) {
        return $text;
    }

    return implode(' ', array_slice($words, 0, $limit)) . '...';
}

//preventing unauthorized access
function protected_area()
{
    if (!isset($_SESSION['user'])) {
        alert("warning", "Unauthorized access dected!!!! Login First");
        header("Location:login.php");
        die();
    }
}

function text_input($data)
{
    $name = (isset($data["name"])) ? $data["name"] : "";
    $attributes = (isset($data["attributes"])) ? $data["attributes"] : "";
    $value = "";
    $error = "";
    $error_text = "";

    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form'])) {
            if (isset($_SESSION['form']['value'][$name])) {
                $value = $_SESSION['form']['value'][$name];
            }
        }
    }

    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form'][$name])) {
            if (isset($_SESSION['form']['error'][$name])) {
                $error = $_SESSION['form']['error'][$name];
                $error_text = '<div class="form-text text-danger">' . $error . '</div>';
            }
        }
    }

    $label = (isset($data["label"])) ? $data["label"] : "";
    $placeholder = (isset($data["placeholder"])) ? $data["placeholder"] : "";
    $error = (isset($data["error"])) ? $data["error"] : $error;

    return
        '<label class="form-label text-capitalize" for="' . $name . '">' . $label . '</label>
        <input name="' . $name . '" class="form-control" value="' . $value . '" type="text" id="' . $name . '" placeholder="' . $placeholder . '" ' . $attributes . '>'
        . $error_text;
}

function select_input($data, $options)
{
    $name = (isset($data["name"])) ? $data["name"] : "";
    $attributes = (isset($data["attributes"])) ? $data["attributes"] : "";
    $value = "";
    $error = "";
    $error_text = "";

    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form'])) {
            if (isset($_SESSION['form']['value'][$name])) {
                $value = $_SESSION['form']['value'][$name];
            }
        }
    }

    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form'][$name])) {
            if (isset($_SESSION['form']['error'][$name])) {
                $error = $_SESSION['form']['error'][$name];
                $error_text = '<div class="form-text text-danger">' . $error . '</div>';
            }
        }
    }

    $label = (isset($data["label"])) ? $data["label"] : "";
    $value = (isset($data["value"])) ? $data["value"] : $value;


    // build options
    $select_options = "";

    // add No Parent manually
    $selected = ($value == 0) ? " selected" : "";
    $select_options .= '<option value="0"' . $selected . '>No Parent</option>';

    // now loop DB categories
    foreach ($options as $row) {

        $option_value = $row['c_id'];
        $option_label = $row['c_name'];

        $selected = ($option_value == $value) ? " selected" : "";

        $select_options .= '<option value="' . $option_value . '"' . $selected . '>'
            . $option_label . '</option>';
    }


    return '
        <label class="form-label text-capitalize" for="' . $name . '">' . $label . '</label>
        <select class="form-select text-capitalize" name="' . $name . '" id="' . $name . '" ' . $attributes . '>
            ' . $select_options . '
        </select>
        ' . $error_text;
}

//image upload
function upload_images($files)
{
    ini_set('memory_limit', '512M');
    if ($files == NULL || empty($files)) {
        return [];
    }
    $uploaded_images = array();
    foreach ($files as $file) {
        if (
            isset($file['name']) &&
            isset($file['type']) &&
            isset($file['tmp_name']) &&
            isset($file['error']) &&
            isset($file['size'])
        ) {
            //extracting the file extension
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            //generating file unique name
            $file_name = time() . "-" . rand(100000, 1000000) . "." . $ext;
            $destination = 'uploads/' . $file_name;
            $thumb_destination = 'uploads/thumb_' . $file_name;

            $res = move_uploaded_file($file['tmp_name'], $destination);
            if (!$res) {
                continue;
            }
            $thumb_destination = thumb($destination, $thumb_destination);
            $img['src'] = $destination; //for full screen image like in product details page
            $img['thumb'] = $thumb_destination; //for outer looks as a whole
            $uploaded_images[] = $img;
        }
    }
    return $uploaded_images;
}

//compressing the image
function thumb($source, $target)
{
    $image = new Zebra_Image();

    $image->auto_handle_exif_orientation = true;
    $image->source_path = $source;
    $image->target_path = $target;
    $image->preserve_aspect_ratio = true;
    $image->enlarge_smaller_images = true;
    $image->preserve_time = true;

    $image->jpeg_quality = get_jpeg_quality(filesize($image->source_path));

    $width = 518;
    $height = 484;
    if (!$image->resize($width, $height, ZEBRA_IMAGE_CROP_CENTER)) {

        return $image->source_path;
    } else {

        return $image->target_path;
    }

}

function get_jpeg_quality($_size)
{
    $size = $_size / (1024 * 1024);
    if ($size > 5) {
        $qt = 10;
    } elseif ($size > 4) {
        $qt = 13;
    } elseif ($size > 2) {
        $qt = 15;
    } elseif ($size > 1) {
        $qt = 17;
    } elseif ($size > 0.8) {
        $qt = 50;
    } elseif ($size > 0.5) {
        $qt = 80;
    } else {
        $qt = 90;
    }
    return $qt;
}

function get_product_thumb($json)
{
    $img = "uploads/default.png";
    if ($json == null) {
        return $img;
    }

    if (strlen($img) < 4) {
        return $img;
    }

    $photos = json_decode($json);
    if (empty($photos)) {
        return $img;
    }

    if (!isset($photos[0]->thumb)) {
        return $img;
    }
    return $photos[0]->thumb;
}

function get_product_photos($json)
{
    $img['src'] = "uploads/default.png";
    $img['thumb'] = "uploads/default.png";

    $photos[] = $img;

    if ($json == null) {
        return $photos;
    }

    if (strlen($json) < 4) {
        return $photos;
    }
    $_objects = json_decode($json);

    $objects = [];
    $i=0;
    foreach ($_objects as $key=>$value) {
        if($i>6){
            break;
        }
        $i++;
        $objects[] = $value;
    }

    if (empty($objects)) {
        return $photos;
    }
    return $objects;
}

function get_product($id)
{
    $sql = "SELECT *FROM products,categories WHERE products.p_id = $id  AND products.c_id = categories.c_id";
    global $conn;
    $res = $conn->query($sql);
    return $res->fetch_assoc();
}


function db_insert($table_name, $data)
{
    $sql = "INSERT INTO $table_name";

    $column_names = "(";
    $column_values = "(";

    $isFirst = true;
    foreach ($data as $key => $value) {
        if ($isFirst) {
            $isFirst = false;
        } else {
            $column_names .= ", ";
            $column_values .= ",";
        }
        $column_names .= $key;
        gettype($value) == 'string' ? $column_values .= "'$value'" : $column_values .= $value;
    }
    $column_names .= ")";
    $column_values .= ")";
    $sql .= $column_names . "VALUES" . $column_values;

    global $conn;
    if ($conn->query($sql)) {
        return true;
    } else {
        return false;
    }
}

function db_select($table_name, $condition = NULL)
{
    $sql = "SELECT * FROM $table_name";
    if ($condition != NULL) {
        $sql = "SELECT * FROM $table_name WHERE $condition";
    }

    global $conn;
    $res = $conn->query($sql);
    $rows = [];
    while ($row = $res->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;

}

//product component
function product_ui_1($product)
{
    $thumb = get_product_thumb($product['photos']);
    $str = <<<EOF
     <div class="col-md-4 col-sm-6 px-2 mb-4">
        <div class="card product-card">
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a
                class="card-img-top d-block overflow-hidden" href="product.php?id={$product["p_id"]}"><img
                    src="$thumb" alt="Product"></a>
            <div class="card-body py-2">
                <a class="product-meta d-block fs-xs pb-1" href="#">Sneakers &amp;Keds</a>
                <h3 class="product-title fs-sm">
                    <a href="product.php?id={$product["p_id"]}</a>">{$product['p_name']}</a>
                </h3>
                <div class="d-flex justify-content-between">
                    <div class="product-price">
                        <span class="text-accent">NPR {$product['selling_price']}.<small>00</small></span>
                    </div>
                    <div class="star-rating">
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star"></i>
                    </div>
                </div>
             </div>
            <div class="card-body card-body-hidden">
            <form action="cart-process-add.php" method="post">
                <input type="hidden" name="id" value="{$product['p_id']}">
                <select class="form-select me-3 mb-2" name="quantity" style="width: 5rem;">
                    <option value="1">1</option>
                </select>
                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="submit">
                    <i class="ci-cart fs-sm me-1"></i>Add to Cart
                </button>
            </form>
            </div>
        </div>
        <hr class="d-sm-none">
    </div>

    EOF;
    return $str;
}

