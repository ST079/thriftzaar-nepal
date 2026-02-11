<?php
$categories = db_select("categories");
$products = db_select("products");
?>
<!-- Sidebar-->
<aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
    <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
        <div class="d-md-flex justify-content-between align-items-center text-center text-md-start p-4">
            <div class="d-md-flex align-items-center">
                <div class="img-thumbnail rounded-circle position-relative flex-shrink-0 mx-auto mb-2 mx-md-0 mb-md-0"
                    style="width: 6.375rem;"><span class="badge bg-warning position-absolute end-0 mt-n2"
                        data-bs-toggle="tooltip" title="Reward points">384</span><img class="rounded-circle"
                        src="img/shop/account/default.png" alt="<?= $_SESSION['user']['first_name'] ?>"></div>
                <div class="ps-md-3">
                    <h3 class="fs-base mb-0"><?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'] ?>
                    </h3><span class="text-accent fs-sm"><?= $_SESSION['user']['email'] ?></span>
                </div>
            </div><a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu" data-bs-toggle="collapse"
                aria-expanded="false"><i class="ci-menu me-2"></i>Account menu</a>
        </div>
        <div class="d-lg-block collapse" id="account-menu">
            <div class="bg-secondary px-4 py-3">
                <h3 class="fs-sm mb-0 text-muted">Admin Dashboard</h3>
            </div>
            <ul class="list-unstyled mb-0">
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                        href="account-orders.php"><i class="ci-bag opacity-60 me-2"></i>Orders<span
                            class="fs-sm text-muted ms-auto">1</span></a></li>
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                        href="admin-categories.php"><i class="ci-list opacity-60 me-2"></i>Categories<span
                            class="fs-sm text-muted ms-auto"><?= count($categories) ?></span></a></li>
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                        href="admin-products.php"><i class="ci-truck opacity-60 me-2"></i>Products <span
                            class="fs-sm text-muted ms-auto"><?= count($products) ?></span></a></li>
            </ul>

            <div class="bg-secondary px-4 py-3">
                <h3 class="fs-sm mb-0 text-muted">My Account</h3>
            </div>
            <ul class="list-unstyled mb-0">
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active"
                        href="<?= url("/account-profile.php") ?>"><i class="ci-user opacity-60 me-2"></i>Profile
                        info</a></li>
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                        href="account-address.html"><i class="ci-location opacity-60 me-2"></i>Addresses</a>
                </li>
                <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                        href="account-payment.html"><i class="ci-card opacity-60 me-2"></i>Payment methods</a>
                </li>
                <li class="d-lg-none border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                        href="<?= url("/logout.php") ?>"><i class="ci-sign-out opacity-60 me-2"></i>Sign out</a>
                </li>
            </ul>
        </div>
    </div>
</aside>