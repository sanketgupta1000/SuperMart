<?php
    session_start();
    if((!isset($_SESSION['username'])) or (!isset($_SESSION['userid'])))
    {
        //session expired
        header("location: /supermart/customer/login_signup/login/login.php?error=Session expired. Please login.");
        exit();
    }
    
?>