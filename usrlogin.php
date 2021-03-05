<?php


require_once('common/conn.php');
require('common/enc-dec-password.php');
session_start();
ob_start();



if(isset($_POST['login']) && $_POST['login']==1){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember_me = $_POST['remember_me'];
    $active_status = '1';

    // to prevent from sql injections
    $password = mysqli_real_escape_string($con, $password);
    $email = mysqli_real_escape_string($con, $email);
    // to prevent from jquery scripts
    $password = htmlentities($password);
    $email = htmlentities($email);
    // create cookie
	$cookie_name = 'property_login';
	$cookie_expiry =  time() + (86400 * 30);
    $getUser = "SELECT * FROM users WHERE email = '".$email."' AND status = '".$active_status."'";
    $getUser = mysqli_query($con, $getUser);
    if(mysqli_num_rows($getUser) > 0)
    {
        $row = mysqli_fetch_assoc($getUser);
        $id = $row['id'];
        $u_name = $row['username'];
        $u_pass = $row['password'];
        $u_role = $row['role'];
        $cookie_value=$row['id'];
        if($remember_me === 'on'){
           setcookie("is_login" , $cookie_value , $cookie_expiry , "/");
        }

        $action= 'decrypt';
        $pass = encrypt_decrypt( $action , $u_pass);

        if($password === $pass){
            $_SESSION['user_exist'] = $u_name;
            if(! $u_role == '0'){
                echo"admin_login";
            }
            else
            {
                echo"user_login";
            }
            
        }
        else
        {
            echo"Wrong_Password";
        }

    }
    else
    {

        $blocked_status = '0';
        $getBlockedUser = "SELECT * FROM users WHERE email = '".$email."' AND status = '".$blocked_status."'";
        $getBlockedUser = mysqli_query($con, $getBlockedUser);
        if(mysqli_num_rows($getBlockedUser) > 0)
        {
            echo "This_Account_Is_Blocked_By_Admin";
        }else{
            echo "No_Account_Exist_Against_Provided_Email";
        }
    }
}
?>