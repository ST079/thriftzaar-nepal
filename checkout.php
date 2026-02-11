<?php
require_once("./modules/config.php");
protected_area();


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

require_once("./layouts/header.php");
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
                <a class="step-item active current" href="checkout.php">
                    <div class="step-progress">
                        <span class="step-count">2</span>
                    </div>
                    <div class="step-label">
                        <i class="ci-user-circle"></i>Checkout
                    </div>
                </a>
                <a class="step-item" href="#">
                    <div class="step-progress">
                        <span class="step-count">3</span>
                    </div>
                    <div class="step-label">
                        <i class="ci-check-circle"></i>Review
                    </div>
                </a>
            </div>
            <!-- Autor info-->
            <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
                <div class="d-flex align-items-center">
                    <div class="img-thumbnail rounded-circle position-relative flex-shrink-0"><span
                            class="badge bg-warning position-absolute end-0 mt-n2" data-bs-toggle="tooltip"
                            title="Reward points">384</span><img class="rounded-circle"
                            src="img/shop/account/default.png" width="90" alt=" <?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'] ?>"></div>
                    <div class="ps-3">
                        <h3 class="fs-base mb-0">
                            <?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'] ?>
                        </h3><span class="text-accent fs-sm"><?= $_SESSION['user']['email'] ?></span>
                    </div>
                </div><a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="account-profile.php"><i
                        class="ci-edit me-2"></i>Edit profile</a>
            </div>
            <!-- Shipping address-->
            <form action="review.php" method="post">
                <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Shipping address</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-fn">First Name</label>
                            <input class="form-control" name="first_name" value="<?= $_SESSION['user']['first_name'] ?>"
                                type="text" id="checkout-fn" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-ln">Last Name</label>
                            <input class="form-control" name="last_name" value="<?= $_SESSION['user']['last_name'] ?>"
                                type="text" id="checkout-ln" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-email">E-mail Address</label>
                            <input class="form-control" type="email" name="email"
                                value="<?= $_SESSION['user']['email'] ?>" id="checkout-email" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-phone">Phone Number</label>
                            <input class="form-control" type="text" name="phone_number"
                                value="<?= $_SESSION['user']['phone_number'] ?>" id="checkout-phone" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label class="form-label" for="checkout-address">Address </label>
                        <input class="form-control" name="address" type="text" id="checkout-address" required>
                    </div>
                </div>

                <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4 mt-3">
                    <div class="w-50 pe-3">
                        <a class="btn btn-secondary d-block w-100" href="cart.php">
                            <i class="ci-arrow-left mt-sm-0 me-1"></i>
                            <span class="d-none d-sm-inline">Back to Cart</span>
</a></div>
                    <div class="w-50 ps-2">
                        <button class="btn btn-primary d-block w-100" href="review.php">
                            <span class="d-none d-sm-inline" type="submit">Proceed to Review</span>
                            <i class="ci-arrow-right mt-sm-0 ms-1"></i>
                        </button>
                    </div>
                </div>

                <!-- Navigation (mobile)-->
                <div class="row d-lg-none">
                    <div class="col-lg-8">
                        <div class="d-flex pt-4 mt-3">
                            <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="cart.php"><i
                                        class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                                        Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
                            <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="review.php"><span
                                        class="d-none d-sm-inline">Proceed to Review</span><span
                                        class="d-inline d-sm-none">Next</span><i
                                        class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
                        </div>
                    </div>
                </div>
            </form>
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
                                class="me-2">Subtotal:</span><span class="text-end">NPR
                                <?= $cart_total ?>.<small>00</small></span></li>
                        <li class="d-flex justify-content-between align-items-center"><span class="me-2">Delivery
                                Charge:</span><span class="text-end">NPR 100.<small>00</small></span></li>
                    </ul>
                    <h3 class="fw-normal text-center my-4">NPR <?= $cart_total + 100 ?>.<small>00</small></h3>
                </div>
            </div>
        </aside>
    </div>

</div>
<?php
require_once("./layouts/footer.php");
?>