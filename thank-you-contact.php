<?php
require_once("modules/config.php");
require_once("./layouts/header.php");

if (isset($_SESSION['alert'])) {
?>
<div class="alert alert-<?= $_SESSION['alert']['type'] ?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['alert']['msg'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    unset($_SESSION['alert']);
}
?>

<!-- Page Title-->
<div class="bg-secondary py-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="<?= url('') ?>"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item"><a class="text-nowrap" href="contact.php">Contact</a></li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Thank You</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">Thank You!</h1>
        </div>
    </div>
</div>

<!-- Thank you section -->
<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="card border-0 shadow">
                <div class="card-body p-5">
                    <i class="ci-check-circle display-1 text-success mb-4"></i>
                    <h2 class="h3 mb-4">Thank you for contacting us!</h2>
                    <p class="fs-5 text-muted mb-4">We have received your message and will get back to you within 24-48 hours.</p>
                    <?php if (isset($_SESSION['contact_data'])): 
                        $data = $_SESSION['contact_data'];
                        unset($_SESSION['contact_data']);
                    ?>
                    <div class="alert alert-info">
                        <h5>Message Confirmation:</h5>
                        <p><strong>Name:</strong> <?= htmlspecialchars($data['name']) ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars($data['email']) ?></p>
                        <p><strong>Phone:</strong> <?= htmlspecialchars($data['phone']) ?></p>
                        <?php if (!empty($data['subject'])): ?>
                            <p><strong>Subject:</strong> <?= htmlspecialchars($data['subject']) ?></p>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="<?= url('') ?>" class="btn btn-primary">Back to Home</a>
                        <a href="contact.php" class="btn btn-outline-primary">Send Another Message</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick contact info (reuse from contact.php) -->
<section class="container pb-grid-gutter">
    <h2 class="h3 text-center mb-5">Get in Touch</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="text-center">
                <i class="ci-location h3 text-primary mb-3"></i>
                <h5>Main Store</h5>
                <p class="text-muted">Dudpati, Bhaktapur, Nepal</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="text-center">
                <i class="ci-phone h3 text-primary mb-3"></i>
                <h5>Phone</h5>
                <p class="text-muted">+977 9749744496</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="text-center">
                <i class="ci-mail h3 text-primary mb-3"></i>
                <h5>Email</h5>
                <p class="text-muted">customer@thriftzaar.com</p>
            </div>
        </div>
    </div>
</section>

<?php require_once("./layouts/footer.php"); ?>
