</main>
<!-- Footer-->
<footer class="footer bg-dark pt-5">
  <div class="pt-5 bg-darker">
    <div class="container">
      <div class="row pb-3">
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="d-flex"><i class="ci-rocket text-primary" style="font-size: 2.25rem;"></i>
            <div class="ps-3">
              <h6 class="fs-base text-light mb-1">Fast and free delivery</h6>
              <p class="mb-0 fs-ms text-light opacity-50">Free delivery for all orders over $200</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="d-flex"><i class="ci-currency-exchange text-primary" style="font-size: 2.25rem;"></i>
            <div class="ps-3">
              <h6 class="fs-base text-light mb-1">Money back guarantee</h6>
              <p class="mb-0 fs-ms text-light opacity-50">We return money within 30 days</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="d-flex"><i class="ci-support text-primary" style="font-size: 2.25rem;"></i>
            <div class="ps-3">
              <h6 class="fs-base text-light mb-1">24/7 customer support</h6>
              <p class="mb-0 fs-ms text-light opacity-50">Friendly 24/7 customer support</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="d-flex"><i class="ci-card text-primary" style="font-size: 2.25rem;"></i>
            <div class="ps-3">
              <h6 class="fs-base text-light mb-1">Secure online payment</h6>
              <p class="mb-0 fs-ms text-light opacity-50">We possess SSL / Secure сertificate</p>
            </div>
          </div>
        </div>
      </div>
      <hr class="hr-light mb-5">
      <div class="row pb-2">
        <div class="col-md-6 text-center text-md-start mb-4">
          <div class="text-nowrap mb-4"><a class="d-inline-block align-middle mt-n1 me-3" href="#"><img class="d-block"
                src="img/TM.png" width="190" alt="Cartzilla"></a>

          </div>
          <div class="widget widget-links widget-light">
            <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
              <li class="widget-list-item me-4"><a class="widget-list-link" href="#">Support</a></li>
              <li class="widget-list-item me-4"><a class="widget-list-link" href="#">Privacy</a></li>
              <li class="widget-list-item me-4"><a class="widget-list-link" href="#">Terms of use</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 text-center text-md-end mb-4">
          <div class="mb-3">
            <a class="btn-social bs-light bs-facebook ms-2 mb-2" href="#"><i class="ci-facebook"></i></a>
            <a class="btn-social bs-light bs-instagram ms-2 mb-2" href="#"><i class="ci-instagram"></i></a>
          </div>
        </div>
      </div>
      <div class="pb-4 fs-xs text-light opacity-50 text-center text-md-start">© All rights reserved. Made by <a
          class="text-light" href="https://createx.studio/" target="_blank" rel="noopener">ThriftZaar Nepal</a></div>
    </div>
  </div>
</footer>
<!-- Toolbar for handheld devices (Default)-->
<div class="handheld-toolbar">
  <div class="d-table table-layout-fixed w-100">
    <a class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse"
      data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)"><span class="handheld-toolbar-icon"><i
          class="ci-menu"></i></span><span class="handheld-toolbar-label">Menu</span></a>
    <a class="d-table-cell handheld-toolbar-item" href="cart.php"><span class="handheld-toolbar-icon"><i
          class="ci-cart"></i><span class="badge bg-primary rounded-pill ms-1"><?php if (is_logged_in()) {
            echo $cart_cont;
          } else {
            echo "";
          } ?></span></span><span class="handheld-toolbar-label">NPR
        <?= $cart_total ?></span></a>
  </div>
</div>
<!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span
    class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon ci-arrow-up"> </i></a>
<!-- Vendor scrits: js libraries and plugins-->
<script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="vendor/simplebar/dist/simplebar.min.js"></script>
<script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script src="vendor/drift-zoom/dist/Drift.min.js"></script>
<script src="vendor/lightgallery/lightgallery.min.js"></script>
<script src="vendor/lightgallery/plugins/video/lg-video.min.js"></script>

<!-- Main theme script-->
<script src="js/theme.min.js"></script>
</body>

<!-- Mirrored from cartzilla.createx.studio/home-fashion-store-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Oct 2023 15:49:43 GMT -->

</html>