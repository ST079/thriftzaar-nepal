<?php
require_once("./modules/config.php");
protected_area();
require_once("./layouts/header.php");
?>

<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i
                                class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Profile info</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Profile info</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <!-- sidebar layout call -->
        <?php require_once("./layouts/account-sidebar.php"); ?>
        <!-- Content  -->
        <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                <h6 class="fs-base text-light mb-0">Update you profile details below:</h6><a
                    class="btn btn-primary btn-sm" href="<?= url("/logout.php") ?>"><i class="ci-sign-out me-2"></i>Sign
                    out</a>
            </div>
            <!-- Profile form-->
            <form>
                <div class="bg-secondary rounded-3 p-4 mb-4">
                    <div class="d-flex align-items-center"><img class="rounded" src="img/shop/account/default.png"
                            width="90" alt="Susan Gardner">
                        <div class="ps-3">
                            <button class="btn btn-light btn-shadow btn-sm mb-2" type="button"><i
                                    class="ci-loading me-2"></i>Change avatar</button>
                            <div class="p mb-0 fs-ms text-muted">Upload JPG, JPEG or PNG image. 300 x 300 required.</div>
                        </div>
                    </div>
                </div>
                <div class="row gx-4 gy-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="account-fn">First Name</label>
                        <input class="form-control" type="text" id="account-fn" value="<?= $_SESSION['user']['first_name']?>">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="account-ln">Last Name</label>
                        <input class="form-control" type="text" id="account-ln" value="<?= $_SESSION['user']['last_name']?>">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="account-email">Email Address</label>
                        <input class="form-control" type="email" id="account-email" value="<?= $_SESSION['user']['email']?>"
                            disabled>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="account-phone">Phone Number</label>
                        <input class="form-control" type="text" id="account-phone" value="<?= $_SESSION['user']['phone_number']?>" required>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="account-pass">New Password</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="account-pass">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span
                                    class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="account-confirm-pass">Confirm Password</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="account-confirm-pass">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span
                                    class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr class="mt-2 mb-3">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <button class="btn btn-primary mt-3 mt-sm-0" type="button">Update profile</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>

<!-- footer -->
<?php
require_once("./layouts/footer.php");
?>