<?php
    if(count($_COOKIE)==1)
    {
        echo "<script> alert('Your cart is empty!'); </sript>";
        header("location: /supermart/customer/home/customer_home.php");
        exit();
    }
?>