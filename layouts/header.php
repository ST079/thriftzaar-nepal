<?php
require_once __DIR__ . "/../modules/config.php";

$cart_cont = 0;
$cart_items=[];
$cart_total = 0;
$my_cart_counter = 0;
if(isset($_SESSION["cart"])){
    if(is_array($_SESSION["cart"])){
        foreach($_SESSION["cart"] as $key => $item){
            $cart_total += $item['selling_price'];
            $my_cart_counter++;
            if($my_cart_counter>5){
                continue;
            }
            $cart_items[]=$item;
        }
        $cart_cont = count($_SESSION["cart"]);
    }
}
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
    <meta name="keywords" content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="icon" type="image/x-icon" sizes="180x180" href="img/logo-icon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet"  href="../css/styles.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
    <!-- Google Tag Manager-->
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-WKV3GT5');
    </script>
  </head>
<!-- Body-->

<body class="handheld-toolbar-enabled">
    <!-- Google Tag Manager (noscript)-->
    <noscript>
        <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0"
            style="display: none; visibility: hidden;"></iframe>
    </noscript>
    <!-- Sign in / sign up modal-->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link fw-medium active" href="#signin-tab"
                                data-bs-toggle="tab" role="tab" aria-selected="true"><i
                                    class="ci-unlocked me-2 mt-n1"></i>Sign in</a></li>
                        <li class="nav-item"><a class="nav-link fw-medium" href="#signup-tab" data-bs-toggle="tab"
                                role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Sign up</a></li>
                    </ul>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body tab-content py-4">
                    <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate
                        id="signin-tab">
                        <div class="mb-3">
                            <label class="form-label" for="si-email">Email address</label>
                            <input class="form-control" type="email" id="si-email" placeholder="johndoe@example.com"
                                required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="si-password">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="si-password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                        class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 d-flex flex-wrap justify-content-between">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="si-remember">
                                <label class="form-check-label" for="si-remember">Remember me</label>
                            </div><a class="fs-sm" href="#">Forgot password?</a>
                        </div>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign in</button>
                    </form>
                    <form class="needs-validation tab-pane fade" autocomplete="off" novalidate id="signup-tab">
                        <div class="mb-3">
                            <label class="form-label" for="su-name">Full name</label>
                            <input class="form-control" type="text" id="su-name" placeholder="John Doe" required>
                            <div class="invalid-feedback">Please fill in your name.</div>
                        </div>
                        <div class="mb-3">
                            <label for="su-email">Email address</label>
                            <input class="form-control" type="email" id="su-email" placeholder="johndoe@example.com"
                                required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="su-password">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="su-password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                        class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="su-password-confirm">Confirm password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="su-password-confirm" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                        class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                            <li><a class="dropdown-item" href="#"><i
                                        class="ci-location text-muted me-2"></i>Nepal</a></li>
                        </ul>
                    </div>
                    <div class="topbar-text text-nowrap d-none d-md-inline-block"><i class="ci-support"></i><span
                            class="text-muted me-1">Support</span><a class="topbar-link" href="tel:00331697720">(+977) 9749844496</a>
                        </div>
                    <div class="tns-carousel tns-controls-static d-none d-md-block">
                        <div class="tns-carousel-inner"
                            data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false}">
                            <div class="topbar-text">Welcome to ThriftZaar Nepal</div>
                            <div class="topbar-text">We return money within 30 days</div>
                            <div class="topbar-text">Friendly 24/7 customer support</div>
                        </div>
                    </div>
                    <div class="ms-3 text-nowrap"><a class="topbar-link me-4 d-none d-md-inline-block"
                            href="#"><i class="ci-location"></i>Nepal</a>
                    </div>
                </div>
            </div>
            <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
            <div class="navbar-sticky bg-light">
                <div class="navbar navbar-expand-lg navbar-light">
                    <div class="container"><a class="navbar-brand d-none d-sm-block flex-shrink-0" href="<?= url("") ?>"><img
                                src="img/logo-removebg.png" width="195" alt="ThriftZaar Nepal"></a>
                        <div class="input-group d-none d-lg-flex mx-4">
                            <input class="form-control rounded-end pe-5" type="text"
                                placeholder="Search for products"><i
                                class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i>
                        </div>
                        <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a
                                class="navbar-tool navbar-stuck-toggler" href="#"><span
                                    class="navbar-tool-tooltip">Expand menu</span>
                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
                            </a><a class="navbar-tool d-none d-lg-flex" href="account-wishlist.html"><span
                                    class="navbar-tool-tooltip">Wishlist</span>
                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-heart"></i></div>
                            </a>

                                <?php if (is_logged_in()) { ?>
                                    <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="account-profile.php">
                                <?php } else { ?>
                                <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="#signin-modal" data-bs-toggle="modal">
                                <?php } ?>

                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                                <div class="navbar-tool-text ms-n3">
                                    <?php if (is_logged_in()) { ?>
                                        <small>Hello, <?=$_SESSION['user']['first_name'] ?></small>
                                    <?php } else { ?>
                                        <small>Hello, Sign in</small>
                                    <?php } ?>
                                    My Account
                                </div>
                            </a>
                            <div class="navbar-tool dropdown ms-3"><a
                                    class="navbar-tool-icon-box bg-secondary dropdown-toggle"
                                    href="cart.php"><span class="navbar-tool-label"><?=$cart_cont?></span><i
                                        class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text"
                                    href="cart.php"><small>My Cart</small><?=$cart_total?></a>
                                <!-- Cart dropdown-->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                                        <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                                            <?php foreach($cart_items as $item){?>
                                            <div class="widget-cart-item pb-2 border-bottom">
                                                <a href="cart-process-remove.php?id=<?=$item['p_id']?>">
                                                <button class="btn-close text-danger" type="button"
                                                    aria-label="Remove"><span aria-hidden="true">&times;</span>
                                                </button>
                                                </a>
                                                <div class="d-flex align-items-center"><a class="flex-shrink-0"
                                                        href="product.php?id=<?=$item['p_id']?>"><img
                                                            src="<?= get_product_thumb($item['photos']) ?>" width="64"
                                                            alt="Product"></a>
                                                    <div class="ps-2">
                                                        <h6 class="widget-product-title"><a
                                                                href="product.php?id=<?= $item['p_id'] ?>"><?=$item['p_name']?></a>
                                                        </h6>
                                                        <div class="widget-product-meta"><span
                                                                class="text-accent me-2">NPR <?=$item['selling_price']?>.<small>00</small></span><span
                                                                class="text-muted">x 1</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                                            <div class="fs-sm me-2 py-2"><span class="text-muted">Subtotal:</span><span
                                                    class="text-accent fs-base ms-1">NPR <?=$cart_total?>.<small>00</small></span>
                                            </div>
                                            <a class="btn btn-outline-secondary btn-sm" href="cart.php">Expand
                                                cart<i class="ci-arrow-right ms-1 me-n1"></i></a>
                                        </div><a class="btn btn-primary btn-sm d-block w-100"
                                            href="checkout.php"><i
                                                class="ci-card me-2 fs-base align-middle"></i>Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <!-- Search-->
                            <div class="input-group d-lg-none my-3"><i
                                    class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                                <input class="form-control rounded-start" type="text" placeholder="Search for products">
                            </div>
                            <!-- Departments menu-->
                            <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0" href="#"
                                        data-bs-toggle="dropdown"><i class="ci-view-grid me-2"></i>Departments</a>
                                    <div class="dropdown-menu px-2 pb-4">
                                        <div class="d-flex flex-wrap flex-sm-nowrap">
                                            <div class="mega-dropdown-column pt-3 pt-sm-4 px-2 px-lg-3">
                                                <div class="widget widget-links"><a
                                                        class="d-block overflow-hidden rounded-3 mb-3" href="#"><img
                                                            src="img/shop/departments/01.jpg" alt="Clothing"></a>
                                                    <h6 class="fs-base mb-2">Clothing</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Women's
                                                                clothing</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Men's clothing</a>
                                                        </li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Kid's clothing</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                                <div class="widget widget-links"><a
                                                        class="d-block overflow-hidden rounded-3 mb-3" href="#"><img
                                                            src="img/shop/departments/02.jpg" alt="Shoes"></a>
                                                    <h6 class="fs-base mb-2">Shoes</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Women's shoes</a>
                                                        </li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Men's shoes</a>
                                                        </li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Kid's shoes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                                <div class="widget widget-links"><a
                                                        class="d-block overflow-hidden rounded-3 mb-3" href="#"><img
                                                            src="img/shop/departments/03.jpg" alt="Gadgets"></a>
                                                    <h6 class="fs-base mb-2">Gadgets</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Smartphones &amp;
                                                                Tablets</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Wearable
                                                                gadgets</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">E-book readers</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap flex-sm-nowrap">
                                            <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                                <div class="widget widget-links"><a
                                                        class="d-block overflow-hidden rounded-3 mb-3" href="#"><img
                                                            src="img/shop/departments/04.jpg" alt="Furniture"></a>
                                                    <h6 class="fs-base mb-2">Furniture &amp; Decor</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Home furniture</a>
                                                        </li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Office
                                                                furniture</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Lighting and
                                                                decoration</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                                <div class="widget widget-links"><a
                                                        class="d-block overflow-hidden rounded-3 mb-3" href="#"><img
                                                            src="img/shop/departments/05.jpg" alt="Accessories"></a>
                                                    <h6 class="fs-base mb-2">Accessories</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Hats</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Sunglasses</a>
                                                        </li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Bags</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                                <div class="widget widget-links"><a
                                                        class="d-block overflow-hidden rounded-3 mb-3" href="#"><img
                                                            src="img/shop/departments/06.jpg" alt="Entertainment"></a>
                                                    <h6 class="fs-base mb-2">Entertainment</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Kid's toys</a>
                                                        </li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Video games</a>
                                                        </li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link"
                                                                href="#">Outdoor /
                                                                Camping</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <!-- Primary menu-->
                            <ul class="navbar-nav">
                                <li class="nav-item  active"><a class="nav-link" href="<?=url("")?>"
                                >Home</a>
                                </li>
                                <li class="nav-item dropdown"><a class="nav-link" href="<?=url("/hamro-pasal.php")?>">Hamro Pasal</a>
                                </li>
                                 <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                    >About Us</a>
                                </li>
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                    >Contact</a>
                                </li>
                                 <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                    >Orders</a>
                                </li>
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown">Docs / Components</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="docs/dev-setup.html">
                                                <div class="d-flex">
                                                    <div class="lead text-muted pt-1"><i class="ci-book"></i></div>
                                                    <div class="ms-2"><span
                                                            class="d-block text-heading">Documentation</span><small
                                                            class="d-block text-muted">Kick-start
                                                            customization</small>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="components/typography.html">
                                                <div class="d-flex">
                                                    <div class="lead text-muted pt-1"><i class="ci-server"></i>
                                                    </div>
                                                    <div class="ms-2"><span class="d-block text-heading">Components<span
                                                                class="badge bg-info ms-2">40+</span></span><small
                                                            class="d-block text-muted">Faster page building</small>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="docs/changelog.html">
                                                <div class="d-flex">
                                                    <div class="lead text-muted pt-1"><i class="ci-edit"></i></div>
                                                    <div class="ms-2"><span class="d-block text-heading">Changelog<span
                                                                class="badge bg-success ms-2">v2.5.1</span></span><small
                                                            class="d-block text-muted">Regular updates</small></div>
                                                </div>
                                            </a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="mailto:support@createx.studio">
                                                <div class="d-flex">
                                                    <div class="lead text-muted pt-1"><i class="ci-help"></i></div>
                                                    <div class="ms-2"><span
                                                            class="d-block text-heading">Support</span><small
                                                            class="d-block text-muted">support@createx.studio</small>
                                                    </div>
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- alert notification -->
        <?php
        if (isset($_SESSION['alert'])) {
            ?>
            <div class="alert alert-<?= $_SESSION['alert']['type'] ?> container mt-3 d-flex justify-content-center align-items-center">
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