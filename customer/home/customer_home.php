<?php
    require("./../helpers/customer_sess_exp_check.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Customer</title>
    <link rel="stylesheet" href="customer_home.css">
</head>
<body>

    <?php require("./../helpers/customer_header_nav.html"); ?>
    <?php echo "<h3>Hi, ".$_SESSION['username']."! Add your favourite items to cart from below:</h3>"; ?>
    
    <div class="container">
        <?php require("./customer_home_view.php"); ?>
    </div>

    <script src="/supermart/helpers/base_menu.js"></script>
    <script src="customer_home.js"></script>
</body>
</html>