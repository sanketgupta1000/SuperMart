<?php 
	session_start(); 
	require_once "./../../../helpers/config.php";

	if (isset($_POST['username']) && isset($_POST['password'])  && isset($_POST['re_password'])) {

		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$uname = validate($_POST['username']);
		$pass = validate($_POST['password']);

		$re_pass = validate($_POST['re_password']);
		

		$user_data = 'username='. $uname;

		if (empty($uname)) {
			header("Location: /supermart/customer/login_signup/signup/signup.php?error=User Name is required&$user_data");
			exit();
		}else if(empty($pass)){
			header("Location: /supermart/customer/login_signup/signup/signup.php?error=Password is required&$user_data");
			exit();
		}
		else if(empty($re_pass)){
			header("Location: /supermart/customer/login_signup/signup/signup.php?error=Confirm Password is required&$user_data");
			exit();
		}


		else if($pass !== $re_pass){
			header("Location: /supermart/customer/login_signup/signup/signup.php?error=The confirmation password does not match&$user_data");
			exit();
		}

		else{

			//now checking if username alrady exists
			//declaring query string
			$sql = "SELECT * FROM `user_details` WHERE `username`=?;";
			
			//preparing + binding parameters + executing
			if($result=mysqli_execute_query($link, $sql, [$uname]))
			{
				if (mysqli_num_rows($result) > 0)
				{
					//username already exists
					header("Location: /supermart/customer/login_signup/signup/signup.php?error=The username is taken try another&$user_data");
					exit();
				}
				else
				{
					//username is available

					// hashing the password
					$pass = password_hash($pass, PASSWORD_DEFAULT);

					//now populating the user_details table
					//declaring query string
					$sql2 = "INSERT INTO `user_details` (`username`, `password`) VALUES (?, ?);";

					//preparing + binding parameters + executing
					if(mysqli_execute_query($link, $sql2, [$uname, $pass]))
					{
						//insertion success
						header("Location: /supermart/customer/login_signup/login/login.php?success=Your account has been created successfully");
						exit();
					}
					else
					{
						//failed to insert
						header("Location: /supermart/customer/login_signup/signup/signup.php?error=Failed to insert data into database&$user_data");
						exit();
					}
				}
			}
			else
			{
				header("Location: /supermart/customer/login_signup/signup/signup.php?error=Failed to check if username already exists&$user_data");
				exit();
			}
		}
		
	}
	else
	{
		header("Location: /supermart/customer/login_signup/signup/signup.php?error=Please fill in all the details");
		exit();
	}
?>