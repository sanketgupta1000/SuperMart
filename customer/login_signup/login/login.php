<?php
require("./../../helpers/customer_sess_running_check.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SuperMart | Login</title>
        <link rel="stylesheet" href="/supermart/customer/login_signup/helpers/style.css">
        <style>
            h1 {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <!-- <h1>SuperMarket</h1> -->

        <!--<p>Please fill this form and submit to create your account in the database.</p>-->
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <h2>Account Login</h2>
            <?php
            if (isset($_GET['success'])) {
                echo "<p class='success'>{$_GET['success']}</p>";
            } else if (isset($_GET['error'])) {
                echo "<p class='error'>{$_GET['error']}</p>";
            }
            ?>

            <label for="uname">Username</label>
            <input type="text" name="username" placeholder="Username" id="uname">
            <label for="pword">Password</label>
            <input type="password" name="password" placeholder="Password" id="pword">
            <label for="captcha">Captcha</label>
            <img src="/supermart/customer/login_signup/login/captcha.php" style="text-align: center;" id="captchaimg">
            <img src="/supermart/customer/login_signup/login/images/refresh.png" alt="Refresh Captcha" id="refresh" style="width: 35px">
            <input type="text" name="captcha" placeholder="Enter Captcha">
            <input type="submit" value="Login">
            <input type="reset" value="Reset">
            <a href="/supermart/welcome/welcome.html" id="cancel">Cancel</a>
            <a href="/supermart/customer/login_signup/signup/signup.php" class="ca">Create an account</a>
        </form>

        <script>
            let refresh =document.getElementById("refresh");
            let captcha =document.getElementById("captchaimg");

            function refreshCaptcha()
            {
                captcha.src="/supermart/customer/login_signup/login/captcha.php";
            }

            refresh.addEventListener("click", refreshCaptcha);

        </script>
    </body>

</html>


<?php

require_once "./../../../helpers/config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST["username"]) and !empty($_POST["password"]) and isset($_POST["username"]) and isset($_POST["password"]) and !empty($_POST['captcha']) and isset($_POST['captcha'])) {

        //checking captcha
        session_start();
        if($_POST['captcha']!=$_SESSION['CAPTCHA_CODE'])
        {
            header("location: /supermart/customer/login_signup/login/login.php?error=Invalid Captcha Code");
            exit();
        }

        $uname = $_POST["username"];
        $password = $_POST["password"];

        //now, will compare unhashed password with hashed password

        //declaring query string to get hashed password
        $sql = "SELECT * FROM `user_details` WHERE `username`=?;";

        //preparing + binding parameters + executing
        if ($result = mysqli_execute_query($link, $sql, [$uname])) {
            $row = mysqli_fetch_array($result);
            if (mysqli_num_rows($result)) {
                //successfully fetched hashed password
                if (password_verify($password, $row['password'])) {
                    //password matched
                    //so starting session now
                    session_start();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['userid'] = $row['user_id'];
                    header("location: /supermart/customer/home/customer_home.php");
                } else {
                    //password did not match
                    header("location: /supermart/customer/login_signup/login/login.php?error=Invalid username or password");
                }
            } else {
                //incorrect details
                header("location: /supermart/customer/login_signup/login/login.php?error=Invalid username or password");
            }
        } else {
            header("location: /supermart/customer/login_signup/login/login.php?error=Unable to execute query");
        }


    } else {
        header("location: /supermart/customer/login_signup/login/login.php?error=Please enter username, password, and captcha code");
    }
}
?>