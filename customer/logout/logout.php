<?php
    require("./../helpers/customer_sess_exp_check.php");

    session_destroy();
    header("location: /supermart/customer/login_signup/login/login.php?success=Logout successful.");
?>

