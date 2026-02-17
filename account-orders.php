<?php
require_once("./modules/config.php");
protected_area();
require_once("./layouts/header.php");

$user_type = $_SESSION["user"]["user_type"];
$user_id = $_SESSION["user"]["user_id"];
$orders = [];

if ($user_type == 'admin') {
  $orders = db_select("orders");
} else {
  global $conn;
  $sql = "SELECT orders.*, users.user_id FROM  orders 
  JOIN  users ON orders.user_id = users.user_id WHERE orders.user_id = $user_id ORDER BY orders.order_id DESC";
  $res = $conn->query($sql);
  while ($row = $res->fetch_assoc()) {
    $orders[] = $row;
  }
}
?>

<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
          <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
          </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Orders history</li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">Orders</h1>
    </div>
  </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
  <div class="row">
    <!-- Sidebar-->
    <?php require_once("./layouts/account-sidebar.php"); ?>
    <!-- Content  -->
    <section class="col-lg-8">
      <!-- Toolbar-->
      <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
        <div class="d-flex align-items-center">
          <label class="d-none d-lg-block fs-sm text-light text-nowrap opacity-75 me-2" for="order-sort">Sort
            orders:</label>
          <label class="d-lg-none fs-sm text-nowrap opacity-75 me-2" for="order-sort">Sort orders:</label>
          <select class="form-select" id="order-sort">
            <option>All</option>
            <option>Delivered</option>
            <option>In Progress</option>
            <option>Delayed</option>
            <option>Canceled</option>
          </select>
        </div><a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="<?= url("/logout.php") ?>"><i
            class="ci-sign-out me-2"></i>Sign out</a>
      </div>
      <!-- Orders list-->
      <div class="table-responsive fs-md mb-4">
        <table class="table table-hover mb-0">

          <thead class="<?php echo $orders ? '' : 'd-none'; ?>">
            <tr>
              <th>Order #</th>
              <th>Date Purchased</th>
              <th>Status</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            if ($orders) {
              foreach ($orders as $order) { ?>

                <tr>
                  <td class="py-3">
                    <a class="nav-link-style fw-medium fs-sm" href="#order-details" data-bs-toggle="modal">
                      <?= htmlspecialchars($order['order_id']) ?>
                    </a>
                  </td>

                  <td class="py-3">
                    <?= date("F d, Y", strtotime($order['order_time'])) ?>
                  </td>

                  <td class="py-3">
                    <?php
                    if ($order['order_status'] == 1) {
                      $status_text = 'In Progress';
                      $badge_class = 'bg-info';
                    } elseif ($order['order_status'] == 0) {
                      $status_text = 'Completed';
                      $badge_class = 'bg-success';
                    } elseif ($order['order_status'] == -1) {
                      $status_text = 'Canceled';
                      $badge_class = 'bg-danger';
                    } else {
                      $status_text = 'Unknown';
                      $badge_class = 'bg-secondary';
                    }
                    ?>
                    <span class="badge <?= $badge_class ?> m-0">
                      <?= htmlspecialchars($status_text) ?>
                    </span>
                  </td>

                  <td class="py-3">
                    NPR <?= number_format($order['total_price'], 0) ?>
                  </td>

                  <!-- Cancel Button Column -->
                  <td class="py-3">
                    <?php if ($order['order_status'] == 1) { ?>

                      <form method="POST" action="cancel-order.php"
                        onsubmit="return confirm('Are you sure you want to cancel this order?');">

                        <input type="hidden" name="order_id" value="<?= htmlspecialchars($order['order_id']) ?>">

                        <button type="submit" class="btn btn-sm btn-outline-danger">
                          Cancel Order
                        </button>

                      </form>

                    <?php } else { ?>
                      <span class="text-muted">—</span>
                    <?php } ?>
                  </td>

                </tr>

              <?php }
            } else {
              require_once('nothing-here.php');
            } ?>
          </tbody>

        </table>
      </div>

    </section>
  </div>
</div>

<!-- footer -->
<?php
require_once("./layouts/footer.php");
?>