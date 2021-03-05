<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Register</title>
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
        <form id="register-form" action="signup.php" method="post">
            <h2 class="login-title">Sign Up</h2>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" id="username" placeholder="User Name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" id="email" placeholder="Email" autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control" id="password" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group text-left">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox" name="agree">
                    <span class="input-span"></span>I agree the terms and policy</label>
            </div>
            <div class="form-group">
                <input type="submit" value="Sign Up" class="btn btn-info btn-block">
            </div>
            <div class="social-auth-hr">
                <span>Want to login</span>
            </div>
            <!-- <div class="text-center social-auth m-b-20">
                <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i class="fa fa-google-plus"></i></a>
                <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fa fa-linkedin"></i></a>
                <a class="btn btn-social-icon btn-vk" href="javascript:;"><i class="fa fa-vk"></i></a>
            </div> -->
            <div class="text-center">Already a member?
                <a class="color-blue" href="login.php">Login here</a>
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
            $('#register-form').validate({
                errorClass: "help-block",
                rules: {
                    first_name: {
                        required: true,
                        minlength: 2
                    },
                    last_name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        confirmed: true
                    },
                    password_confirmation: {
                        equalTo: password
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
        $('#register-form').on('submit', function(event) {
            event.preventDefault();
            var user_info = $(this).serializeArray();
            var username = user_info[0].value;
            var email = user_info[1].value;
            var password = user_info[2].value
            if (username != '' &&
                email != '' &&
                password != '') {
                $.ajax({
                    type: 'POST',
                    url: 'signup.php',
                    data: {
                        'signup': 1,
                        'email': email,
                        'username': username,
                        'password': password
                    },
                    success: function(ajax_responce) {
                        if ($.trim(ajax_responce) == 'email_already_exist') {
                            var emailfocus = document.getElementById("email_msg").innerHTML = "Email Already Exist!";
                            $('#email_msg').css('display', 'block');
                            $('#email').val('');
                            $('#email').focus();
                        }
                        if ($.trim(ajax_responce) == 'user_is_added') {
                            window.location.replace("user/index.php");
                        }
                    }
                });
            } else {
                return false;
            }
        })
    </script>




</body>

</html>