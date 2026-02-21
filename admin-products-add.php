<?php
require_once("./modules/config.php");
protected_area();
//fetch categories
$rows = db_select("categories", 'parent_id=0');
$categories = [];
$categories[0] = "Select Category";
foreach ($rows as $key => $value) {
    $categories[$value['c_id']] = $value['c_name'];
}


// echo"<pre>";
// print_r();
// die();
// name photo parent_id description

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["form"]["value"] = $_POST;


    $imgs = upload_images($_FILES);
    $default = [
        [
            "src" => "img/default.png",
            "thumb" => "img/default.png"
        ]
    ];
    $img = (!empty($imgs) && !empty($imgs[0]['src'])) ? $imgs : $default;
    $data['p_name'] = $_POST['name'];
    $data['buying_price'] = $_POST['cp'];
    $data['selling_price'] = $_POST['sp'];
    $data['description'] = $_POST['description'];
    $data['photos'] = json_encode($imgs);
    $data['user_id'] = $_SESSION['user']["user_id"];
    $data['c_id'] = (int) ($_POST['parent_id']);

    //insert data into categories table
    if (db_insert('products', $data)) {
        alert("success", "Products Added Successfully");
        header("Location: admin-products.php");
        unset($_SESSION["form"]);
    } else {
        alert("danger", "Failed to add product try again!");
        header("Location: admin-products-add.php");
    }
    die();
}

require_once("./layouts/header.php");
?>

<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i
                                class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Orders history</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Product Categories</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <?php require_once("./layouts/account-sidebar.php"); ?>
        <!-- Content  -->
        <div class="col-lg-8">
            <section>
                <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
                    <p></p>
                    <a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="<?= url("/logout.php") ?>"><i
                            class="ci-sign-out me-2"></i>Sign out</a>
                </div>
            </section>
            <section class="pt-lg-4 pb-4 mb-3">
                <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                    <!-- Title-->
                    <div class="d-sm-flex flex-wrap justify-content-between align-items-center pb-2">
                        <h2 class="h3 py-2 me-2 text-center text-sm-start">Add New Product</h2>
                    </div>
                    <form action="admin-products-add.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 pb-2">
                            <?= text_input(['name' => 'name', 'label' => 'Product Name', 'placeholder' => 'Enter Product Name', 'attributes' => 'required']) ?>
                            <!-- <div class="form-text">Maximum 100 characters. No HTML or emoji allowed.</div> -->

                        </div>

                        <div class="mb-3 pb-2">
                            <?= select_input(
                                ['name' => 'parent_id', 'label' => 'Product Category', 'attributes' => 'required'],
                                $categories
                            ) ?>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="unp-extended-price">Buying Price</label>
                                <div class="input-group"><span class="input-group-text">NPR</span>
                                    <?= text_input(['name' => 'cp', 'placeholder' => 'Enter Buying Price']) ?>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 ">
                                <label class="form-label" for="unp-extended-price">Selling Price</label>
                                <div class="input-group"><span class="input-group-text">NPR</span>
                                    <?= text_input(['name' => 'sp', 'placeholder' => 'Enter Selling Price']) ?>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 py-2">
                            <label class="form-label" for="description">Product description</label>
                            <textarea class="form-control" name="description" rows="6" id="description"></textarea>
                        </div>

                        <div class="row">
                            <label class="form-label" for="file">Product Photo</label>
                            <div class="file-drop-area mb-3">
                                <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Drag
                                    and
                                    drop here to upload Product Image</span>
                                <input class="file-drop-input" type="file" name="photo_1" accept=".jpg,.jpeg,.png">
                                <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select
                                    file</button>
                            </div>

                            <div class="file-drop-area mb-3">
                                <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Drag
                                    and
                                    drop here to upload Product Image</span>
                                <input class="file-drop-input" type="file" name="photo_2" accept=".jpg,.jpeg,.png">
                                <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select
                                    file</button>
                            </div>

                            <div class="file-drop-area mb-3">
                                <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Drag
                                    and
                                    drop here to upload Product Image</span>
                                <input class="file-drop-input" type="file" name="photo_3" accept=".jpg,.jpeg,.png">
                                <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select
                                    file</button>
                            </div>
                        </div>
                        <button class="btn btn-primary d-block w-100" type="submit"><i
                                class="ci-cloud-upload fs-lg me-2"></i>Save Product</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- footer -->
<?php
require_once("./layouts/footer.php");
?>