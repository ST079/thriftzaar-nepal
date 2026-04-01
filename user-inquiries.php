<?php
require_once("./modules/config.php");
protected_area();
require_once("./layouts/header.php");
$user_id = $_SESSION["user"]["user_id"];
$user_inquiries = db_select("inquiries", "user_id = $user_id");

?>

<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="<?= url('') ?>"><i
                                class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Customer Inquiries</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Customer Inquiries</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <?php require_once("./layouts/account-sidebar.php"); ?>
        <!-- Content  -->
        <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
                <p class="mb-0 h5">Total: <?= count($user_inquiries) ?></p>
                <a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="<?= url("/logout.php") ?>"><i
                        class="ci-sign-out me-2"></i>Sign out</a>
            </div>
            <!-- Content-->
            <section class="pt-lg-4 pb-4 mb-3">
                <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                    <div class="d-sm-flex flex-wrap justify-content-between align-items-center border-bottom">
                        <h2 class="h3 py-2 me-2 text-center text-sm-start">All Messages<span
                                class="badge bg-faded-accent fs-sm text-body align-middle ms-2"><?= count($user_inquiries) ?></span>
                        </h2>
                    </div>

                    <?php if (empty($user_inquiries)): ?>
                        <?php require_once("nothing-here.php"); ?>
                    <?php else: ?>
                        <div class="row g-3 mt-3">
                            <?php foreach ($user_inquiries as $inquiry): ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="card-title mb-2"><?= htmlspecialchars($inquiry['name']) ?></h6>
                                            <p class="text-muted small mb-1"><i
                                                    class="ci-mail me-1"></i><?= htmlspecialchars($inquiry['email']) ?></p>
                                            <p class="text-muted small mb-2"><i
                                                    class="ci-phone me-1"></i><?= htmlspecialchars($inquiry['phone']) ?></p>
                                            <h6 class="mb-2"><?= htmlspecialchars($inquiry['subject'] ?: 'No Subject') ?></h6>
                                            <p class="small text-muted mb-3">
                                                <?= htmlspecialchars(short_words($inquiry['message'], 50)) ?></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span
                                                    class="badge bg-info fs-sm"><?= date('M j', strtotime($inquiry['created_at'])) ?></span>
                                                <button class="btn btn-sm btn-outline-danger delete-btn"
                                                    data-id="<?= $inquiry['i_id'] ?>" data-table="inquiries">
                                                    <i class="ci-trash"></i> Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </section>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).on("click", ".delete-btn", function () {
        if (!confirm("Delete this inquiry?")) return;
        var btn = $(this);
        var id = btn.data("id");
        var table = btn.data("table");
        $.post("admin-delete.php", { id: id, table: table }, function (resp) {
            if (resp.trim() === "success") {
                btn.closest('.col-md-6, .col-lg-4').fadeOut(300, function () { $(this).remove(); });
            } else {
                alert("Delete failed.");
            }
        });
    });
</script>

<?php require_once("./layouts/footer.php"); ?>

<!-- footer -->
<?php
require_once("./layouts/footer.php");
?>