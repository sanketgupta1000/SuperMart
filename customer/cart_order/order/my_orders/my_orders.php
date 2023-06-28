<?php
    //checking if session expired
    require("./../../../helpers/customer_sess_exp_check.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="my_orders.css">
</head>
<body>
    <?php require("./../../../helpers/customer_header_nav.html") ?>
    <div class="tablecont">
        <?php require("./my_orders_view.php") ?>
    </div>
    <script src="/supermart/helpers/base_menu.js"></script>
</body>
</html>