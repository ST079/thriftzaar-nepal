<?php
require_once("./modules/config.php");
protected_area();
//fetch categories
$products = db_select("products", '1 ORDER BY c_id DESC');

// echo"<pre>";
// print_r(get_product_thumb($product['photos']));
// die();
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
            <h1 class="h3 text-light mb-0">My Products</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <?php require_once("./layouts/account-sidebar.php"); ?>
        <!-- Content  -->
        <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
                <a class="btn btn-warning btn-sm d-none d-lg-inline-block" href="<?= url("/admin-products-add.php") ?>">
                    <i class="fa-solid fa-plus me-2"></i>Add Product </a>
                <a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="<?= url("/logout.php") ?>"><i
                        class="ci-sign-out me-2"></i>Sign out</a>
            </div>
            <!-- Content-->
            <section class="pt-lg-4 pb-4 mb-3">
                <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                    <!-- Title-->
                    <div class="d-sm-flex flex-wrap justify-content-between align-items-center border-bottom">
                        <h2 class="h3 py-2 me-2 text-center text-sm-start">Products<span
                                class="badge bg-faded-accent fs-sm text-body align-middle ms-2"><?= count($products) ?></span>
                        </h2>
                        <div class="py-2">
                            <div class="d-flex flex-nowrap align-items-center pb-3">
                                <label class="form-label fw-normal text-nowrap mb-0 me-2" for="sorting">Sort by:</label>
                                <select class="form-select form-select-sm me-2" id="sorting">
                                    <option>Date Created</option>
                                    <option>Product Name</option>
                                    <option>Price</option>
                                    <option>Your Rating</option>
                                    <option>Updates</option>
                                </select>
                                <button class="btn btn-outline-secondary btn-sm px-2" type="button"><i
                                        class="ci-arrow-up"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Selling Price</th>
                                    <th>Buying Price</th>
                                    <th>Description</th>
                                    <th width="120">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product) { ?>
                                    <tr>
                                        <td>
                                            <img src="<?= get_product_thumb($product['photos']) ?>" width="80" height="60"
                                                style="object-fit:cover" class="rounded img-fluid">
                                        </td>

                                        <td><?= $product['p_name'] ?></td>

                                        <td><?= $product['selling_price'] ?></td>

                                        <td><?= $product['buying_price'] ?></td>

                                        <td><?= short_words($product['description'], 20) ?></td>

                                        <td>
                                            <button class="btn btn-sm bg-faded-info me-1" data-bs-toggle="tooltip"
                                                title="Edit">
                                                <i class="ci-edit text-info"></i>
                                            </button>

                                            <button class="btn btn-sm bg-faded-danger" data-bs-toggle="tooltip"
                                                title="Delete">
                                                <i class="ci-trash text-danger"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>



                </div>
            </section>
        </section>
    </div>
</div>

<!-- footer -->
<?php
require_once("./layouts/footer.php");
?>