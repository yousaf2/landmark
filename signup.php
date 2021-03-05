<?php

require_once('common/conn.php');
require('common/enc-dec-password.php');

if(isset($_POST['signup']) && $_POST['signup']==1){
		$email=$_POST['email'];
        $username=$_POST['username'];
		$password=$_POST['password'];
		$status=1;
		$role=0;
		$action='encrypt';
		$pwd=encrypt_decrypt($action,$password);

		$check_user_existance = "SELECT * FROM users WHERE `email`= '$email'";
		$response = mysqli_query($con, $check_user_existance);

		if(mysqli_num_rows($response) > 0){
			echo "email_already_exist";
		}
		else{
			$insert_user = "INSERT INTO users SET `username`= '$username', `email`= '$email', `password`= '$pwd', 
				`status`= '$status', `role`= '$role'";
				$add_user = mysqli_query($con, $insert_user);
				if($add_user){
					echo "user_is_added";
				}else{
					echo "Something went wrong!";
				}
		}			
	}
?>





