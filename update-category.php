<?php
require_once("./modules/config.php");
protected_area();
//fetch categories
$rows = db_select("categories", 'parent_id=0');
$categories = [];
$categories[0] = "No Parent";
foreach ($rows as $key => $value) {
    $categories[$value['c_id']] = $value['c_name'];
}

$id = (int)$_GET['id'];
$category = get_category($id);
if (!$category) {
    alert("danger", "Category not found");
    header("Location: admin-categories.php");
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
            <h1 class="h3 text-light mb-0">Categories</h1>
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
                        <h2 class="h3 py-2 me-2 text-center text-sm-start">Update Category</h2>
                    </div>
                    <form action="admin-categories-update.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 pb-2">
                            <?= text_input(['name' => 'name', 'label' => 'Category Name', 'value' => $category['c_name']]) ?>
                            <!-- <div class="form-text">Maximum 100 characters. No HTML or emoji allowed.</div> -->
                        </div>

                        <div class="mb-3 pb-2" >
                            <?= select_input(
                                ['name' => 'parent_id', 'label' => 'Parent Category', 'value' => $category['parent_id']],
                                $categories
                            ) ?>
                        </div>

                        <div class="mb-3 py-2">
                            <label class="form-label" for="description">Category description</label>
                            <textarea class="form-control" name="description" rows="6" id="description"><?= $category['c_description'] ?></textarea>
                        </div>

                        <label class="form-label" for="file">Category Photo</label>
                        <div class="file-drop-area mb-3">
                                <div class="file-drop-icon ci-cloud-upload"></div>
                                <span class="file-drop-message">Drag and drop here to upload Category Image</span>

                                <!-- Show current image -->
                                <?php if (isset($category["c_photo"])): ?>
                                    <div class="mb-2">
                                        <img src="<?= json_decode($category["c_photo"], true)[0]['thumb'] ?>" alt="Current Photo" width="100">
                                        <span>Current Image</span>
                                    </div>
                                <?php endif; ?>

                                <!-- File input to replace image -->
                                <input class="file-drop-input" type="file" name="photo" accept=".jpg,.jpeg,.png">
                                <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select
                                    file</button>
                            </div>
                        <button class="btn btn-primary d-block w-100" type="submit"><i
                                class="ci-cloud-upload fs-lg me-2"></i>Update Category</button>
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