<?php
require_once("modules/config.php");
protected_area(); // this already starts session in your system

$order_id = intval($_GET['id']); // match JS
$user_id = $_SESSION['user']['user_id'];
$user_type = $_SESSION['user']['user_type'];


$order = db_select("orders", "order_id = $order_id");
if (!$order) {
    echo "Invalid order.";
    exit;
}


$order_items = json_decode($order[0]['cart'], true);
$subtotal = 0;
// echo"<pre>";
// print_r($order_items);
// die();
if (!$order_items) {
    echo "No items found.";
    exit;
}

foreach ($order_items as $item) {
    $subtotal += $item['quantity'] * $item['selling_price'];
    ?>
    <div class="d-sm-flex justify-content-between mb-4 pb-3 pb-sm-2 border-bottom">
        <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto"
                href="shop-single-v1.html" style="width: 10rem;"><img src="<?= get_product_thumb($item['photos']) ?>"
                    alt="Product"></a>
            <div class="ps-sm-4 pt-2">
                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html"><?= $item['p_name'] ?></a></h3>
                <div class="fs-sm"><span class="text-muted me-2">Category:</span><?= $item['c_name'] ?></div>
                <div class="fs-lg text-accent pt-2">NPR <?= number_format($item['selling_price'] * $item['quantity'], 2) ?>
                </div>
            </div>
        </div>
        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
            <div class="text-muted mb-2">Quantity:</div> <?= $item['quantity'] ?>
        </div>
        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
            <div class="text-muted mb-2">Subtotal</div>NPR
            <?= number_format($item['quantity'] * $item['selling_price'], 2) ?>
        </div>
    </div>
    </div>
    <?php
}
?>
<div class="modal-footer flex-wrap justify-content-between bg-secondary fs-md">
    <div class="px-2 py-1"><span class="text-muted">Subtotal:&nbsp;</span><span>NPR
            <?= number_format($subtotal, 2) ?></span></div>
    <div class="px-2 py-1"><span class="text-muted">Delivery:&nbsp;</span><span>NPR 100.00</span></div>
    <div class="px-2 py-1"><span class="text-muted">Total:&nbsp;</span><span class="fs-lg">NPR
            <?= number_format($subtotal + 100, 2) ?></span>
    </div>
</div>