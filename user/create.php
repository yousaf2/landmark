<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Form Advanced Plugins</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="./assets/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" />
    <link href="./assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="./assets/vendors/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->


    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <style>
        input[type="file"] {
        display:block;
        }
        .imageThumb {
        max-height: 75px;
        border: 2px solid;
        margin: 10px 10px 0 0;
        padding: 1px;
        }
    </style>
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="index.html">
                    <span class="brand">Property
                        <span class="brand-tip">.Mark</span>
                    </span>
                    <span class="brand-mini">AC</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li>
                        <form class="navbar-search" action="javascript:;">
                            <div class="rel">
                                <span class="search-icon"><i class="ti-search"></i></span>
                                <input class="form-control" placeholder="Search here...">
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="./assets/img/admin-avatar.png" />
                            <span></span>Profile<i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a>
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" href="../logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="./assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong">James Brown</div><small>User Panel</small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="index.php"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li class="heading">FEATURES</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Properties</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="create.php">Add New</a>
                            </li>
                            <li>
                                <a href="published-properties.php">Published Adds</a>
                            </li>
                            <li>
                                <a href="#">Pending</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Prfile</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="#">Settings</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../logout.php"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">My Property</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Property Details</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-body">

                                <form id="create-property" enctype='multipart/form-data'>
                                    <div class="form-group">
                                        <label class="form-control-label">Property Type *</label>
                                        <select class="form-control select2_demo_1 property-type" name="property-type">
                                        <optgroup label="Select Property Type">
                                            <option value="home">Home</option>
                                            <option value="residential-plot">Residential Plot</option>
                                            <option value="commercial-plot">Commercial Plot</option>
                                            <option value="plot-files">Plot Files</option>
                                            <option value="apartment">Apartment</option>
                                            <option value="plaza">Plaza</option>
                                            <option value="villa">Villa</option>
                                            <option value="farm">Farm</option>
                                            <option value="agricultural-land">Agricultural Land</option>
                                            <option value="industrial-land">Industrial Land</option>
                                    </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Property Status *</label>
                                        <select class="form-control select2_demo_1 property-status" name="property-status">
                                        <optgroup label="Select Staus">
                                            <option value="for-rent">For Rent</option>
                                            <option value="for-sale">For Sale</option>
                                    </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Price *</label>
                                        <input class="form-control" name="price" id="price" type="number" min="0" placeholder="0" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Area Size *</label>
                                        <input class="form-control" name="size" id="size" type="text" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Size Type *</label>
                                        <select class="form-control select2_demo_1 size-type" name="size-type">
                                        <optgroup label="Select">
                                            <option value="marla">Marla</option>
                                            <option value="kanal">Kanal</option>
                                            <option value="square-feet">Square Feet</option>
                                            <option value="square-meters">Square Meters</option>
                                            <option value="acers">Acers</option>
                                    </select>
                                    </div>

                                    <br>
                                    <h4>Property Location</h4>
                                    <hr>
                                    <br>

                                    <div class="form-group">
                                        <label>Plot/Building/House No.</label>
                                        <input class="form-control" type="text" name="plot" id="plot">
                                    </div>
                                    <div class="form-group">
                                        <label>Block/Street</label>
                                        <input class="form-control" type="text" name="street" id="street">
                                    </div>
                                    <div class="form-group">
                                        <label>Phase</label>
                                        <input class="form-control" type="text" name="phase" id="phase">
                                    </div>
                                    <div class="form-group">
                                        <label>Society/Area *</label>
                                        <input class="form-control" type="text" name="society" id="society" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">City *</label>
                                        <select class="form-control select2_demo_1 city" name="city">
                                        <optgroup label="Select City">
                                            <option value="city-1">Lahore</option>
                                            <option value="city-2">Karachi</option>
                                    </select>
                                    </div>

                                    <br>
                                    <hr>

                                    <h4>Upload property images *</h4>
                                    <div class="field" align="left">
                                        <input type="file" name="files[]" id="files" multiple required>
                                    </div>

                                    <br><br><br>
                                    <h4>Contact Information</h4>
                                    <hr>
                                    <br>

                                    <div class="form-group">
                                        <label>Full Name *</label>
                                        <input class="form-control" type="text" name="fullname" id="fullname" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number *</label>
                                        <input class="form-control" type="text" name="phone" id="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input class="form-control" type="text" name="email" id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Select Role *</label>
                                        <select class="form-control select2_demo_1 role" name="role">
                                        <optgroup label="Select">
                                            <option value="owner">Owner</option>
                                            <option value="seller">Seller</option>
                                            <option value="agent">Agent</option>
                                            <option value="agency">Agency</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Country *</label>
                                        <select class="form-control select2_demo_1 country" name="country">
                                        <optgroup label="Your Country">
                                            <option value="pakistan">Pakistan</option>
                                            <option value="india">India</option>
                                            <option value="usa">USA</option>
                                            <option value="uae">UAE</option>
                                    </select>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <input type="submit" name="property" value="submit" class="btn btn-outline-info">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
                <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    <div class="theme-config">
        <div class="theme-config-toggle"><i class="fa fa-cog theme-config-show"></i><i class="ti-close theme-config-close"></i></div>
        <div class="theme-config-box">
            <div class="text-center font-18 m-b-20">SETTINGS</div>
            <div class="font-strong">LAYOUT OPTIONS</div>
            <div class="check-list m-b-20 m-t-10">
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedNavbar" type="checkbox" checked>
                    <span class="input-span"></span>Fixed navbar</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedlayout" type="checkbox">
                    <span class="input-span"></span>Fixed layout</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input class="js-sidebar-toggler" type="checkbox">
                    <span class="input-span"></span>Collapse sidebar</label>
            </div>
            <div class="font-strong">LAYOUT STYLE</div>
            <div class="m-t-10">
                <label class="ui-radio ui-radio-gray m-r-10">
                    <input type="radio" name="layout-style" value="" checked="">
                    <span class="input-span"></span>Fluid</label>
                <label class="ui-radio ui-radio-gray">
                    <input type="radio" name="layout-style" value="1">
                    <span class="input-span"></span>Boxed</label>
            </div>
            <div class="m-t-10 m-b-10 font-strong">THEME COLORS</div>
            <div class="d-flex m-b-20">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Default">
                    <label>
                        <input type="radio" name="setting-theme" value="default" checked="">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-white"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue">
                    <label>
                        <input type="radio" name="setting-theme" value="blue">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green">
                    <label>
                        <input type="radio" name="setting-theme" value="green">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple">
                    <label>
                        <input type="radio" name="setting-theme" value="purple">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange">
                    <label>
                        <input type="radio" name="setting-theme" value="orange">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink">
                    <label>
                        <input type="radio" name="setting-theme" value="pink">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
            </div>
            <div class="d-flex">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="White">
                    <label>
                        <input type="radio" name="setting-theme" value="white">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue light">
                    <label>
                        <input type="radio" name="setting-theme" value="blue-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green light">
                    <label>
                        <input type="radio" name="setting-theme" value="green-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple light">
                    <label>
                        <input type="radio" name="setting-theme" value="purple-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange light">
                    <label>
                        <input type="radio" name="setting-theme" value="orange-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink light">
                    <label>
                        <input type="radio" name="setting-theme" value="pink-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="./assets/vendors/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jquery-knob/dist/jquery.knob.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="./assets/js/scripts/form-plugins.js" type="text/javascript"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
    </script>



<script>
$(document).ready(function() {
    if(window.File && window.FileList && window.FileReader) {
    $("#files").on("change",function(e) {
        var files = e.target.files ,
        filesLength = files.length ;
        for (var i = 0; i < filesLength ; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
                var file = e.target;
                $("<img></img>",{
                    class : "imageThumb",
                    src : e.target.result,
                    title : file.name
                }).insertAfter("#files");
            });
            fileReader.readAsDataURL(f);
        }
    });
    } else {
        alert("Your browser doesn't support to File API") 
    }
});

$("form#create-property").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: '../result.php',
        type: 'POST',
        data: formData,
        success: function (response) {
            if(response === "success"){
                resetForm();
            }else {
                resetForm();
            }
            
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

function resetForm(){
    swal({
    title: "congratulation",
    text: "Your Property Add Is Published",
    icon: "success",
    button: "Done",
    });
    $('.property-type option[value="home"]').attr("selected",true);
    $('.property-status option[value="for-rent"]').attr("selected",true);
    $('.size-type option[value="marla"]').attr("selected",true);
    $('.city option[value="city-1"]').attr("selected",true);
    $('.role option[value="owner"]').attr("selected",true);
    $('.country option[value="pakistan"]').attr("selected",true);
    $("#price").val('');
    $("#size").val('');
    $("#plot").val('');
    $("#street").val('');
    $("#phase").val('');
    $("#society").val('');
    $("#fullname").val('');
    $("#phone").val('');
    $("#email").val('');
    $("#files").val(null);
    $(".imageThumb").css("display", "none");
}
</script>

</body>

</html>