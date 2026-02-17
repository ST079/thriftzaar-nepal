<?php
require_once("./layouts/header.php");
?>
<!-- Content -->
<div class="container py-4 py-lg-5 my-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="h4 mb-1">Sign in</h2>
                    <div class="py-3">
                        <h3 class="d-inline-block align-middle fs-base fw-medium mb-2 me-2">With social account:</h3>
                        <div class="d-inline-block align-middle"><a class="btn-social bs-google me-2 mb-2" href="#"
                                data-bs-toggle="tooltip" title="Sign in with Google"><i class="ci-google"></i></a><a
                                class="btn-social bs-facebook me-2 mb-2" href="#" data-bs-toggle="tooltip"
                                title="Sign in with Facebook"><i class="ci-facebook"></i></a><a
                                class="btn-social bs-twitter me-2 mb-2" href="#" data-bs-toggle="tooltip"
                                title="Sign in with Twitter"><i class="ci-twitter"></i></a></div>
                    </div>
                    <hr>
                    <h3 class="fs-base pt-4 pb-2">Or using form below</h3>
                    <form class="needs-validation" novalidate method="POST" action="login-logic.php">
                        <div class=" input-group mb-3"><i
                                class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                            <input class="form-control rounded-start" name="email" type="email" placeholder="Email"
                                required>
                        </div>
                        <div class="input-group mb-3"><i
                                class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                            <div class="password-toggle w-100">
                                <input class="form-control" name="password" type="password" placeholder="Password"
                                    required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                        class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked id="remember_me">
                                <label class="form-check-label" for="remember_me">Remember me</label>
                            </div><a class="nav-link-inline fs-sm" href="account-password-recovery.html">Forgot
                                password?</a>
                        </div>
                        <hr class="mt-4">
                        <div class="text-end pt-4">
                            <button class="btn btn-primary" type="submit"><i class="ci-sign-in me-2 ms-n21"></i>Sign
                                In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 pt-4 mt-3 mt-md-0">
            <h2 class="h4 mb-3">No account? Sign up</h2>
            <p class="fs-sm text-muted mb-4">Registration takes less than a minute but gives you full control over your
                orders.</p>
            <form class="needs-validation" novalidate method="POST" action="register-logic.php">
                <div class="row gx-4 gy-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="reg-fn">First Name</label>
                        <input class="form-control" name="first_name" type="text" required id="reg-fn">
                        <div class="invalid-feedback">Please enter your first name!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="reg-ln">Last Name</label>
                        <input class="form-control" name="last_name" type="text" required id="reg-ln">
                        <div class="invalid-feedback">Please enter your last name!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="reg-email">E-mail Address</label>
                        <input class="form-control" name="email" type="email" required id="reg-email">
                        <div class="invalid-feedback">Please enter valid email address!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="reg-phone">Phone Number</label>
                        <input class="form-control" name="phone" type="text" required id="reg-phone">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="reg-password">Password</label>
                        <input class="form-control" name="password" type="password" required id="reg-password">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="reg-password-confirm">Confirm Password</label>
                        <input class="form-control" name="password_1" type="password" required
                            id="reg-password-confirm">
                        <div class="invalid-feedback">Passwords do not match!</div>
                    </div>
                    <div class="col-12 text-end">
                        <button class="btn btn-primary" type="submit"><i class="ci-user me-2 ms-n1"></i>Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Footer -->
<script>
    document.addEventListener("DOMContentLoaded", function () {

        'use strict';

        const forms = document.querySelectorAll('.needs-validation');

        Array.from(forms).forEach(function (form) {

            form.addEventListener('submit', function (event) {

                const password = form.querySelector('#reg-password');
                const confirmPassword = form.querySelector('#reg-password-confirm');
                const phone = form.querySelector('#reg-phone');

                // STRONG PASSWORD VALIDATION
                if (password) {
                    const strongPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
                    const feedbackDiv = password.closest('.col-sm-6').querySelector('.invalid-feedback');

                    if (!strongPassword.test(password.value)) {
                        password.setCustomValidity("Password must be 8+ chars with uppercase, lowercase & number.");
                        if (feedbackDiv) feedbackDiv.textContent = password.validationMessage;
                    } else {
                        password.setCustomValidity("");
                        if (feedbackDiv) feedbackDiv.textContent = "Please enter password!";
                    }
                }

                // CONFIRM PASSWORD MATCH
                if (password && confirmPassword) {
                    const feedbackDiv = confirmPassword.closest('.col-sm-6').querySelector('.invalid-feedback');

                    if (password.value !== confirmPassword.value) {
                        confirmPassword.setCustomValidity("Passwords do not match!");
                        if (feedbackDiv) feedbackDiv.textContent = confirmPassword.validationMessage;
                    } else {
                        confirmPassword.setCustomValidity("");
                        if (feedbackDiv) feedbackDiv.textContent = "Passwords do not match!";
                    }
                }

                // PHONE VALIDATION
                if (phone) {
                    const phonePattern = /^[0-9]{10}$/;
                    const feedbackDiv = phone.closest('.col-sm-6').querySelector('.invalid-feedback');

                    if (!phonePattern.test(phone.value)) {
                        phone.setCustomValidity("Enter valid phone number (10 digits).");
                        if (feedbackDiv) feedbackDiv.textContent = phone.validationMessage;
                    } else {
                        phone.setCustomValidity("");
                        if (feedbackDiv) feedbackDiv.textContent = "Please enter your phone number!";
                    }
                }

                // Prevent submit if invalid
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');

            }, false);

       
            // REAL-TIME CONFIRM PASSWORD CHECK
            const passwordField = form.querySelector('#reg-password');
            const confirmPasswordField = form.querySelector('#reg-password-confirm');

            if (passwordField && confirmPasswordField) {
                const feedbackDiv = confirmPasswordField.closest('.col-sm-6').querySelector('.invalid-feedback');

                confirmPasswordField.addEventListener('keyup', function () {
                    if (passwordField.value !== confirmPasswordField.value) {
                        confirmPasswordField.setCustomValidity("Passwords do not match!");
                        if (feedbackDiv) feedbackDiv.textContent = confirmPasswordField.validationMessage;
                    } else {
                        confirmPasswordField.setCustomValidity("");
                        if (feedbackDiv) feedbackDiv.textContent = "Passwords do not match!";
                    }
                });
            }

        });

    });
</script>



<?php
require_once("./layouts/footer.php");
?>