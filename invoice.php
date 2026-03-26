<?php
require_once("./modules/config.php");
protected_area();

if (!isset($_GET['id'])) {
    die("Invalid Order ID");
}

$order_id = intval($_GET['id']);

global $conn;

// Fetch order + user info
$sql = "SELECT orders.*, users.first_name, users.last_name, users.email 
        FROM orders 
        JOIN users ON orders.user_id = users.user_id 
        WHERE orders.order_id = $order_id";

$order_res = $conn->query($sql);

if ($order_res->num_rows == 0) {
    die("Order not found");
}

$order = $order_res->fetch_assoc();
$order_items = json_decode($order['cart'], true);
?>
<!DOCTYPE html>
<html>

<head>
    <title>ThriftZaar Nepal - Online Thrift Marketplace</title>
    <link rel="icon" type="image/x-icon" sizes="180x180" href="img/logo-icon.ico">
    <link href="css/theme.min.css" rel="stylesheet">
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;

        }
        .invoice-box {
            background: #fff;
            padding: 30px;
            margin: 30px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-box::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 500px;
            height: 500px;
            background: url('img/logo-removebg.png') no-repeat center;
            background-size: contain;
            opacity: 0.2;
            transform: translate(-50%, -50%);
            z-index: 0;
        }

        .invoice-box * {
            position: relative;
            z-index: 1;
        }

        @media print {
            button {
                display: none !important;
            }

            .invoice-box::before {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                opacity: 0.2 !important;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="invoice-box">
            <div class="d-flex justify-content-between mb-4">
                <div class="d-flex gap-3 align-items-center">
                    <img src="img/logo-removebg.png" width="120">
                    <h2>Invoice</h2>
                </div>
                <button onclick="window.print()" class="btn btn-primary">Print</button>
            </div>
            <hr>
            <div class="row mb-4 mt-4">
                <div class="col-md-6">
                    <h5>Customer Info</h5>
                    <p>
                        <strong>Name:</strong>
                        <?= htmlspecialchars($order['first_name'] . " " . $order['last_name']) ?><br>
                        <strong>Email:</strong> <?= htmlspecialchars($order['email']) ?><br>
                    </p>
                </div>

                <div class="col-md-6 text-end">
                    <h5>Order Info</h5>
                    <p>
                        <strong>Order ID:</strong> #<?= $order_id ?><br>
                        <strong>Date:</strong> <?= date("F d, Y", $order['order_time']) ?><br>
                    </p>
                </div>
            </div>

            <table class="table  table-hover mb-0">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $grand_total = 100;

                    foreach ($order_items as $item) {
                        $total = $item['quantity'] * $item['selling_price'];
                        $grand_total += $total;
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($item['p_name']) ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td>NPR <?= number_format($item['selling_price'], 0) ?></td>
                            <td>NPR <?= number_format($total, 0) ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3">Delivery Charge </td>
                        <td>NPR 100</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-end mt-4">
                <h4>Total: NPR <?= number_format($grand_total, 0) ?></h4>
            </div>
            <hr>
            <p class="text-center text-muted mt-3">Thank you for your purchase!</p>
            <div class="row mt-5">
                <div class="text-end">
                    <p><strong>Authorized Signature</strong></p>
                    <img src="img/logo-removebg.png" alt="Signature" width="120"><br>
                </div>
            </div>
        </div>
    </div>
</body>

</html>