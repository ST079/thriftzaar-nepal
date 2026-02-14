<div class="container pb-5 mb-sm-4">
    <div class="pt-5 d-flex justify-content-center">
        <div class="card shadow-sm border-0 text-center p-4" style="max-width:500px;">

            <div class="mb-3">
                <i class="ci-bag fs-1 text-primary"></i>
            </div>

            <h2 class="h4 mb-2 fw-bold">
                Nothing here yet,
                <span class="text-primary">
                    <?= $_SESSION['user']['first_name']." ".$_SESSION['user']['last_name'] ?>
                </span>
            </h2>

            <p class="text-muted mb-4">
                Looks a bit empty right now. Try browsing products!
            </p>

            <a href="hamro-pasal.php" class="btn btn-primary">
                <i class="ci-shop me-2"></i>
                Browse Products
            </a>

        </div>
    </div>
</div>
