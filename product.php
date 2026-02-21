<?php
require_once("./modules/config.php");
$id = 0;
if (isset($_GET["id"])) {
    $id = (int) ($_GET["id"]);
}
if ($id < 1) {
    die("id not found");
}
$product = get_product($id);

$images = get_product_photos($product['photos']);
// echo"<pre>";
// print_r($images);
// die();
require_once("layouts/header.php");



$is_sold = in_array($id, $sold_products);
$sold_badge = $is_sold
    ? '<span class="badge bg-danger position-absolute m-2">Sold Out</span>'
    : '';
$disabled = $is_sold ? 'disabled' : '';
$button_text = $is_sold ? 'Sold Out' : 'Add to Cart';
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
                    <li class="breadcrumb-item text-nowrap text-capitalize active" aria-current="page">
                        <?= $product['p_name'] ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0 text-capitalize"><?= $product['p_name'] ?></h1>
        </div>
    </div>
</div>

<div class="container">
    <!-- Gallery + details-->
    <div class="bg-light shadow-lg rounded-3 px-4 py-3 mb-5">
        <div class="px-lg-3">
            <div class="row">
                <!-- Product gallery-->
                <div class="col-lg-7 pe-lg-0 pt-lg-4">
                    <div class="product-gallery">
                        <div class="product-gallery-preview order-sm-2">
                            <?php
                            $active = "active";
                            foreach ($images as $key => $image) {
                                ?>
                                <div class="product-gallery-preview-item <?= $active ?>" id="img-<?= $key ?>"><img
                                        class="image-zoom" src="<?= $image->src ?>" data-zoom="<?= $image->thumb ?>"
                                        alt="Product image">
                                    <div class="image-zoom-pane"></div>
                                </div>

                                <?php $active = "";
                            } ?>
                        </div>
                        <div class="product-gallery-thumblist order-sm-1">
                            <?php
                            $active = "active";

                            foreach ($images as $key => $image) {
                                ?>
                                <a class="product-gallery-thumblist-item <?= $active ?>" href="#img-<?= $key ?>">
                                    <img src="<?= $image->thumb ?>" alt="Product thumb">
                                </a>
                                <?php $active = "";
                            } ?>
                        </div>
                    </div>
                </div>
                <!-- Product details-->
                <div class="col-lg-5 pt-4 pt-lg-0">
                    <div class="product-details ms-auto pb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <button class="btn-wishlist me-0 me-lg-n3" type="button" data-bs-toggle="tooltip"
                                title="Add to wishlist"><i class="ci-heart"></i></button>
                        </div>
                        <div class="mb-3"><span class="h3 fw-normal text-accent me-1">NPR
                                <?= $product['selling_price'] ?>.<small>00</small></span>
                        </div>
                        <div class="position-relative me-n4 mb-3">
                            <?php if ($is_sold) { ?>
                                <div class="product-badge bg-danger product-available mt-n1">
                                    <i class="fa-solid fa-ban"></i>Unavailable
                                </div>
                            <?php } else { ?>
                                <div class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Product
                                    available</div>
                            <?php } ?>
                        </div>
                        <form class="mb-grid-gutter mt-5" method="post" action="cart-process-add.php">
                            <input type="hidden" name="id" value="<?= $product['p_id'] ?>">
                            <div class="mb-3 d-flex align-items-center">
                                <select class="form-select me-3" name="quantity" style="width: 5rem;">
                                    <option value="1">1</option>
                                </select>
                                <button class="btn btn-primary btn-shadow d-block w-100 <?= $disabled ?>"
                                    type="submit"><i class="ci-cart fs-lg me-2"></i><?= $button_text ?></button>
                            </div>
                        </form>
                        <!-- Product panels-->
                        <div class="accordion mb-4" id="productPanels">
                            <div class="accordion-item">
                                <h3 class="accordion-header"><a class="accordion-button" href="#productInfo"
                                        role="button" data-bs-toggle="collapse" aria-expanded="true"
                                        aria-controls="productInfo"><i
                                            class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product
                                        info</a></h3>
                                <div class="accordion-collapse collapse show" id="productInfo"
                                    data-bs-parent="#productPanels">
                                    <div class="accordion-body">
                                        <p><?= $product['description'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header"><a class="accordion-button collapsed"
                                        href="#shippingOptions" role="button" data-bs-toggle="collapse"
                                        aria-expanded="true" aria-controls="shippingOptions"><i
                                            class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Shipping
                                        options</a></h3>
                                <div class="accordion-collapse collapse" id="shippingOptions"
                                    data-bs-parent="#productPanels">
                                    <div class="accordion-body fs-sm">
                                        <div class="d-flex justify-content-between border-bottom pb-2">
                                            <div>
                                                <div class="fw-semibold text-dark">Cash On Delivery</div>
                                                <div class="fs-sm text-muted"></div>
                                            </div>
                                        </div>
                                        <!-- <div class="d-flex justify-content-between border-bottom py-2">
                                            <div>
                                                <div class="fw-semibold text-dark">Online Payments</div>
                                                <div class="fs-sm text-muted">Esewa, Khalti, Bank</div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sharing-->
                        <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label>
                        <a class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a>
                        <a class="btn-share btn-facebook my-2"
                            href="https://www.facebook.com/sharer/sharer.php?u=http://thriftzaar-nepal.page.gd/product.php?id=<?= $product['p_id'] ?>"
                            target="_blank">
                            <i class="ci-facebook"></i> Facebook
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once("./layouts/footer.php");
?>