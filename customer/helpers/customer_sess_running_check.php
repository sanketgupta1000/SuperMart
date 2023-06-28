<?php
    session_start();
    if(isset($_SESSION['username']) and isset($_SESSION['userid']))
    {
        header("location: /supermart/customer/home/customer_home.php");
        exit();
    }
?>