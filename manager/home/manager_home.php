<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Manager</title>

    <link rel="stylesheet" href="/supermart/manager/home/manager_home.css">
</head>
<body>
    <header>
        <img src="/supermart/helpers/images/nav.png" id="menu">
        <h2 class="pagetitle">SuperMart - Manager</h2>
    </header>
    
    <nav style="display: block;">
        <ul class="navlinksbox">
            <li class="navlinkitem"><a href="#" class="navlink">Home</a></li>
            <li class="navlinkitem"><a href="#" class="navlink">About Us</a></li>
            <li class="navlinkitem"><a href="#" class="navlink">Contact Us</a></li>
            <li class="navlinkitem"><a href="#" class="navlink">Work With Us</a></li>
        </ul>
    </nav>

    <h3>
        Inventory
        <button class="btn" id="add">Add New Product</button>
    </h3>

    <div class="container">
        <?php require './manager_home_view.php'?>
    </div>

    <script src="/supermart/helpers/base_menu.js"></script>
    <script src="/supermart/manager/home/manager_home.js"></script>
</body>
</html>