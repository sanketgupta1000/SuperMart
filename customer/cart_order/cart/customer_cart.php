<?php
    require("./../../helpers/customer_sess_exp_check.php");
    require("./../helpers/empty_cart_check.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="customer_cart.css">
</head>
<body>
    <?php require("./../../helpers/customer_header_nav.html"); ?>
    <h2>My Cart</h2>
    <div class="container">
        <?php require("customer_cart_view.php"); ?>
    </div>
    <a href="/supermart/customer/cart_order/order/process/order_process.php" id="buynow">Buy Now</a>
    <script src="/supermart/customer/home/customer_home.js"></script>
    <script src="/supermart/helpers/base_menu.js"></script>
</body>
</html>