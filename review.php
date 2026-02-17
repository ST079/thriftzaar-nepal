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

if (isset($_POST["first_name"])) {
    $_SESSION["shipping"]["first_name"] = $_POST["first_name"];
    $_SESSION["shipping"]["last_name"] = $_POST["last_name"];
    $_SESSION["shipping"]["email"] = $_POST["email"];
    $_SESSION["shipping"]["phone_number"] = $_POST["phone_number"];
    $_SESSION["shipping"]["address"] = $_POST["address"];
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
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Checkout</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <section class="col-lg-8">
            <!-- Steps-->
            <div class="steps steps-light pt-2 pb-3 mb-5">
                <a class="step-item active" href="cart.php">
                    <div class="step-progress">
                        <span class="step-count">1</span>
                    </div>
                    <div class="step-label">
                        <i class="ci-cart"></i>Cart
                    </div>
                </a>
                <a class="step-item active" href="checkout.php">
                    <div class="step-progress">
                        <span class="step-count">2</span>
                    </div>
                    <div class="step-label">
                        <i class="ci-user-circle"></i>Checkout
                    </div>
                </a>
                <a class="step-item active current" href="review.php">
                    <div class="step-progress">
                        <span class="step-count">3</span>
                    </div>
                    <div class="step-label">
                        <i class="ci-check-circle"></i>Review
                    </div>
                </a>
            </div>
            <!-- Order details-->
            <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Review your order</h2>
            <?php foreach ($cart_items as $item) { ?>
                <!-- Item-->
                <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
                    <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a
                            class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="product.php?id=<?= $item['p_id'] ?>"><img
                                src="<?= get_product_thumb($item['photos']) ?>" width="160" alt="Product"></a>
                        <div class="pt-2">
                            <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">
                                    <?= $item['p_name'] ?>
                                </a>
                            </h3>
                            <div class="fs-lg text-accent pt-2">NPR
                                <?= $item['selling_price'] ?>.<small>00</small>
                            </div>
                        </div>
                    </div>
                    <form action="">
                        <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
                            <label class="form-label" for="quantity1">Quantity</label>
                            <input class="form-control" type="number" id="quantity1" min="1" value="<?= $item['quantity'] ?>" disabled>
                            <button class="btn btn-link px-0 text-danger remove-from-cart" data-id="<?= $item['p_id'] ?>"><i class="ci-close-circle me-2"></i><span
                                    class="fs-sm">Remove</span></button>
                        </div>
                    </form>
                </div>
            <?php } ?>
            <!-- Client details-->
            <div class="bg-secondary rounded-3 px-4 pt-4 pb-2">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="h6">Shipping to:</h4>
                        <ul class="list-unstyled fs-sm">
                            <li><span class="text-muted">Client:&nbsp;</span><?= $_SESSION["shipping"]["first_name"] ." ". $_SESSION["shipping"]["last_name"]?></li>
                            <li><span class="text-muted">Address:&nbsp;</span><?= $_SESSION["shipping"]["address"] ?></li>
                            <li><span class="text-muted">Phone:&nbsp;</span>+977 <?= $_SESSION["shipping"]["phone_number"] ?></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="h6">Payment method:</h4>
                        <ul class="list-unstyled fs-sm">
                            <li><span class="text-muted">Cash On Delivery</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Navigation (desktop)-->
            <div class="d-none d-lg-flex pt-4">
                <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="checkout.php"><i
                            class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                            Checkout</span><span class="d-inline d-sm-none">Back</span></a></div>
                            
                <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100 <?= ($cart_count == 0)? "d-none":"" ?>" href="complete-order.php"><span
                            class="d-none d-sm-inline">Complete order</span><span
                            class="d-inline d-sm-none">Complete</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a>
                    </div>
                </div>
        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
            <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
                <div class="py-2 px-xl-2">
                    <div class="widget mb-3">
                        <h2 class="widget-title text-center">Order summary</h2>

                        <?php foreach ($cart_items as $item) { ?>
                            <div class="widget-cart-item pb-2 border-bottom">
                                <a href="cart-process-remove.php?id=<?= $item['p_id'] ?>">
                                    <button class="btn-close text-danger" type="button" aria-label="Remove"><span
                                            aria-hidden="true">&times;</span>
                                    </button>
                                </a>
                                <div class="d-flex align-items-center"><a class="flex-shrink-0"
                                        href="product.php?id=<?= $item['p_id'] ?>"><img
                                            src="<?= get_product_thumb($item['photos']) ?>" width="64" alt="Product"></a>
                                    <div class="ps-2">
                                        <h6 class="widget-product-title"><a
                                                href="product.php?id=<?= $item['p_id'] ?>"><?= $item['p_name'] ?></a>
                                        </h6>
                                        <div class="widget-product-meta"><span class="text-accent me-2">NPR
                                                <?= $item['selling_price'] ?>.<small>00</small></span><span
                                                class="text-muted">x 1</span></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <ul class="list-unstyled fs-sm pb-2 border-bottom">
                        <li class="d-flex justify-content-between align-items-center"><span
                                class="me-2">Subtotal:</span><span class="text-end">NPR <?=$cart_total?>.<small>00</small></span></li>
                        <li class="d-flex justify-content-between align-items-center"><span
                                class="me-2">Delivery Charge:</span><span class="text-end">NPR 100.<small>00</small></span></li>
                    </ul>
                    <h3 class="fw-normal text-center my-4">NPR <?= $cart_total+100 ?>.<small>00</small></h3>
                </div>
            </div>
        </aside>
    </div>
    <!-- Navigation (mobile)-->
    <div class="row d-lg-none">
        <div class="col-lg-8">
            <div class="d-flex pt-4 mt-3">
                <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="checkout.php"><i
                            class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                            Payment</span><span class="d-inline d-sm-none">Back</span></a></div>
                <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="complete-order.php"><span
                            class="d-none d-sm-inline">Complete order</span><span
                            class="d-inline d-sm-none">Complete</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once("./layouts/footer.php");
?>