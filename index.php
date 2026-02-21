<?php
require_once("modules/config.php");
require_once("layouts/header.php");
$order = "p_id DESC";
$products = db_select("products", null, $order);
?>

<section class="row g-0">
    <div class="col-md-6 px-3 px-md-5 py-5">
        <div class="mx-auto py-lg-5" style="max-width: 35rem;">
            <h2 class="h3 pb-3">Search, Select, Buy online</h2>
            <p class="fs-sm pb-3 text-muted">“Welcome to thriftZaar Nepal — your ultimate destination for stylish,
                affordable, and sustainable fashion. Explore our curated collection of pre-loved clothing, vintage gems,
                and trendy finds that give old outfits a fresh new life. Shop smart, look amazing, and join the movement
                toward a more sustainable wardrobe.”</p><a class="btn btn-primary btn-shadow"
                href="hamro-pasal.php">View products</a>
        </div>
    </div>
    <div class="col-md-6 bg-position-center bg-size- bg-secondary"
        style="min-height: 15rem; background-image: url(img/TM.png); background-repeat:no-repeat;"></div>
</section>
<!-- new arrivals-->
<section class="container pt-lg-3 mb-4 mb-sm-5">
    <div class="row">
        <!-- Banner with controls-->
        <div class="col-md-5">
            <div class="d-flex flex-column h-100 overflow-hidden rounded-3" style="background-color: #f6f8fb;">
                <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
                    <div>
                        <h3 class="mb-1">New Arrivals</h3><a class="fs-md" href="hamro-pasal.php">Hurry Up!!!!<i
                                class="ci-arrow-right fs-xs align-middle ms-1"></i></a>
                    </div>
                </div><a class="d-none d-md-block mt-auto" href="shop-grid-ls.html"><img class="d-block w-100"
                        src="img/shop/new.png" alt="For Women"></a>
            </div>
        </div>
        <!-- Product grid (carousel)-->
        <div class="col-md-7 pt-4 pt-md-0">
            <div class="tns-carousel">
                <div class="tns-carousel-inner"
                    data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#for-women&quot;}">
                    <!-- Carousel item-->
                    <div>
                        <div class="row mx-n2">
                            <?php
                            foreach (array_slice($products, 0, 6) as $product) {
                                $pro = get_product($product['p_id']);
                                $is_sold = in_array($product['p_id'], $sold_products);
                                $sold_badge = $is_sold
                                    ? '<span class="badge bg-danger position-absolute m-2">Sold Out</span>'
                                    : '';
                                $disabled = $is_sold ? 'disabled' : '';
                                $button_text = $is_sold ? 'Sold Out' : 'Add to Cart';
                                ?>

                                <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                                    <div class="card product-card card-static">
                                        <?= $sold_badge ?>
                                        <a class="card-img-top d-block overflow-hidden"
                                            href="product.php?id=<?= $product['p_id'] ?>"><img
                                                src="<?= get_product_thumb($product['photos']) ?>" alt="Product"></a>
                                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1"
                                                href="#"><?= $pro['c_name'] ?></a>
                                            <h3 class="product-title fs-sm"><a
                                                    href="shop-single-v1.html"><?= $product['p_name'] ?></a></h3>
                                            <div class="d-flex justify-content-between">
                                                <div class="product-price"><span class="text-accent">NPR
                                                        <?= $product['selling_price'] ?>.<small>00</small></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Blog + Instagram info cards-->
<section class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-md-6 opacity-50"><div class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary"
                 style="cursor:not-allowed;">
                <div class="card-body text-center"><i class="ci-edit h3 mt-2 mb-4 text-primary"></i>
                    <h3 class="h5 mb-1">Read the blog <i class="fa-solid fa-lock fs-6"></i></h3>
                    <p class="text-muted fs-sm">Latest store, fashion news and trends</p>
                </div>
</div></div>
        <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent" href="#">
                <div class="card-body text-center"><i class="ci-instagram h3 mt-2 mb-4 text-accent"></i>
                    <h3 class="h5 mb-1">Follow on Instagram</h3>
                    <p class="text-muted fs-sm">@thriftZaarNepal</p>
                </div>
            </a></div>
    </div>
</section>

<?php
require_once("./layouts/footer.php");
?>