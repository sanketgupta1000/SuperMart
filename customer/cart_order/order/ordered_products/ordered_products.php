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
    <title>Ordered Products</title>
    <link rel="stylesheet" href="ordered_products.css">
</head>
<body>
    <?php require("./../../../helpers/customer_header_nav.html") ?>
    <?php require("./ordered_products_view.php") ?>
    <div class="buttoncont">
        <button onclick="window.print();">Print</button>
    </div>
    <h3>Thank You For Shopping WIth Us!</h3>
    <script src="/supermart/helpers/base_menu.js"></script>
</body>
</html>