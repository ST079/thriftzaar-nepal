<?php
require_once("./layouts/header.php");
require_once("./modules/config.php");
$user = $_SESSION["user"];

if (isset($_SESSION["shipping"]) && $_SESSION["cart"]) {
    $total_price = 0;
    foreach ($_SESSION["cart"] as $key => $value) {
        $total_price += $value['quantity'] * $value["selling_price"];
    }

    db_insert("orders", [
        'user_id' => (int) $user['user_id'],
        'order_status' => 1,
        'shipping' => json_encode($_SESSION['shipping']),
        'cart' => json_encode($_SESSION['cart']),
        'order_time' => time(),
        'total_price' => $total_price,
    ]);
    $_SESSION['shipping'] = null;
    unset($_SESSION['cart']);
    unset($_SESSION['shipping']);
}
?>

<div class="container pb-2 mb-sm-4">
    <div class="pt-5">
        <div class="card py-3 mt-sm-3">
            <div class="card-body text-center">
                <h2 class="h4 pb-3">Thank you for your order!
                    <?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'] ?>
                </h2>
                <p class="fs-sm mb-2">Your order has been placed and will be processed as soon as possible.</p>
                <div class="container px-2 mb-2 mb-md-3">
                    <!-- Progress-->
                    <div class="card border-0 shadow-lg">
                        <div class="card-body pb-2">
                            <ul class="nav nav-tabs media-tabs nav-justified">
                                <li class="nav-item">
                                    <div class="nav-link completed">
                                        <div class="d-flex align-items-center">
                                            <div class="media-tab-media"><i class="ci-bag"></i></div>
                                            <div class="ps-3">
                                                <div class="media-tab-subtitle text-muted fs-xs mb-1">First step</div>
                                                <h6 class="media-tab-title text-nowrap mb-0">Order placed</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-link active">
                                        <div class="d-flex align-items-center">
                                            <div class="media-tab-media"><i class="ci-settings"></i></div>
                                            <div class="ps-3">
                                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Second step</div>
                                                <h6 class="media-tab-title text-nowrap mb-0">Processing order</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-link">
                                        <div class="d-flex align-items-center">
                                            <div class="media-tab-media"><i class="ci-star"></i></div>
                                            <div class="ps-3">
                                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Third step</div>
                                                <h6 class="media-tab-title text-nowrap mb-0">Quality check</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-link">
                                        <div class="d-flex align-items-center">
                                            <div class="media-tab-media"><i class="ci-package"></i></div>
                                            <div class="ps-3">
                                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Fourth step</div>
                                                <h6 class="media-tab-title text-nowrap mb-0">Product dispatched</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="fs-sm"><u>You can
                        now:</u></p><a class="btn btn-secondary mt-3 me-3" href="hamro-pasal.php">Go back
                    shopping</a><a class="btn btn-primary mt-3" href="account-orders.php"><i
                        class="ci-location"></i>&nbsp;View Your Orders</a>
            </div>
        </div>
    </div>
</div>


<?php
require_once("./layouts/footer.php");
?>