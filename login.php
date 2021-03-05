<?php
require_once('common/conn.php');
require('common/enc-dec-password.php');
session_start();
if(isset($_COOKIE["is_login"])){
    $id = $_COOKIE["is_login"];
    $active_status = 1;
    $getUser = "SELECT * FROM users WHERE id = '".$id."' AND status = '".$active_status."'";
    $getUser = mysqli_query($con, $getUser);
    if(mysqli_num_rows($getUser) > 0)
    {
        $row = mysqli_fetch_assoc($getUser);
        $email = $row['email'];
        $password = $row['password'];
        $action= 'decrypt';
        $pass = encrypt_decrypt( $action , $password);
        $_SESSION["login"] = $email;
    }
}else{
    $email = "";
    $pass = "";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="user/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="user/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="user/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="user/assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="user/assets/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="bg-silver-300" style="background-color: ivory !important">
    <div class="content">
        <div class="brand">
            <a class="link" href="#">Property Mark</a>
        </div>
        <form action="" method="post" id="login-form">
            <h2 class="login-title">Log in</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="email" name="email" value="<?=$email?>" id="email" placeholder="Email" autocomplete="off">
                    <label id="no_account" style="color:red; display:none;"></label>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" value="<?=$pass?>" id="password" placeholder="Password">
                    <label id="password_msg" style="color:red; display:none;"></label>
                    <label id="blocked_account" style="color:red; display:none;"></label>
                </div>
            </div>
            <div class="form-group d-flex justify-content-between">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox" id="remember_me" checked>
                    <span class="input-span"></span>Remember me</label>
                <a href="forgot_password.html">Forgot password?</a>
            </div>
            <div class="form-group">
                <input type="submit" name="login" value="Login" class="btn btn-info btn-block">
            </div>
            <div class="social-auth-hr">
                <span>Not have an account</span>
            </div>
            <!-- <div class="text-center social-auth m-b-20">
                <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i class="fa fa-google-plus"></i></a>
                <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fa fa-linkedin"></i></a>
                <a class="btn btn-social-icon btn-vk" href="javascript:;"><i class="fa fa-vk"></i></a>
            </div> -->
            <div class="text-center">Become a member
                <a class="color-blue" href="register.php">Create account</a>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="user/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="user/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="user/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="user/assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="user/assets/js/app.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
    <script>
        $('#login-form').on('submit', function(event) {
            event.preventDefault();
            var user_info = $(this).serializeArray();
            var email = user_info[0].value;
            var password = user_info[1].value;
            if ($('#remember_me').is(':checked'))
            // var remember_me=user_info[2].value;
            {
                var remember_me = "on";
            } else {
                var remember_me = "off";
            }
            if (email != '' &&
                password != '' &&
                remember_me != '') {
                $.ajax({
                    type: 'POST',
                    url: 'usrlogin.php',
                    data: {
                        'login': 1,
                        'email': email,
                        'password': password,
                        'remember_me': remember_me
                    },
                    success: function(ajax_responce) {
                        if ($.trim(ajax_responce) == 'Wrong_Password') {
                            document.getElementById("password_msg").innerHTML = "This is a wrong password";
                            $('#password_msg').css('display', 'block');
                            $('#Password').val('');
                            $('#Password').focus();
                        }
                        if ($.trim(ajax_responce) == 'This_Account_Is_Blocked_By_Admin') {
                            document.getElementById("blocked_account").innerHTML = "This Account Is Blocked By The Admin";
                            $('#blocked_account').css('display', 'block');
                            setTimeout(function(){ $('#blocked_account').css('display', 'none'); }, 2000);
                        }
                        if ($.trim(ajax_responce) == 'No_Account_Exist_Against_Provided_Email') {
                            // window.location.replace("index.php");
                            document.getElementById("no_account").innerHTML = "This email doesn't exist";
                            $('#no_account').css('display', 'block');
                            $('#email').val('');
                            $('#email').focus();
                            setTimeout(function(){ $('#no_account').css('display', 'none'); }, 1000);
                        }
                        if ($.trim(ajax_responce) == 'admin_login') {
                            window.location.replace("admin/index.php");
                        }
                        if ($.trim(ajax_responce) == 'user_login') {
                            window.location.replace("user/index.php");
                        }
                    }
                });
            } else {
                return false;
            }
        });
    </script>
</body>

</html>