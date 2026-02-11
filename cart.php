<?php
require_once("./layouts/header.php");
require_once("./modules/config.php");

$cart_cont = 0;
$cart_items = [];
$cart_total = 0;

if (isset($_SESSION["cart"])) {
    if (is_array($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $key => $item) {
            $cart_total += $item['selling_price'];
            $cart_items[] = $item;
        }
        $cart_cont = count($_SESSION["cart"]);
    }
}
?>


<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="<?= url("") ?>"><i
                                class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="hamro-pasal.php">Hamro Pasal</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Your cart</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <!-- List of items-->
        <section class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
                <h2 class="h6 text-light mb-0">Products</h2><a class="btn btn-outline-primary btn-sm ps-2"
                    href="hamro-pasal.php"><i class="ci-arrow-left me-2"></i>Continue shopping</a>
            </div>
            <?php
            foreach ($cart_items as $item) { ?>
                <!-- Item-->
                <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
                    <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a
                            class="d-inline-block flex-shrink-0 mx-auto me-sm-4"
                            href="product.php?id=<?= $item['p_id'] ?>"><img src="<?= get_product_thumb($item['photos']) ?>"
                                width="160" alt="Product"></a>
                        <div class="pt-2">
                            <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html"><?= $item['p_name'] ?></a>
                            </h3>
                            <div class="fs-lg text-accent pt-2">NPR <?= $item['selling_price'] ?>.<small>00</small></div>
                        </div>
                    </div>
                    <form action="">
                        <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start"
                            style="max-width: 9rem;">
                            <label class="form-label" for="quantity1">Quantity</label>
                            <input class="form-control" type="number" id="quantity1" min="1"
                                value="<?= $item['quantity'] ?>" disabled>
                            <button class="btn btn-link px-0 text-danger" type="submit"><i
                                    class="ci-close-circle me-2"></i><span class="fs-sm">Remove</span></button>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
            <div class="bg-white rounded-3 shadow-lg p-4">
                <div class="py-2 px-xl-2">
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <h2 class="h6 mb-3 pb-1">Subtotal</h2>
                        <h3 class="fw-normal">$265.<small>00</small></h3>
                    </div>
                    <div class="mb-3 mb-4">
                        <label class="form-label mb-3" for="order-comments"><span
                                class="badge bg-info fs-xs me-2">Note</span><span class="fw-medium">Additional
                                comments</span></label>
                        <textarea class="form-control" rows="6" id="order-comments"></textarea>
                    </div>
                    <a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="checkout.php"><i
                            class="ci-card fs-lg me-2"></i>Proceed to Checkout</a>
                </div>
            </div>
        </aside>
    </div>
</div>

<?php
require_once("./layouts/footer.php");
?>