<?php
    require("./../../helpers/customer_sess_running_check.php");
?>

<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="/supermart/customer/login_signup/helpers/style.css">
</head>
<body>
     <form action="/supermart/customer/login_signup/signup/signup_check.php" method="post">
     	<h2>Registration</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

         
          <label for="uname">User Name</label>
          <?php if (isset($_GET['username'])) { ?>
               <input type="text" 
                      name="username" 
                      placeholder="User Name"
                      id="uname"
                      value="<?php echo $_GET['username']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="username"
                      id="uname"
                      placeholder="User Name">
          <?php }?>


     	<label for="pword">Password</label>
     	<input type="password" 
                 name="password" 
                 id="pword"
                 placeholder="Password">

          <label for="cpword">Confirm Password</label>
          <input type="password" 
                 name="re_password" 
                 id="cpword"
                 placeholder="Confirm Password">

     	<input type="submit" value="Sign Up">
          <input type="reset" value="Reset">
          <a href="/supermart/welcome/welcome.html" id="cancel">Cancel</a>
          <a href="/supermart/customer/login_signup/login/login.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>