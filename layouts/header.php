<?php
require_once __DIR__ . "/../modules/config.php";
$allowed_pages = [
    "/thriftzaar-nepal/",
    "/thriftzaar-nepal/hamro-pasal.php",
    "/thriftzaar-nepal/contact.php",
    "/thriftzaar-nepal/orders.php",
    "/thriftzaar-nepal/product.php",
    "/thriftzaar-nepal/account-profile.php",
    "/thriftzaar-nepal/account-orders.php",
    "/thriftzaar-nepal/admin-categories-add.php",
    "/thriftzaar-nepal/admin-categories.php",
    "/thriftzaar-nepal/admin-products-add.php",
    "/thriftzaar-nepal/admin-products.php",
    "/thriftzaar-nepal/cart-process-add.php",
    "/thriftzaar-nepal/cart.php",
    "/thriftzaar-nepal/cart-process-remove.php",
    "/thriftzaar-nepal/checkout.php",
    "/thriftzaar-nepal/review.php",
    "/thriftzaar-nepal/contact.php",
    "/thriftzaar-nepal/complete-order.php",
    "/thriftzaar-nepal/login.php",
    "/thriftzaar-nepal/page-not-found.php",
    "/thriftzaar-nepal/admin-users.php",
    "/thriftzaar-nepal/update-profile.php",
    "/thriftzaar-nepal/update-product.php"
];
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);



if (!in_array($request, $allowed_pages)) {
    header("Location: /thriftzaar-nepal/page-not-found.php");
    die();
}
$products = db_select("products");

$cart_count = 0;
$cart_items = [];
$cart_total = 0;
$my_cart_counter = 0;
if (isset($_SESSION["cart"])) {
    if (is_array($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $key => $item) {
            $cart_total += $item['selling_price'];
            $my_cart_counter++;
            if ($my_cart_counter > 5) {
                continue;
            }
            $cart_items[] = $item;
        }
        $cart_count = count($_SESSION["cart"]);
    }
}

$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from cartzilla.createx.studio/home-fashion-store-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Oct 2023 15:49:32 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <title>ThriftZaar | ReFashion Store</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="ThriftZaar">
    <meta name="keywords"
        content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="icon" type="image/x-icon" sizes="180x180" href="img/logo-icon.ico">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
    <!-- Google Tag Manager-->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    '../www.googletagmanager.com/gtm5445.html?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WKV3GT5');
    </script>
</head>
<!-- Body-->

<body class="handheld-toolbar-enabled">
    <!-- Google Tag Manager (noscript)-->
    <noscript>
        <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0"
            style="display: none; visibility: hidden;"></iframe>
    </noscript>

    <main class="page-wrapper">
        <!-- Navbar 3 Level (Light)-->
        <header class="shadow-sm">
            <!-- Topbar-->
            <div class="topbar topbar-dark bg-dark">
                <div class="container">
                    <div class="topbar-text dropdown d-md-none"><a class="topbar-link dropdown-toggle" href="#"
                            data-bs-toggle="dropdown">Useful links</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="tel:00331697720"><i
                                        class="ci-support text-muted me-2"></i>(+977) 9749844496</a></li>
                            <li><a class="dropdown-item" href="#"><i class="ci-location text-muted me-2"></i>Bhaktapur,
                                    Nepal</a></li>
                        </ul>
                    </div>
                    <div class="topbar-text text-nowrap d-none d-md-inline-block"><i class="ci-support"></i><span
                            class="text-muted me-1">Support</span><a class="topbar-link" href="tel:00331697720">(+977)
                            9749844496</a>
                    </div>
                    <div class="tns-carousel tns-controls-static d-none d-md-block">
                        <div class="tns-carousel-inner"
                            data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false}">
                            <div class="topbar-text">Welcome to ThriftZaar Nepal</div>
                            <div class="topbar-text">We return money within 30 days</div>
                            <div class="topbar-text">Friendly 24/7 customer support</div>
                        </div>
                    </div>
                    <div class="ms-3 text-nowrap"><a class="topbar-link me-4 d-none d-md-inline-block" href="#"><i
                                class="ci-location"></i>Bhaktapur, Nepal</a>
                    </div>
                </div>
            </div>
            <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
            <div class="navbar-sticky bg-light">
                <div class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="<?= url("") ?>">
                            <img src="img/logo-removebg.png" width="195" alt="ThriftZaar Nepal">
                        </a>
                   
                        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu d-flex flex-shrink-0 align-items-center">
                            <div class="container">
                                <div class="collapse navbar-collapse" id="navbarCollapse">
                                    <ul class="navbar-nav">
                                        <li
                                            class="nav-item <?= ($currentPath == "/thriftzaar-nepal/" || $currentPath == '/thriftzaar-nepal/index.php') ? 'active' : '' ?>">
                                            <a class="nav-link" href="<?= url("") ?>">Home</a>
                                        </li>
                                        <li
                                            class="nav-item <?= ($currentPath == '/thriftzaar-nepal/hamro-pasal.php') ? 'active' : '' ?>">
                                            <a class="nav-link" href="<?= url("/hamro-pasal.php") ?>">Hamro Pasal</a>
                                        </li>
                                        <li
                                            class="nav-item <?= ($currentPath == '/thriftzaar-nepal/contact.php') ? 'active' : '' ?>">
                                            <a class="nav-link" href="<?= url("/contact.php") ?>">Contact</a>
                                        </li>
                                        <li
                                            class="nav-item <?= ($currentPath == '/thriftzaar-nepal/account-orders.php') ? 'active' : '' ?>">
                                            <a class="nav-link <?php is_logged_in() ? "" : "disabled" ?> "
                                                href="account-orders.php">Orders</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a
                                class="navbar-tool navbar-stuck-toggler" href="#"><span
                                    class="navbar-tool-tooltip">Expand menu</span>
                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
                            </a>

                            <?php if (is_logged_in()) { ?>
                                <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="account-profile.php">
                                <?php } else { ?>
                                    <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="login.php">
                                    <?php } ?>

                                    <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                                    <div class="navbar-tool-text ms-n3">
                                        <?php if (is_logged_in()) { ?>
                                            <small>Hello, <?= $_SESSION['user']['first_name'] ?></small>
                                        <?php } else { ?>
                                            <small>Hello, Sign in</small>
                                        <?php } ?>
                                        My Account
                                    </div>
                                </a>
                                <div class="navbar-tool dropdown ms-3"><a
                                        class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="cart.php"><span
                                            class="navbar-tool-label"><?php if (is_logged_in()) {
                                                echo $cart_count;
                                            } else {
                                                echo "";
                                            } ?></span><i class="navbar-tool-icon ci-cart"></i></a><a
                                        class="navbar-tool-text" href="cart.php"><small>My
                                            Cart</small><?= $cart_total ?></a>
                                    <!-- Cart dropdown-->
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                                            <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                                                <?php foreach ($cart_items as $item) { ?>
                                                    <div class="widget-cart-item pb-2 border-bottom">
                                                        <a href="cart-process-remove.php?id=<?= $item['p_id'] ?>">
                                                            <button class="btn-close text-danger" type="button"
                                                                aria-label="Remove"><span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </a>
                                                        <div class="d-flex align-items-center"><a class="flex-shrink-0"
                                                                href="product.php?id=<?= $item['p_id'] ?>"><img
                                                                    src="<?= get_product_thumb($item['photos']) ?>"
                                                                    width="64" alt="Product"></a>
                                                            <div class="ps-2">
                                                                <h6 class="widget-product-title"><a
                                                                        href="product.php?id=<?= $item['p_id'] ?>"><?= $item['p_name'] ?></a>
                                                                </h6>
                                                                <div class="widget-product-meta"><span
                                                                        class="text-accent me-2">NPR
                                                                        <?= $item['selling_price'] ?>.<small>00</small></span><span
                                                                        class="text-muted">x 1</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div
                                                class="d-flex flex-wrap justify-content-between align-items-center py-3">
                                                <div class="fs-sm me-2 py-2"><span
                                                        class="text-muted">Subtotal:</span><span
                                                        class="text-accent fs-base ms-1">NPR
                                                        <?= $cart_total ?>.<small>00</small></span>
                                                </div>
                                                <a class="btn btn-outline-secondary btn-sm" href="cart.php">Expand
                                                    cart<i class="ci-arrow-right ms-1 me-n1"></i></a>
                                            </div><a class="btn btn-primary btn-sm d-block w-100 <?=($cart_count == 0) ? 'd-none' : ''; ?>" href="checkout.php"><i
                                                    class="ci-card me-2 fs-base align-middle"></i>Checkout</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        </header>

        <!-- alert notification -->
        <?php
        if (isset($_SESSION['alert'])) {
            ?>
            <div
                class="alert alert-<?= $_SESSION['alert']['type'] ?> container mt-3 d-flex justify-content-center align-items-center">
                <p>
                    <?= $_SESSION['alert']['msg'] ?>
                </p>
            </div>
            <?php
            unset($_SESSION['alert']);
        }
        ?>

        <script>
            setTimeout(() => {
                document.querySelector('.alert')?.remove();
            }, 5000);
        </script>