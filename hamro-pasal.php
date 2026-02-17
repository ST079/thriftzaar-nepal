<?php
require_once("./modules/config.php");

// Default order
$categories = db_select("categories", NULL, ' c_id DESC');

$order = "p_name ASC";
$where = NULL;

/* -------- CATEGORY FILTER -------- */
if (isset($_GET['category']) && is_array($_GET['category'])) {

    $category_ids = array_map('intval', $_GET['category']); // secure
    $ids = implode(',', $category_ids);

    $where = "c_id IN ($ids)";
}

// Sorting logic
if (isset($_GET['sorting'])) {

    $allowed_sort = [
        "low_high" => "selling_price ASC",
        "high_low" => "selling_price DESC",
        "a_z" => "p_name ASC",
        "z_a" => "p_name DESC"
    ];

    $sort_key = $_GET['sorting'];

    if (array_key_exists($sort_key, $allowed_sort)) {
        $order = $allowed_sort[$sort_key];
    }
}

require_once("./layouts/header.php");
$products = db_select("products", $where, $order);

if (!empty($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $search_condition = "p_name LIKE '%$search%'";
    if ($where) {
        $where .= " AND $search_condition";
    } else {
        $where = $search_condition;
    }
    $products = db_select("products", $where, $order);
}

// echo "<pre>";
// print_r($sold_products);
// die();


?>


<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i
                                class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Hamro Pasal</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <sup><small class="text-light">Kasko Pasal,</small></sup>
            <h1 class="h3 text-light mb-0"> Hamro Pasal</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <!-- Sidebar-->
        <aside class="col-lg-4">
            <!-- Sidebar-->
            <div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar"
                style="max-width: 22rem;">
                <div class="offcanvas-header align-items-center shadow-sm">
                    <h2 class="h5 mb-0">Filters</h2>
                    <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">
                    <!-- Categories Widget -->
                    <div class="widget widget-categories mb-4 pb-4 border-bottom">
                        <h3 class="widget-title">Categories</h3>
                        <form method="GET">
                            <ul class="widget-list">
                                <?php foreach ($categories as $cat): ?>
                                    <li class="widget-list-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="category[]"
                                                value="<?= $cat['c_id']; ?>" id="cat<?= $cat['c_id']; ?>"
                                                <?= (isset($_GET['category']) && in_array($cat['c_id'], $_GET['category'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="cat<?= $cat['c_id']; ?>">
                                                <?= $cat['c_name']; ?>
                                            </label>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <!-- Keep Sorting When Filtering -->
                            <?php if (isset($_GET['sorting'])): ?>
                                <input type="hidden" name="sorting" value="<?= $_GET['sorting']; ?>">
                            <?php endif; ?>

                            <button type="submit" class="btn btn-sm btn-primary mt-3">
                                Apply Filter
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Content  -->
        <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-flex  justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
                <div class="d-flex flex-wrap">
                    <form method="GET">
                        <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
                            <label class="text-light opacity-75 text-nowrap fs-sm me-2 d-none d-sm-block">
                                Sort by:
                            </label>

                            <select class="form-select" name="sorting" onchange="this.form.submit()">
                                <option value="a_z" <?= (isset($_GET['sorting']) && $_GET['sorting'] == 'a_z') ? 'selected' : '' ?>>
                                    A - Z Order
                                </option>

                                <option value="low_high" <?= (isset($_GET['sorting']) && $_GET['sorting'] == 'low_high') ? 'selected' : '' ?>>
                                    Low - High Price
                                </option>
                                <option value="high_low" <?= (isset($_GET['sorting']) && $_GET['sorting'] == 'high_low') ? 'selected' : '' ?>>
                                    High - Low Price
                                </option>
                                <option value="z_a" <?= (isset($_GET['sorting']) && $_GET['sorting'] == 'z_a') ? 'selected' : '' ?>>
                                    Z - A Order
                                </option>

                            </select>

                            <span class="fs-sm text-light opacity-75 text-nowrap ms-2 d-none d-md-block">
                                of <?= count($products) ?> products
                            </span>
                        </div>
                    </form>

                </div>
            </div>

            <form method="GET" class="input-group d-none d-lg-flex">
                <input class="form-control rounded-end pe-5" type="text" name="search"
                    value="<?= $_GET['search'] ?? '' ?>" placeholder="Search for products">

                <button type="submit" style="display:none;"></button>
            </form>

            <!-- Products grid-->
            <div class="row mx-n2 pt-3">
                <?php
                if ($products) {
                    foreach ($products as $product) {
                        echo product_ui_1($product,$sold_products);
                    }
                } else {
                    require_once('nothing-here.php');
                }
                ?>
            </div>
            <hr class="my-3">
            <!-- Banner -->
            <div class="py-sm-2">
                <div
                    class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden mb-4 rounded-3">
                    <img class="d-block ms-auto" src="img/shop/catalog/banner.png" alt="Ad Section">
                </div>
            </div>
            <hr class="my-3">
        </section>
    </div>
</div>
<?php
require_once("./layouts/footer.php");
?>