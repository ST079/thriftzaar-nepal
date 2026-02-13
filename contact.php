<?php
require_once("modules/config.php");
require_once("./layouts/header.php");
?>

<!-- Page Title (Light)-->
<div class="bg-secondary py-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="<?=url("")?>"><i
                                class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Contacts</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">Contacts</h1>
        </div>
    </div>
</div>
<!-- Contact detail cards-->
<section class="container-fluid pt-grid-gutter">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#map" data-scroll>
                <div class="card-body text-center"><i class="ci-location h3 mt-2 mb-4 text-primary"></i>
                    <h3 class="h6 mb-2">Main store address</h3>
                    <p class="fs-sm text-muted">Dudpati, Bhaktapur <br> Nepal</p>
                </div>
            </a></div>
        <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
                <div class="card-body text-center"><i class="ci-time h3 mt-2 mb-4 text-primary"></i>
                    <h3 class="h6 mb-3">Working hours</h3>
                    <ul class="list-unstyled fs-sm text-muted mb-0">
                        <li>Mon - Fri: 10AM - 7PM</li>
                        <li class="mb-0">Sta: 11AM - 5PM</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
                <div class="card-body text-center"><i class="ci-phone h3 mt-2 mb-4 text-primary"></i>
                    <h3 class="h6 mb-3">Phone numbers</h3>
                    <ul class="list-unstyled fs-sm mb-0">
                        <li><span class="text-muted me-1">For customers:</span><a class="nav-link-style"
                                href="tel:+108044357260">+977 9749744496</a></li>
                        <li class="mb-0"><span class="text-muted me-1">Tech support:</span><a class="nav-link-style"
                                href="tel:+100331697720">+977 9762447050</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
                <div class="card-body text-center"><i class="ci-mail h3 mt-2 mb-4 text-primary"></i>
                    <h3 class="h6 mb-3">Email addresses</h3>
                    <ul class="list-unstyled fs-sm mb-0">
                        <li><span class="text-muted me-1">For customers:</span><a class="nav-link-style"
                                href="mailto:+108044357260">customer@thriftzaar.com</a></li>
                        <li class="mb-0"><span class="text-muted me-1">Tech support:</span><a class="nav-link-style"
                                href="mailto:support@example.com">support@thriftzaar.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Split section: Map + Contact form-->
<div class="container-fluid px-0" id="map">
    <div class="row g-0">
        <div class="col-lg-6 iframe-full-height-wrap">
            <iframe class="iframe-full-height" width="600" height="250"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1485.6669468365903!2d85.42152675903985!3d27.66996604041913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1aa39515e461%3A0x8a1b8a0147782c1d!2sBhaktapur%20Multiple%20Campus!5e0!3m2!1sen!2snp!4v1770974958061!5m2!1sen!2snp"></iframe>
        </div>
        <div class="col-lg-6 px-4 px-xl-5 py-5 border-top">
            <h2 class="h4 mb-4">Drop us a line</h2>
            <form class="needs-validation mb-3" novalidate>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="cf-name">Your name:&nbsp;<span
                                class="text-danger">*</span></label>
                        <input class="form-control" name="name" type="text" id="cf-name" placeholder="Enter Your Name"
                            required>
                        <div class="invalid-feedback">Please fill in you name!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="cf-email">Email address:&nbsp;<span
                                class="text-danger">*</span></label>
                        <input class="form-control" name="email" type="email" id="cf-email" placeholder="abc@email.com"
                            required>
                        <div class="invalid-feedback">Please provide valid email address!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="cf-phone">Your phone:&nbsp;<span
                                class="text-danger">*</span></label>
                        <input class="form-control" name="phone" type="text" id="cf-phone"
                            placeholder="+977 000 000 000" required>
                        <div class="invalid-feedback">Please provide valid phone number!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="cf-subject">Subject:</label>
                        <input class="form-control" name="subject" type="text" id="cf-subject"
                            placeholder="Provide short title of your request">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="cf-message">Message:&nbsp;<span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" name="message" id="cf-message" rows="6"
                            placeholder="Please describe in detail your request" required></textarea>
                        <div class="invalid-feedback">Please write a message!</div>
                        <button class="btn btn-primary mt-4" type="submit">Send message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once("./layouts/footer.php");
?>